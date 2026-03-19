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
    <header>
        
        <div class="logo">
            <img src="assets/images/company.jpeg" alt="" width="100%" height="100%">
        </div>
        <div class="menu" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>
        <nav id="navbar">
            <ul>
                <li><a href="index.php">home</a></li>
                <?php 
                if(isset($_SESSION['user_id'])): 
                ?>
                <!--Post-Signup-->
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="shop_parts.php">shop parts</a></li>
                <li><a href="bookings.php">boookings</a></li>
                <li><a href="profile.php">profile</a></li>
                <button class="action-btn"><a href="index.php?logout=true">LogOut</a></button>
                <?php else: ?>
                <!--Pre-Signup-->
                <li><a href="about_us.php">about us</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="#">contact us</a></li>
                <button class="action-btn"><a href="auth/Signup.php">Signup</a></button>
                <button class="action-btn"><a href="auth/login.php">Login</a></button>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
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
    <footer>
        
    <div class="container">
  <div class="footer-brand">
    <a class="brand-name" href="index.php">SOFT-RIDE-<span>AUTO</span></a>
    <p>Your trusted neighborhood auto repair shop. <br> Quality work, honest prices, and a team that <br> treats you like family since 2024</p>
  </div>
  <div class="footer-col">
    <h4>Quick Links</h4>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  <div class="footer-col">
    <h4>Services</h4>
    <ul>
      <li><a href="services.php">Brake Repair</a></li>
      <li><a href="services.php">Oil Change</a></li>
      <li><a href="services.php">Engine Repair</a></li>
      <li><a href="services.php">Transmission</a></li>
      <li><a href="services.php">Hybrid Repair</a></li>
      <li><a href="services.php">Tire Sales</a></li>
    </ul>
  </div>
  <div class="footer-col">
    <h4>Contact</h4>
    <ul>
      <li><a href="#">123Gowers road</a></li>
      <li><a href="#">Entebbe,Uganda</a></li>
      <li><a href="tel:(+256) 718826545">(+256)718826545</a></li>
      <li><a href="#">Mon-Fri: 8am-6pm</a></li>
      <li><a href="#">After-hours drop-off</a></li>
    </ul>
  </div>
</div>
<div class="follow">
    <h4>Follow us: </h4>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-x-twitter"></i></a>
    <a href="#"><i class="fab fa-facebook"></i></a>
</div>
<div class="copyright">© 2026 Soft-Ride-Auto Auto. All Rights Reserved.</div>
</footer>
    <script src="assets/script.js"></script>
</body>
</html>