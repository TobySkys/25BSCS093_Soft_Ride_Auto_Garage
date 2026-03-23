<?php
session_start();
$pageTitle = 'Services';
$rootPath  = '';
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
        <a href="bookings.php" class="btn-primary" style="display:inline-flex;align-items:center;gap:8px;font-family:var(--font-head);font-size:13px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;background:var(--accent);color:#000;padding:11px 22px;border-radius:9px;border:none;cursor:pointer;">
            <i class="fa-solid fa-calendar-plus"></i> Book a Service
        </a>
    </div>

    <div class="services-grid">
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-circle-dot"></i></span>
            <div class="service-name">Brake Repair</div>
            <div class="service-desc">Full brake system inspection and repair. Pads, rotors, calipers, brake fluid flush, and handbrake adjustment.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-gear"></i></span>
            <div class="service-name">Transmission</div>
            <div class="service-desc">Automatic and manual transmission services — fluid change, rebuild, and replacement for all major brands.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-wrench"></i></span>
            <div class="service-name">Engine Repair</div>
            <div class="service-desc">Head gaskets, timing belts, valve adjustments, and complete engine overhauls.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-oil-can"></i></span>
            <div class="service-name">Oil Change</div>
            <div class="service-desc">Conventional, synthetic &amp; high-mileage oil. Includes filter swap and multi-point inspection.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-snowflake"></i></span>
            <div class="service-name">A/C Repair</div>
            <div class="service-desc">Full air conditioning diagnosis, gas recharge, compressor repair, and system flush.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-battery-half"></i></span>
            <div class="service-name">Hybrid Repair</div>
            <div class="service-desc">High-voltage battery testing, inverter service, and hybrid system diagnostics for Toyota, Honda, and Ford.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-ruler"></i></span>
            <div class="service-name">Wheel Alignment</div>
            <div class="service-desc">Computerised 4-wheel alignment to correct tyre wear, improve handling, and extend tyre life.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            <div class="service-name">Check Engine</div>
            <div class="service-desc">OBD-II diagnostic scanning to identify the real root cause — not just clear the warning light.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-circle-dot"></i></span>
            <div class="service-name">Tire Services</div>
            <div class="service-desc">Tire mounting, balancing, rotation, and puncture repair. We stock a wide range of tire brands.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-bolt"></i></span>
            <div class="service-name">Electrical Repair</div>
            <div class="service-desc">Wiring faults, battery replacement, alternator, starter motor, and lighting systems.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-arrow-up-from-ground-water"></i></span>
            <div class="service-name">Suspension Repair</div>
            <div class="service-desc">Shock absorbers, struts, ball joints, bushings, and full suspension overhaul.</div>
        </a>
        <a class="service-card" href="bookings.php">
            <span class="service-icon"><i class="fa-solid fa-car"></i></span>
            <div class="service-name">General Maintenance</div>
            <div class="service-desc">Comprehensive maintenance packages — spark plugs, filters, belts, and full vehicle health check.</div>
        </a>
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
