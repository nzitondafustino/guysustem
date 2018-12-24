<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	require "db.inc.php";
	$sql="SELECT technicals.*,clients.name as client,clients.phone as contact
	   FROM  technicals
	   INNER JOIN clients ON technicals.client_id=clients.id WHERE technicals.id=?";
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
		$description=$row['description'];
		$date=strtotime($row['done_at']);
		$date=date('d F Y',$date);
		echo "<div class='card'>
          <h5 class='card-header'>Item Name:$name</h5>
          <div class='card-body'>
            <h6 class='card-title'>model: $model</h6>
            <h6 class='card-title'>client: $client</h6>
            <h6 class='card-title'>contact: $contact</h6>
            <h6 class='card-title'>Price: $price</h6>
            <h6 class='card-title'>Description:</h6>
            <p>$description</p>
            <h6 class='card-title'>On $date</h6>
            <a href='technical.php' class='btn btn-dark'>Back</a>
          </div>
        </div>";
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}