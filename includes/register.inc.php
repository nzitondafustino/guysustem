<?php
 if(isset($_POST['register']))
 {
 	require "db.inc.php";
 	$email=trim($_POST['email']);
 	$name=trim($_POST['name']);
 	$password=trim($_POST['password']);
 	$confirm_password=trim($_POST['confirm_password']);
 	if (empty($name) or empty($email) or empty($password) or empty($confirm_password)) {
 		header("Location:../register.php?error=emptyfields");
 		exit;
 	}
 	elseif (strlen($name) < 3) {
 	   header("Location:../register.php?error=namerror");
 	   exit;	
 	}
 	elseif ($password !==$confirm_password) {
 		header("Location:../register.php?error=passwordmatcherror");
 		exit;
 	}
 	elseif (strlen($password) < 5) {
 		header("Location:../register.php?error=passwordlenghterror");
 		exit;
 	}
 	$sql="SELECT email FROM users WHERE email=?";
 	$stmt=mysqli_stmt_init($conn);
 	if(!mysqli_stmt_prepare($stmt,$sql))
 	{
 		header("Location:../register.php?error=sqlerror");
 		exit;
 	}
 	mysqli_stmt_bind_param($stmt,'s',$email);
 	mysqli_stmt_execute($stmt);
 	mysqli_stmt_store_result($stmt);
	$resultCheck=mysqli_stmt_num_rows($stmt);
	if($resultCheck > 0)
	{
	header("Location:../register.php?error=usertaken");
	exit;
	}
	$sql="INSERT INTO users(name,email,password) VALUES (?,?,?)";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location:../register.php?error=sqlerror");
	    exit;
	}
	$hashedPassword=password_hash($password,PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,'sss',$name,$email,$hashedPassword);
	mysqli_stmt_execute($stmt);
	header("Location:../register.php?register=success");
	exit;
	mysqli_stmt_close($stmt);
    mysqli_close($conn);

 }
 else {
 	header("Location:../register.php");
	exit;
 }
?>