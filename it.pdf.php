<?php
if(isset($_POST['it_report']))
{
$start=strtotime(trim($_POST['start']));
$end=strtotime(trim($_POST['end']));
$fstart=date('d F Y',$start);
$fend=date('d F Y',$end);
require_once "fpdf/fpdf.php";
require_once "fpdf/it.pdf.php";
require_once "includes/db.inc.php";
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->title($fstart,$fend);
$pdf->headerTable();
$sql="SELECT technicals.*,clients.name as client,
   clients.phone as contact
   FROM technicals
   INNER JOIN clients ON clients.id=technicals.client_id
   WHERE technicals.done_at <=? OR technicals.done_at >=?
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
        static $total=0;
        $paid=strtotime($row['done_at']);
        $paid=date('d/m/Y',$paid);
        $description=strlen($row['description'])<30?$row['description']:substr($row['description'],0,30)."...";
     $pdf->Ln();
     $pdf->SetFont("Arial","","10");
     $pdf->cell(10,8,$no,1,0);
     $pdf->cell(25,8,$row['name'],1,0);
     $pdf->cell(35,8,$row['model'],1,0);
     $pdf->cell(65,8,$description,1,0);
     $pdf->cell(20,8,$row['price'],1,0);
     $pdf->cell(40,8,$row['client'],1,0);
     $pdf->cell(40,8,$row['contact'],1,0);
     $pdf->cell(35,8,$paid,1,0);
     $no++;
     $total+=$row['price'];
    }
     $pdf->total($total);
     $pdf->Output();
} else  {
   header("Location:report.php");
   exit();
}