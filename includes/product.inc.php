<?php
require "db.inc.php";
$sql="SELECT * FROM products LIMIT 20";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../dashboard?error=loadingerror");
  exit();
}
else {
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	while($row=mysqli_fetch_assoc($result)){
		$id=$row['id'];
		$name=$row['name'];
		$model=$row['model'];
		$SN=$row['SN'];
		$price=$row['price'];
		$qty=$row['qty'];
		$description=$row['description'];
		echo "<tr><td>$id</td>
                  <td>$name</td>
                  <td>$model</td>
                  <td>$SN</td>
                  <td>$price</td>
                  <td>$qty</td>
                  <td>$description</td>
                  <td><a href='product.view.php?id=$id' class='btn btn-primary btn-sm'>View</a>
                  <td><a href='product.edit.php?id=$id' class='btn btn-success btn-sm'>Edit</a>
                  </td>
                </tr>";
	}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);