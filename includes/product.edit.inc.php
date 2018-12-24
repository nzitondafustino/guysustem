<?php
if(isset($_GET['id'])){
  require_once "db.inc.php";
  $id=$_GET['id'];
  $sql="SELECT * FROM products where id=?";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql))
  {
  	header("Location:../products?error=sqlerror");
  	exit();
  }
    mysqli_stmt_bind_param($stmt,'s',$id);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
   	$itemname=$row['name'];
   	$model=$row['model'];
   	$sn=$row['SN'];
   	$price=$row['price'];
   	$qty=$row['qty'];
   	$description=$row['description'];
   }
}