<?php
if(isset($_GET['id']))
{
require "db.inc.php";
$sql="SELECT * FROM products WHERE id=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../technical.php?error=loadingerror");
  exit();
}
else {
  $id=$_GET['id'];
  mysqli_stmt_bind_param($stmt,'s',$id);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	while($row=mysqli_fetch_assoc($result)){
		$id=1;
		$name=$row['name'];
		$model=$row['model'];
    $sn=$row['SN'];
    $qty=$row['qty'];
		$price=$row['price'];
    $description=$row['description'];
		echo "<div class='card'>
          <h5 class='card-header'>Item Name:$name</h5>
          <div class='card-body'>
            <h6 class='card-title'>model:$model</h6>
            <h6 class='card-title'>Serial Number:$sn</h6>
            <h6 class='card-title'>remaining quantity:$qty</h6>
            <h6 class='card-title'>Price:$price</h6>
            <h6 class='card-title'>Description:</h6>
            <p>$description</p>
            <a href='dashboard.php' class='btn btn-dark'>Back</a>
          </div>
        </div>";
        $id++;
	}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
} else {
  header("Location:../dashboard.php");
  exit();
}