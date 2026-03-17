<?php
include("../config/auto_garage.php");
if(isset($_POST['book'])){
$customer=$_POST['customer'];
$vehicle=$_POST['vehicle'];
$service=$_POST['service'];
$date=$_POST['date'];
$sql="INSERT INTO bookings(customer_id,vehicle_id,service_id,booking_date)
VALUES('$customer','$vehicle','$service','$date')";
mysqli_query($conn,$sql);
echo "Booking successful";
}
?>
<form method="POST">
Customer ID <input name="customer"><br>
Vehicle ID <input name="vehicle"><br>
Service ID <input name="service"><br>
Date <input type="date" name="date"><br>
<button name="book">Book</button>
</form>
