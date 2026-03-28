<?php
session_start();
require_once 'config/connect.php';

$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query);
include 'header.php';
?>

<main>

<section class="page-hero">
    <div class="page-hero-content">
        <span class="section-tag">What We Do</span>
        <h1>Our Auto<br>Services</h1>
        <p>From routine oil changes to complex engine rebuilds — Soft-Ride has the skills, tools, and genuine parts to handle it all.</p>
    </div>
</section>

<section style="max-width:1200px; margin:0 auto; padding:72px 32px;">
    <div class="section-header">
        <div>
            <span class="section-tag">Full Service Menu</span>
            <h2>Everything We Offer</h2>
        </div>
        <a href="bookings.php" class="btn-primary" style="display:inline-flex;align-items:center;gap:8px;font-family:var(--font-head);font-size:13px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;background:var(--rust);color:#000;padding:11px 22px;border-radius:9px;border:none;cursor:pointer;">
            <i class="fa-solid fa-calendar-plus"></i> Book a Service
        </a>
    </div>

    <div class="services-grid">
        <?php foreach ($result as $row): ?>
            <a class="service-card" href="bookings.php">
                <span class="service-icon"><i class="fa-solid fa-toolbox"></i></span>
                <div class="service-name"><?php echo $row['service_name']; ?></div>
                <div class="service-desc"><?php echo $row['service_description']; ?></div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Pricing note -->
    <div class="alert alert-info" style="margin-top:40px;">
        <i class="fa-solid fa-circle-info"></i>
        <span>All pricing is provided transparently before any work begins. Contact us or book an appointment for a free estimate.</span>
    </div>
</section>

<!-- CTA -->
<section class="cta-band">
    <h2>Not sure what your car needs?</h2>
    <p>Book a free diagnostic check and let our technicians tell you exactly what's going on.</p>
    <a href="bookings.php" class="btn-dark"><i class="fa-solid fa-calendar-check"></i> Book Free Diagnostic</a>
</section>

</main>

<?php include 'footer.php'; ?>
