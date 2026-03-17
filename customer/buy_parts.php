<?php
include("../config/auto_garage.php");
$result=mysqli_query($conn,"SELECT * FROM spare_parts");
while($row=mysqli_fetch_assoc($result)){
echo $row['part_name']." - ".$row['price']." - Qty: ".$row['quantity']."<br>";
}
?>
