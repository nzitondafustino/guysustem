<?php
require "db.inc.php";
 $sql="SELECT products.*,
  customers.phone as contact,
  customers.name as client
 FROM 
 products 
 INNER JOIN sells ON  products.id=sells.product_id
 INNER JOIN customers ON sells.customer_id=customers.id
 LIMIT 20
 ";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../sold?error=loadingerror");
  exit();
}
else {
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	while($row=mysqli_fetch_assoc($result)){
		$id=$row['id'];
    static $no=1;
		$name=$row['name'];
		$model=$row['model'];
    $price=$row['price'];
		$SN=$row['SN'];
    $client=$row['client'];
    $contact=$row['contact'];
		echo "<tr><td>$no</td>
                  <td>$name</td>
                  <td>$model</td>
                  <td>$price</td>
                  <td>$SN</td>
                  <td>$client</td>
                  <td>$contact</td>
                  <td><a href='sold.view.php?id=$id' class='btn btn-primary btn-sm'>View</a>
                  </td>
                </tr>";
      $no++;
	}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);