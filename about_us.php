<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
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
    <section class="about-strip">
  <div class="about-text reveal">
    <span class="section-tag">Who We Are</span>
    <h2>Unmatched Car Care Since 2004</h2>
    <p>At Precision Auto, we work hard to be your one-stop shop for all automotive needs. We take pride in genuine car care and superior customer service for every person who walks through our doors.</p>
    <p>Our ASE-certified technicians bring decades of experience across all makes and models, with transparency and honesty at every step.</p>
    <a href="about.html" class="btn btn-purple" style="margin-top:32px; align-self:flex-start;">Learn More About Us</a>
    <div class="stats">
      <div><div class="stat-num">20+</div><div class="stat-label">Years Experience</div></div>
      <div><div class="stat-num">5K+</div><div class="stat-label">Happy Customers</div></div>
      <div><div class="stat-num">14</div><div class="stat-label">Services Offered</div></div>
    </div>
  </div>
  <div class="about-visual">
    <div class="about-visual-icon">🔧</div>
    <div class="about-visual-card">
      <div class="card-icon">🏅</div>
      <div>
        <div class="card-text">ASE Certified Technicians</div>
        <div class="card-sub">All makes & models — domestic and foreign</div>
      </div>
    </div>
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
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="bookings.php">Contact</a></li>
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
</body>
</html>