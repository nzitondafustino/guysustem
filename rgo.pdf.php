<?php
if(isset($_POST['rgo_report']))
{
$start=strtotime(trim($_POST['start']));
$end=strtotime(trim($_POST['end']));
$fstart=date('d F Y',$start);
$fend=date('d F Y',$end);
require_once "fpdf/fpdf.php";
require_once "fpdf/rgo.pdf.php";
require_once "includes/db.inc.php";
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->title($fstart,$fend);
$pdf->headerTable();
$sql="SELECT products.*,customers.name as client,
   customers.phone as contact,
   sells.*
   FROM products
   INNER JOIN sells ON products.id=sells.product_id
   INNER JOIN customers ON sells.customer_id=customers.id
   WHERE sells.pay_date <=? OR sells.pay_date >=?
   ";
   $stmt=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location:../report.php?error=sqlerror");
      exit();
   }
   mysqli_stmt_bind_param($stmt,'ss',$end,$start);
   mysqli_stmt_execute($stmt);
   $result=mysqli_stmt_get_result($stmt);
   while($row=mysqli_fetch_assoc($result))
   {  static $no=1;
   	  static $qty=0;
   	  static $total=0;
   	  static $uqty=0;
   	  static $utotal=0;
   	  $paid=strtotime($row['pay_date']);
   	  $paid=date('d/m/Y',$paid);
	  $pdf->Ln();
	  $pdf->SetFont("Arial","","12");
	  $pdf->cell(10,8,$no,1,0);
	  $pdf->cell(40,8,$row['name'],1,0);
	  $pdf->cell(40,8,$row['model'],1,0);
	  $pdf->cell(15,8,$row['qty'],1,0);
	  $pdf->cell(20,8,$row['price'],1,0);
	  $pdf->cell(20,8,$row['price']*$row['qty'],1,0);
	  $pdf->cell(40,8,$row['client'],1,0);
	  $pdf->cell(40,8,$row['contact'],1,0);
	  $pdf->cell(20,8,$row['paid']==1?'YES':'NO',1,0);
	  $pdf->cell(35,8,$paid,1,0);
	  $no++;
	  $qty+=$row['qty'];
	  $total+=$row['price']*$row['qty'];
	  if($row['paid']==0)
	  {
	  	$uqty+=$row['qty'];
	  	$utotal+=$row['price']*$row['qty'];
	  }


    }
  $paid=$total-$utotal;
  $pqty=$qty-$uqty;
 $pdf->total($qty,$total);
 $pdf->pdata($paid,$pqty);
 $pdf->udata($utotal,$uqty);
 $pdf->Output();
} else  {
	header("Location:report.php");
	exit();
}