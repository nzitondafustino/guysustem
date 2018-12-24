<?php
if(isset($_POST['product_register']))
{
	require_once "db.inc.php";
	$itemname=$_POST['itemname'];
	$model=strtoupper($_POST['model']);
	$sn=$_POST['SN'];
	if(empty($_POST['SN']))
	$sn=$model;
	$price=$_POST['price'];
	$qty=$_POST['qty'];
	$description=$_POST['description'];
	$sql="SELECT SN FROM products WHERE SN=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:../product.new.php?error=sqlerror");
		exit();
	} else {
		mysqli_stmt_bind_param($stmt,'s',$sn);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$productCheck=mysqli_stmt_num_rows($stmt);
		if($productCheck > 0)
		{
			header("location:../product.new.php?error=alreadyexist");
			exit();
		}
		else {
			$sql="INSERT INTO products(name,model,SN,price,qty,description) VALUES(?,?,?,?,?,?)";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql))
			{
              header("Location:../product.new.php?error=sqlerror");
			  exit();
			}
			    mysqli_stmt_bind_param($stmt,'ssssss',$itemname,$model,$sn,$price,$qty,$description);
				mysqli_stmt_execute($stmt);
				header("Location:../dashboard.php?product=success");
				exit();
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else {
	header("Location:../product.new.php?");
	exit();
}