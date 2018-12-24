<?php
require "db.inc.php";
$sql="SELECT clients.*,technicals.reciept as reciept
 FROM clients
 INNER JOIN technicals ON clients.id=technicals.client_id
 WHERE technicals.reciept=0 GROUP BY clients.id
 LIMIT 20
 ";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("location:../technical.clients.php?error=loadingerror");
  exit();
}
else {
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    static $no=1;
    $name=$row['name'];
    $phone=$row['phone'];
    echo "<tr><td>$no</td>
                  <td>$name</td>
                  <td>$phone</td>
                  <td><a href='technical.pdf.php?id=$id' class='btn btn-danger btn-sm'>Print reciept</a>
                  </td>
                </tr>";
    $no++;
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);