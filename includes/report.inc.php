<?php
require "db.inc.php";
$start=date('Y-m-01');
$end=date('Y-m-d');
$fstart=strtotime($start);
$fstart=date('D,d F Y',$fstart);
$fend=date('D,d F Y');
$sql="SELECT SUM(products.price * sells.qty) as income 
FROM products
INNER JOIN sells ON products.id=sells.product_id 
WHERE sells.paid=1 AND sells.pay_date BETWEEN '$start' AND '$end='";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../technical.php?error=loadingerror");
  exit();
}
else {
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row=mysqli_fetch_assoc($result)){
		$income=$row['income'];
		echo "<div class='card'>
          <h5 class='card-header'>Income and Expenses Summary</h5>
          <div class='card-body'>
            <h4>RGO income</h4>
            <h6 class='card-title'>income: $income Rwf</h6>
            <h6 class='card-title'>From: $fstart</h6>
            <h6 class='card-title'>To: $fend</h6>
            ";
	}
  $sql="SELECT SUM(price) as income 
  FROM technicals 
  WHERE done_at BETWEEN '$start' AND '$end='";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../technical.php?error=loadingerror");
    exit();
  }
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  if($row=mysqli_fetch_assoc($result)){
    $income=$row['income'];
  echo "<h4>ITHUB income</h4>
            <h6 class='card-title'>income: $income Rwf</h6>
            <h6 class='card-title'>From: $fstart</h6>
            <h6 class='card-title'>To: $fend</h6>";
}
  $sql="SELECT SUM(expenses.amount) as expense FROM expenses
   WHERE expenses.done_at<='$end' OR expenses.done_at >='$start'
  ";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../dashboard.php?error=loadingerror");
    exit();
  }
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  if($row1=mysqli_fetch_assoc($result)){
    $expenses=$row1['expense'];
    echo "<h4>All Expenses</h4>
            <h6 class='card-title'>Expenses: $expenses Rwf</h6>
            <h6 class='card-title'>From: $fstart</h6>
            <h6 class='card-title'>To: $fend</h6>
          </div>
        </div>";
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);