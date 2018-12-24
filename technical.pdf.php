<?php
require_once "fpdf/fpdf.php";
require_once "fpdf/t.pdf.php";
if(isset($_GET['id']))
{
$id=$_GET['id'];
require "includes/db.inc.php";
$sql="SELECT * FROM clients WHERE id=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
	header("Location:technical.php?error=sqlerror");
	exit();
}
mysqli_stmt_bind_param($stmt,'s',$id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);

if($row=mysqli_fetch_assoc($result))
{
$name=$row['name'];
$sql="SELECT technicals.description as description,technicals.price as price 
from clients inner join technicals on clients.id=technicals.client_id
WHERE clients.id=? and technicals.reciept=0";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
	header("Location:technical.php?error=sqlerror");
	exit();
}
mysqli_stmt_bind_param($stmt,'s',$id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$pdf=new PDF();
$pdf->addPage('p','A5',0);
$pdf->clientName($name);
$pdf->title();
$pdf->headerTable();
while ($row=mysqli_fetch_assoc($result)) {	
   static $price=0;
   static $no=1;
   $pdf->SetFont("Arial","B","8");
   $pdf->Ln();
   $pdf->cell(10,8,$no,1,0);
   $pdf->cell(100,8,$row['description'],1,0);
   $pdf->cell(20,8,$row['price'].'Rwf',1,0);
   $price+=$row['price'];
   $no++;
}
$pdf->total($price);
$sql="UPDATE technicals SET reciept=1 WHERE id=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
   header("location:technical.php?error=sqlerror");
   exit();
}
mysqli_stmt_bind_param($stmt,'s',$id);
mysqli_execute($stmt);
$pdf->output();	
}
} else {
	header("Location:technical.pdf.php");
	exit();
}
