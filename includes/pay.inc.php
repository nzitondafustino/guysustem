<?php
if (isset($_GET['ui'])) {
	require "db.inc.php";
	$id=$_GET['ui'];
	$sql="UPDATE sells SET paid=1  WHERE customer_id=?";
	$stmt=mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location:../unpaid.php?error=sqlerror");
		exit();
	}
	mysqli_stmt_bind_param($stmt,'s',$id);
	mysqli_stmt_execute($stmt);
	header("Location:../paid.php?pay=success");
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	exit();
}