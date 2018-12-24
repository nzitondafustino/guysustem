<?php
if(isset($_POST['product_update'])){
	$id=$_POST['id'];
	$itemname=$_POST['itemname'];
	$model=$_POST['model'];
	$sn=$_POST['SN'];
	$price=$_POST['price'];
   	$qty=$_POST['qty'];
   	$description=$_POST['description'];
	require_once "db.inc.php";
	$sql="UPDATE products SET name=?,model=?,SN=?,price=?,qty=?,description=? where id=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:../product.php?error=sqlerror");
		exit();
	}
	mysqli_stmt_bind_param($stmt,'sssssss',$itemname,$model,$sn,$price,$qty,$description,$id);
	mysqli_stmt_execute($stmt);
	header("Location:../dashboard.php?update=success");
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
} else {
	header("Location:../dashboard.php");
	exit();
}