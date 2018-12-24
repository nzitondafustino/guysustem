<?php 
if (isset($_POST['exp_create'])) {
	require "db.inc.php";
	$amount=trim($_POST['amount']);
	$reason=trim($_POST['reason']);
	$paid_by=trim($_POST['paid_by']);
	$date=date('Y-m-d');
	if (empty($amount) or empty($reason) or empty($paid_by)) {
		header("Location:../expenses.php?error=emptyfields");
		exit();
	}
	$sql="INSERT INTO expenses(amount,reason,paid_by,done_at) VALUES (?,?,?,?)";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location:../expenses.php?error=sqlerror");
		exit();
	}
    mysqli_stmt_bind_param($stmt,'ssss',$amount,$reason,$paid_by,$date);
    mysqli_stmt_execute($stmt);
    header("Location:../expenses.php?expenses=success");
    exit();
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
	header("Location:../expenses.php");
	exit();
} 