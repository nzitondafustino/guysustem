<?php
if(isset($_POST['technical_create']))
{
	require "db.inc.php";
	$itmename=$_POST['itemname'];
	$model=$_POST['model'];
	$client=$_POST['client'];
	$contact=$_POST['contact'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$done_at=$_POST['date'];
	if (empty($itmename) or empty($model) or empty($clients) or empty($contact) or empty($price) or empty($description) or empty($done_at)) {
	  header("Location:../technical.new.php?error=emptyfields");
	  exit();
	}
	$sql="SELECT id FROM clients WHERE phone=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header('Location:../technical.new.php?errorsqlerror');
		exit();
	}
	mysqli_stmt_bind_param($stmt,'s',$contact);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $sql="INSERT INTO technicals(name,model,price,description,done_at,client_id) VALUES (?,?,?,?,?,?)";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location:../technical.new.php?error=sqlerror");
		exit();
	}
	mysqli_stmt_bind_param($stmt,'ssssss',$itmename,$model,$price,$description,$done_at,$id); 
	mysqli_stmt_execute($stmt);
	header("Location:../technical.php?tech=success");
	exit();
	} else {
		$sql="INSERT INTO clients (name,phone) VALUES (?,?)";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../technical.new.php?error=sqlerror");
			exit();
		}
		mysqli_stmt_bind_param($stmt,'ss',$client,$contact);
		mysqli_stmt_execute($stmt);
		$sql="SELECT id FROM clients WHERE phone=?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header('Location:../technical.new.php?errorsqlerror');
			exit();
		}
		mysqli_stmt_bind_param($stmt,'s',$contact);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($result)){
	      $id=$row['id'];
	      $sql="INSERT INTO technicals(name,model,price,description,done_at,client_id) VALUES (?,?,?,?,?,?)";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql))
		{
			header("Location:../technical.new.php?error=sqlerror");
			exit();
		}
		mysqli_stmt_bind_param($stmt,'ssssss',$itmename,$model,$price,$description,$done_at,$id); 
		mysqli_stmt_execute($stmt);
		header("Location:../technical.php?tech=success");
		exit();
		} else {
			header("Location:../technical.new.php?error=insertionerror");
	        exit();
		}
     }
     mysqli_stmt_close($stmt);
	 mysqli_close($conn);
} else {
	header("Location:../technical.new.php");
	exit();
}
