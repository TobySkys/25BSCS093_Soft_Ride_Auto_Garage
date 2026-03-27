<?php
// config/connect.php — PDO database connection
$host     = 'localhost';
$dbname   = 'auto_garage';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
