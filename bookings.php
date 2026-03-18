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

<div class="contact-layout">
  <!-- CONTACT INFO -->
  <div class="contact-info reveal">
    <h2>Find Us &<br>Reach Out</h2>
    <div class="contact-details">
      <div class="contact-detail">
        <div class="contact-detail-icon"><i class="fa-solid fa-map-marker" style="color:#ff0000;"></i></div>
        <div>
          <div class="contact-detail-title">Our Location</div>
          <div class="contact-detail-value">123 Main Street</div>
          <div class="contact-detail-sub">Your City, State 00000</div>
        </div>
      </div>
      <div class="contact-detail">
        <div class="contact-detail-icon"><i class="fa-solid fa-phone" style="color:#ff0000;></i></div>
        <div>
          <div class="contact-detail-title">Phone</div>
          <div class="contact-detail-value">(555) 123-4567</div>
          <div class="contact-detail-sub">Call or text anytime during business hours</div>
      </div>
      <div class="contact-detail">
        <div class="contact-detail-icon"><i class="fa-solid fa-envelope" style="color:#ff0000;></i></div>
        </div>
          <div class="contact-detail-title">Email</div>
          <div class="contact-detail-value">info@softrideauto.com</div>
          <div class="contact-detail-sub">We respond within 1 business day</div>
        </div>
      </div>
      <div class="contact-detail">
        <div class="contact-detail-icon"><i class="fa-solid fa-car" style="color:#ff0000;></i></div>
        <div>
          <div class="contact-detail-title">After-Hours Drop-Off</div>
          <div class="contact-detail-value">Available 24/7</div>
          <div class="contact-detail-sub">Use our secure key drop box at the front</div>
        </div>
      </div>
    </div>

    <div class="hours-table">
      <h4>Shop Hours</h4>
      <div class="hours-row"><span class="hours-day">Monday</span><span class="hours-time">8:00 AM – 6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Tuesday</span><span class="hours-time">8:00 AM – 6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Wednesday</span><span class="hours-time">8:00 AM – 6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Thursday</span><span class="hours-time">8:00 AM – 6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Friday</span><span class="hours-time">8:00 AM – 6:00 PM</span></div>
      <div class="hours-row"><span class="hours-day">Saturday</span><span class="hours-time closed">Closed</span></div>
      <div class="hours-row"><span class="hours-day">Sunday</span><span class="hours-time closed">Closed</span></div>
    </div>
  </div>
<!--Booking Form-->
    <form action="bookings.php" method="POST" class="booking-form">
        <h2>Book an<br>Appointment</h2>
      <div class="form-grid">
          <label>First Name</label>
          <input type="text" placeholder="John" required>
          <label>Last Name</label>
          <input type="text" placeholder="Smith" required>
          <label>Phone Number</label>
          <input type="tel" placeholder="(555) 000-0000" required>
          <label>Email Address</label>
          <input type="email" placeholder="john@email.com" required>
          <label>Vehicle Year</label>
          <input type="text" placeholder="e.g. 2019" required>
          <label>Make & Model</label>
          <input type="text" placeholder="e.g. Toyota Camry">
          <div class="list-services">
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
          <label>Preferred Date</label>
          <input type="date">
          <label>Tell Us More</label>
          <textarea placeholder="Describe the issue or any symptoms you've noticed..."></textarea>
      <div class="form-submit">
        <button type="submit" class="btn btn-purple">Submit Appointment Request →</button>
      </div>
    </form>
</main>
<footer>

</footer>
</body>
</html>