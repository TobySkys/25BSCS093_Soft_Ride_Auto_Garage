<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Services offered</title>
</head>
<body>
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
                <li><a href="#">about us</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="#">contact us</a></li>
                <button class="action-btn"><a href="auth/Signup.php">Signup</a></button>
                <button class="action-btn"><a href="auth/login.php">Login</a></button>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
      <section class="services-preview">
  <div class="section-header">
    <div>
      <span class="section-tag">What We Do</span>
      <h2>Our Top Services</h2>
    </div>
    <br>
    <a href="services.php" class="btn-outline">View All Services →</a>
  </div>
  <div class="services-grid">
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-ring" style="color:#5b21b6;"></i></span><div class="service-name">Brake Repair</div><div class="service-desc">Pads, rotors, calipers — full brake system service for your safety.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-gear" style="color:#5b21b6;"></i></span><div class="service-name">Transmission</div><div class="service-desc">Auto & manual transmission rebuild and replacement specialists.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-wrench" style="color:#5b21b6;"></i></span><div class="service-name">Engine Repair</div><div class="service-desc">From gaskets to full rebuilds — expert engine work done right.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-oil-can" style="color:#5b21b6;"></i></span><div class="service-name">Oil Change</div><div class="service-desc">Conventional, synthetic & high-mileage options with inspection.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-snowflake" style="color:#5b21b6;"></i></span><div class="service-name">A/C Repair</div><div class="service-desc">Full air conditioning diagnosis, recharge, and repair services.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-battery-half" style="color:#5b21b6;"></i></span><div class="service-name">Hybrid Repair</div><div class="service-desc">Battery and system repair for Toyota, Honda, Ford hybrids.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-ruler" style="color:#5b21b6;"></i></span><div class="service-name">Wheel Alignment</div><div class="service-desc">Computerized alignment to extend tire life and improve handling.</div></a>
    <a class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-magnifying-glass" style="color:#5b21b6;"></i></span><div class="service-name">Check Engine</div><div class="service-desc">Advanced diagnostics to find the root cause — not just clear codes.</div></a>
    <a  class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-car" style="color:#5b21b6;"></i></span><div class="service-name">General Maintenance</div><div class="service-desc">Comprehensive maintenance packages to keep your vehicle running smoothly.</div></a>
    <a  class="service-card" href="services.php"><span class="service-icon"><i class="fa-solid fa-circle-dot" style="color:#5b21b6;"></i></span><div class="service-name">Tire Services</div><div class="service-desc">Rotation, balancing, and replacement for optimal performance.</div></a>
    <a href="services.php" class="service-card"><span class="service-icon"><i class="fa-solid fa-plus" style="color:#5b21b6;"></i></span><div class="service-name">More Services</div><div class="service-desc">Explore our full range of automotive services.</div></a>
  </div>
</section>
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