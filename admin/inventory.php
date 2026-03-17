<?php
include("../config/auto_garage.php");
$result=mysqli_query($conn,"SELECT * FROM spare_parts");
echo "<h2>Inventory</h2>";
while($row=mysqli_fetch_assoc($result)){
echo $row['part_name']." | Qty: ".$row['quantity']."<br>";
}
?>
