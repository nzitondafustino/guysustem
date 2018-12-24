<?php
require_once "fpdf/fpdf.php";
require_once "fpdf/pdf.php";
if(isset($_GET['id']))
{
$id=$_GET['id'];
require "includes/db.inc.php";
$sql="SELECT * FROM customers WHERE id=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
	header("Location:paid.php?error=sqlerror");
	exit();
}
mysqli_stmt_bind_param($stmt,'s',$id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);

if($row=mysqli_fetch_assoc($result))
{
$name=$row['name'];
$sql="SELECT products.description as description,products.price as price 
from products inner join sells on products.id=sells.product_id
inner join customers on sells.customer_id=customers.id
WHERE customers.id=? and sells.paid=1 and sells.reciept=0";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
	header("Location:paid.php?error=sqlerror");
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
   $pdf->SetFont("Arial","B","8");
   $pdf->Ln();
   $pdf->cell(10,8,'1',1,0);
   $pdf->cell(80,8,$row['description'],1,0);
   $pdf->cell(20,8,$row['price'].'Rwf',1,0);
   $pdf->cell(20,8,$row['price'].'Rwf',1,0);
   $price+=$row['price'];
}
$pdf->total($price);
$sql="UPDATE sells SET reciept=1 WHERE customer_id=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
   header("location:product.php?error=sqlerror");
   exit();
}
mysqli_stmt_bind_param($stmt,'s',$id);
mysqli_execute($stmt);
$pdf->output();

  }
} else {
	header("Location:paid.php");
	exit();
}
