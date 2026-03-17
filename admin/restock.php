<?php
include("../config/db.php");
if(isset($_POST['restock'])){
$id=$_POST['id'];
$q=$_POST['qty'];
mysqli_query($conn,"UPDATE spare_parts SET quantity=quantity+$q WHERE part_id=$id");
echo "Restocked";
}
?>
<form method="POST">
Part ID <input name="id"><br>
Quantity <input name="qty"><br>
<button name="restock">Restock</button>
</form>
