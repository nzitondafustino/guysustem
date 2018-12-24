<?php
if (isset($_POST['product_search'])) {
require "db.inc.php";
$search=trim($_POST['search']);
$sn=trim($_POST['search']);
$sql="SELECT * FROM products WHERE model=? OR SN=? LIMIT 20";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
	header("Location:../dashboard.php?error=sqlerror");
	exit();
}
mysqli_stmt_bind_param($stmt,'ss',$search,$sn);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$error=1;
while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $no=1;
        $error=0;
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
        $no++;
  }
}
else {
	header("Location:../dashboard.php");
	exit();
}