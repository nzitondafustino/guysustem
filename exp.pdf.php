<?php
if(isset($_POST['exp_report']))
{
$start=strtotime(trim($_POST['start']));
$end=strtotime(trim($_POST['end']));
$fstart=date('d F Y',$start);
$fend=date('d F Y',$end);
require_once "fpdf/fpdf.php";
require_once "fpdf/exp.pdf.php";
require_once "includes/db.inc.php";
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->title($fstart,$fend);
$pdf->headerTable();
  $sql="SELECT * FROM expenses
  WHERE done_at <=? or done_at >=?
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
        $date=strtotime($row['done_at']);
        $date=date('d/m/Y',$date);
         $pdf->Ln();
         $pdf->SetFont("Arial","","12");
         $pdf->cell(20,8,$no,1,0);
         $pdf->cell(130,8,$row['reason'],1,0);
         $pdf->cell(40,8,$row['paid_by'],1,0);
         $pdf->cell(40,8,$row['amount'],1,0);
         $pdf->cell(40,8,$date,1,0);
         $no++;
         $total+=$row['amount'];
        }
         $pdf->total($total);
         $pdf->Output();
} else  {
   header("Location:report.php");
   exit();
}