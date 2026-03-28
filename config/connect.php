<?php
// config/connect.php 
$conn = mysqli_connect("localhost", "root", "", "auto_garage");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
