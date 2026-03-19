<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Bookings Page</title>
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
<section class="page-hero">
  <div class="page-hero-content">
    <span class="section-tag">Get In Touch</span>
    <h1>Contact &<br>Book Service</h1>
    <p>Ready to get your car sorted? Schedule online, call us, or drop in. We're here Monday through Friday.</p>
  </div>
</section>
<div class="contact-container">
    <div class="contact-container1">
    <!--CONTACT DETAILS-->
    <h2>Find Us &<br>Reach Out</h2>
    <div class="contact-details">
      <div class="contact-detail">
          <div class="contact-detail-title"><i class="fa-solid fa-map-marker" style="color:#a78bfa;"></i>Our Location</div>
          <div class="contact-detail-value">123 Gowers road</div>
          <div class="contact-detail-sub">Entebbe,Uganda</div>
      </div>
      <div class="contact-detail">
          <div class="contact-detail-title"><i class="fa-solid fa-phone" style="color:#c026d3;"></i>Phone</div>
          <div class="contact-detail-value">(+256)718826545</div>
          <div class="contact-detail-sub">Call or text anytime during business hours</div>
      </div>
      <div class="contact-detail">
          <div class="contact-detail-title"><i class="fa-solid fa-envelope" style="color:#c026d3;"></i>Email</div>
          <div class="contact-detail-value">info@softrideauto.com</div>
          <div class="contact-detail-sub">We respond within 1 business day.</div>
      </div>
      <div class="contact-detail">
          <div class="contact-detail-title"><i class="fa-solid fa-car" style="color:#a7b8fa;"></i>After-Hours Drop-Off</div>
          <div class="contact-detail-value">Available 24/7</div>
          <div class="contact-detail-sub">Use our secure key drop box at the front</div>
      </div>
    <div class="hours-table">
      <h4>Shop Hours</h4>
      <div class="hours-row"><span class="hours-day">Monday</span>  <span class="hours-time">8:00 AM-6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Tuesday</span>  <span class="hours-time">8:00 AM-6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Wednesday</span>  <span class="hours-time">8:00 AM-6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Thursday</span>  <span class="hours-time">8:00 AM-6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Friday</span>  <span class="hours-time">8:00 AM-6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Saturday</span>  <span class="hours-time closed">Closed</span></div>
      <div class="hours-row"><span class="hours-day">Sunday</span>  <span class="hours-time closed">Closed</span></div>
    </div>
  </div>
  </div>
  <div class="contact-container2">
    <h2>Book an<br>Appointment</h2>
    <form action="bookings.php" method="POST">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" placeholder="John" required>
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" placeholder="Smith" required>
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="tel" placeholder="(555) 000-0000" required>
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <input type="email" placeholder="john@email.com" required>
        </div>
        <div class="form-group">
          <label>Vehicle Year</label>
          <input type="text" placeholder="e.g. 2019">
        </div>
        <div class="form-group">
          <label>Make & Model</label>
          <input type="text" placeholder="e.g. Toyota Camry">
        </div>
        <div class="form-group full">
          <label>Service Needed</label>
          <select>
            <option value="" disabled selected>Select a service...</option>
            <option>Oil Change</option>
            <option>Brake Repair</option>
            <option>Engine Repair</option>
            <option>Transmission Repair</option>
            <option>Auto A/C Repair</option>
            <option>Hybrid Repair</option>
            <option>Wheel Alignment</option>
            <option>Tire Sales</option>
            <option>Check Engine Light</option>
            <option>Suspension Repair</option>
            <option>Exhaust Repair</option>
            <option>Electrical Repair</option>
            <option>Clutch Repair</option>
            <option>Other / Not Sure</option>
          </select>
        </div>
        <div class="form-group full">
          <label>Preferred Date</label>
          <input type="date">
        </div>
        <div class="form-group full">
          <label>Tell Us More</label>
          <textarea placeholder="Describe the issue or any symptoms you've noticed..."></textarea>
        </div>
      <div class="form-submit">
        <button type="submit" class="btn-purple">Submit Appointment Request →</button>
      </div>
    </form>
  </div>
</div>
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
      <li><a href="tel:(+256) 718826545">(+256) 7188 26545</a></li>
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