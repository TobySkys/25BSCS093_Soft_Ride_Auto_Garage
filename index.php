<?php
session_start();
require 'config/connect.php';

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Home page</title>
</head>
<body class="home-page">
    <?php include 'includes/header.php'; ?>
    <main>
        <p class="welcome">
            <?php if(isset($_SESSION['username'])): ?>
                <h3>Welcome to Our Auto Garage 🔧 <?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                <?php else: ?>
                    <h1 style="color:#ffff; -webkit-text-stroke:3px #000; text-stroke:3px #000; font-size:40px; font-weight:900; paint-order:stroke fill; text-shadow:1px 1px 1px 3px rgba(0,0,0,0.6);">Soft-Ride Auto Garage and Sparts!🔧</h1> 
                    <h3 style="color:#fff; -webkit-text-stroke:2px #000; text-stroke:2px #000; font-size:20px; font-weight:800; paint-order:stroke fill; text-shadow:1px 1px 1px 3px rgba(0,0,0,0.6);">" Where Smooth Rides Find a Home. "</h3>
                <?php endif; ?>
                </p>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/script.js"></script>
</body>
</html>