<?php
if (isset($_POST['login'])) {
	require "db.inc.php";
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(empty($email) or empty($password))
	{
		header("Location:../index.php?error=emptyfields");
 		exit;
	}
	$sql="SELECT * FROM users WHERE email=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location:..index.php?error=sqlerror");
 		exit;
	}
	mysqli_stmt_bind_param($stmt,'s',$email);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row=mysqli_fetch_assoc($result))
	{
		$pwdCheck=password_verify($password,$row['password']);
		if($pwdCheck==false)
		{
			header("Location:../index.php?error=wrongpassword");
 		    exit;
		} elseif($pwdCheck==true) {
			     session_start();
                 $_SESSION['email']=$row['email'];
                 $_SESSION['name']=$row['name'];
                 $_SESSION['id']=$row['id'];
                 header("location:../dashboard.php?login=success");
                 exit;
             }

		} else {
            header("Location:../index.php?error=wrongpassword");
 		    exit;
		}
	mysqli_stmt_bind_param($stmt,'s',$email);
 	mysqli_stmt_execute($stmt);
	} else {
	header("Location:../index.php");
	exit;
}