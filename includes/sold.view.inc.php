<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	require "db.inc.php";
	$sql="SELECT products.*,
	  customers.phone as contact,
	  customers.name as client,
	  sells.warranty as warranty
	 FROM 
	 products 
	 INNER JOIN sells ON  products.id=sells.product_id
	 INNER JOIN customers ON sells.customer_id=customers.id WHERE products.id=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location:../technical.view.php?error=sqlerror");
		exit();
	}
	mysqli_stmt_bind_param($stmt,'s',$id);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row=mysqli_fetch_assoc($result)){
		$name=$row['name'];
		$model=$row['model'];
		$client=$row['client'];
		$contact=$row['contact'];
		$price=$row['price'];
		$stock=$row['qty'];
		$description=$row['description'];
		$warranty=strtotime($row['warranty']);
		$warranty=date('d F Y',$warranty);
		echo "<div class='card'>
          <h5 class='card-header'>Item Name: $name</h5>
          <div class='card-body'>
            <h6 class='card-title'>model: $model</h6>
            <h6 class='card-title'>client: $client</h6>
            <h6 class='card-title'>contact: $contact</h6>
            <h6 class='card-title'>Price: $price Rwf</h6>
            <h6 class='card-title'>Remaing Quantity: $stock</h6>
            <h6 class='card-title'>Warranty until $warranty</h6>
            <h6 class='card-title'>Description:</h6>
            <p>$description</p>
            <a href='sold.php' class='btn btn-dark'>Back</a>
          </div>
        </div>";
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}