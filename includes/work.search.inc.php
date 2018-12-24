<?php
if(isset($_POST['work_search']))
{
$search=$_POST['search'];
require "db.inc.php";
$sql="SELECT technicals.*,clients.name as client,clients.phone as contact
   FROM  technicals
   INNER JOIN clients ON technicals.client_id=clients.id
   WHERE technicals.reciept=0 AND (technicals.model=?)
   LIMIT 20
   ";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../technical.php?error=loadingerror");
  exit();
}
else {
  mysqli_stmt_bind_param($stmt,'s',$search);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
  $error=1;
	while($row=mysqli_fetch_assoc($result)){
    $error=0;
		$id=$row['id'];
    static $no=1;
		$name=$row['name'];
		$model=$row['model'];
    $client=$row['client'];
		$contact=$row['contact'];
		$price=$row['price'];
    $date=strtotime($row['done_at']);
    $date=date("d F Y",$date);
    $description=$row['description'];
		$description=strlen($description)<= 15 ? $description : substr($description,0,15)."...";
		echo "<tr><td>$no</td>
                  <td>$name</td>
                  <td>$model</td>
                  <td>$client</td>
                  <td>$contact</td>
                  <td>$price</td>
                  <td>$date</td>
                  <td>$description</td>
                  <td><a href='technical.view.php?id=$id' class='btn btn-primary btn-sm'>View</a>
                  </td>
                </tr>";
    $no++;
	}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
} else {
  header("Location:../technical.php");
  exit();
}