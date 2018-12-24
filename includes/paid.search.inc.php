
<?php
if(isset($_POST['paid_search']))
{
$search=$_POST['search'];
require "db.inc.php";
$sql="SELECT customers.*,sells.pay_date as pay_date
 FROM 
 customers
 INNER JOIN sells ON customers.id=sells.customer_id
 WHERE sells.paid=1 and sells.reciept=0 and (customers.name=? or customers.phone=?) 
 GROUP BY customers.id 
 ORDER BY sells.pay_date 
 DESC
 LIMIT 20
";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../sold?error=loadingerror");
  exit();
}
else {
  mysqli_stmt_bind_param($stmt,'ss',$search,$search);
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  $error=1;
  while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $error=0;
    static $no;
    $name=$row['name'];
    $phone=$row['phone'];
    $paydate=strtotime($row['pay_date']);
    $paydate=date("d F Y",$paydate);
    echo "<tr><td>$no</td>
                  <td>$name</td>
                  <td>$phone</td>
                  <td>Yes</td>
                  <td>$paydate</td>
                  <td>
                      <a href='product.pdf.php?id=$id' class='btn btn-danger btn-sm'>Print receipt</a>
                  </td>
                </tr>";
    $no++;
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
} else {
	header("Location:../paid.php");
	exit();
}