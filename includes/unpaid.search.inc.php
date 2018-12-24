<?php
if (isset($_POST['unpaid_search'])) {
$search=trim($_POST['search']);
require "db.inc.php";
$sql="SELECT customers.*,sells.pay_date as pay_date,
products.name as item,
products.price as price,
sells.qty as qty
FROM 
customers 
INNER JOIN sells ON customers.id=sells.customer_id
INNER JOIN products ON sells.product_id=products.id
WHERE sells.paid=0 and (products.model=? OR products.SN=?)
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
    $error=0;
    $id=$row['id'];
    static $no=1;
    $name=$row['name'];
    $phone=$row['phone'];
    $paydate=strtotime($row['pay_date']);
    $paydate=date("d F Y",$paydate);
    $price=$row['price'];
    $item=$row['item'];
    $qty=$row['qty'];
    $totalPrice=$price*$qty;
    echo "<tr><td>$no</td>
                  <td>$item</td>
                  <td>$qty</td>
                  <td>$price Rwf</td>
                  <td>$totalPrice Rwf</</td>
                  <td>$name</td>
                  <td>$phone</td>
                  <td>$paydate</td>
                  <td><a href='' class='btn btn-dark btn-sm'>Pay</a>
                  </td>
                </tr>";
      $no++;
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
 else {
  header("Location:../unpaid.php");
  exit();
}