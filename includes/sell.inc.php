<?php
if(isset($_POST['sell'])){
	require "db.inc.php";
	$model=strtoupper($_POST['model']);
  $qty=$_POST['qty'];
	if(!empty($_POST['SN']))
  {
	$sn=$_POST['SN'];
  $qty=1;
  }
  else
  {
  $sn=$model;
  }
	$client=$_POST['client'];
	$contact=$_POST['contact'];
  $warranty=$_POST['warranty'];
	if(empty($_POST['paid']))
	{
		$paid=0;
	}
	else {
		$paid=1;
	}
	$date=$_POST['date'];
  if (empty($model) or empty($qty) or empty($client) or empty($contact)) {
    header("Location:../sell.php?error=emptyfields");
    exit();
  }
  if (!empty($_POST['SN'])) {
   $sql="SELECT * FROM products WHERE SN=? and qty > 0"; 
  }
  else {
   $sql="SELECT * FROM products WHERE model=? and qty > 0";
  }
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
       header("Location:../sell.php?error=sqlerror");
       exit();
	}
	mysqli_stmt_bind_param($stmt,'s',$sn);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row=mysqli_fetch_assoc($result))
	 {
      $sql="SELECT id FROM customers WHERE phone=?";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../sell.php?error=sqlerror");
        exit();
      }
      mysqli_stmt_bind_param($stmt,'s',$contact);
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
      if($row2=mysqli_fetch_assoc($result)){
        $customerId=$row2['id'];
      } else {
      $sql="INSERT INTO customers(name,phone) VALUES (?,?)";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
      	header("Location:../sell.php?error=sqlerror");
      	exit();
      }
      mysqli_stmt_bind_param($stmt,'ss',$client,$contact);
      mysqli_stmt_execute($stmt);
      $customerId=mysqli_insert_id($conn);
      }
      $productId=$row['id'];
      $sql="INSERT INTO sells(product_id,customer_id,SN,warranty,paid,pay_date,qty) VALUES (?,?,?,?,?,?,?)";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
      	header("Location:../sell.php?error=sqlerror");
      	exit();
      }
      mysqli_stmt_bind_param($stmt,'sssssss',$productId,$customerId,$sn,$warranty,$paid,$date,$qty);
      mysqli_stmt_execute($stmt);
      $sql="UPDATE products SET qty=? WHERE id=?";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
      	header("Location:../sell.php?error=sqlerror");
      	exit();
      }
      $qty=$row['qty']-$qty;
      $id=$row['id'];
      mysqli_stmt_bind_param($stmt,'ss',$qty,$id);
      mysqli_stmt_execute($stmt);
      header("location:../sold.php?sell=success");
	} else {
		header("location:../sell.php?error=emptystock");
		exit();
	}
	mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
		header("location:../sell.php");
		exit();
	}