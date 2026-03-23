<?php
session_start();
require 'config/connect.php';

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

include 'header.php';
?>

<main>

<!-- ── HERO ─────────────────────────────────────────────── -->
<section class="hero">
    <div class="hero-grid-overlay"></div>
    <div class="hero-content">
        <div class="hero-text">
            <?php if (isset($_SESSION['username'])): ?>
                <div class="hero-eyebrow">Welcome back</div>
                <h1>Hello,<br><span class="highlight"><?= htmlspecialchars($_SESSION['username']) ?></span></h1>
                <p class="hero-desc">Your vehicle dashboard is ready. Book a service, browse spare parts, or check your appointments.</p>
                <div class="hero-ctas">
                    <a href="bookings.php"     class="btn btn-primary"><i class="fa-solid fa-calendar-plus"></i> Book Service</a>
                    <a href="shop_parts.php"   class="btn btn-outline"><i class="fa-solid fa-shop"></i> Shop Parts</a>
                </div>
            <?php else: ?>
                <div class="hero-eyebrow">Entebbe, Uganda — Est. 2024</div>
                <h1>Smooth Rides<br><span class="highlight">Start Here.</span></h1>
                <p class="hero-desc">Soft-Ride Auto Garage delivers expert repairs, genuine spare parts, and honest service — so your vehicle stays on the road longer.</p>
                <div class="hero-ctas">
                    <a href="bookings.php"   class="btn btn-primary"><i class="fa-solid fa-calendar-plus"></i> Book Appointment</a>
                    <a href="services.php"   class="btn btn-outline"><i class="fa-solid fa-wrench"></i> Our Services</a>
                </div>
            <?php endif; ?>

            <div class="hero-stats">
                <div>
                    <div class="hero-stat-num" data-target="500">500+</div>
                    <div class="hero-stat-label">Cars Serviced</div>
                </div>
                <div>
                    <div class="hero-stat-num" data-target="14">14+</div>
                    <div class="hero-stat-label">Services Offered</div>
                </div>
                <div>
                    <div class="hero-stat-num" data-target="2">2 yrs</div>
                    <div class="hero-stat-label">In Business</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-badge-stack">
                <div class="hero-badge">
                    <div class="hero-badge-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div>
                        <div class="hero-badge-title">Warranty on all repairs</div>
                        <div class="hero-badge-sub">90-day parts & labour guarantee</div>
                    </div>
                </div>
                <div class="hero-badge">
                    <div class="hero-badge-icon"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <div class="hero-badge-title">Same-day service</div>
                        <div class="hero-badge-sub">Most jobs completed same day</div>
                    </div>
                </div>
                <div class="hero-badge">
                    <div class="hero-badge-icon"><i class="fa-solid fa-hand-holding-usd"></i></div>
                    <div>
                        <div class="hero-badge-title">Transparent pricing</div>
                        <div class="hero-badge-sub">No hidden fees — ever</div>
                    </div>
                </div>
                <div class="hero-badge">
                    <div class="hero-badge-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <div class="hero-badge-title">123 Gowers Road</div>
                        <div class="hero-badge-sub">Entebbe, Uganda — 24/7 drop-off</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── SERVICES PREVIEW ──────────────────────────────────── -->
<section style="max-width:1200px; margin:0 auto; padding:80px 32px;">
    <div class="section-header">
        <div>
            <span class="section-tag">What We Do</span>
            <h2>Our Services</h2>
        </div>
        <a href="services.php" class="btn-outline">View All Services →</a>
    </div>
    <div class="services-grid">
        <a class="service-card" href="services.php">
            <span class="service-icon"><i class="fa-solid fa-circle-dot"></i></span>
            <div class="service-name">Brake Repair</div>
            <div class="service-desc">Pads, rotors, calipers — full brake system service for your safety.</div>
        </a>
        <a class="service-card" href="services.php">
            <span class="service-icon"><i class="fa-solid fa-gear"></i></span>
            <div class="service-name">Transmission</div>
            <div class="service-desc">Auto &amp; manual transmission rebuild and replacement specialists.</div>
        </a>
        <a class="service-card" href="services.php">
            <span class="service-icon"><i class="fa-solid fa-wrench"></i></span>
            <div class="service-name">Engine Repair</div>
            <div class="service-desc">From gaskets to full rebuilds — expert engine work done right.</div>
        </a>
        <a class="service-card" href="services.php">
            <span class="service-icon"><i class="fa-solid fa-oil-can"></i></span>
            <div class="service-name">Oil Change</div>
            <div class="service-desc">Conventional, synthetic &amp; high-mileage options with inspection.</div>
        </a>
        <a class="service-card" href="services.php">
            <span class="service-icon"><i class="fa-solid fa-snowflake"></i></span>
            <div class="service-name">A/C Repair</div>
            <div class="service-desc">Full air conditioning diagnosis, recharge, and repair services.</div>
        </a>
        <a class="service-card" href="services.php">
            <span class="service-icon"><i class="fa-solid fa-battery-half"></i></span>
            <div class="service-name">Hybrid Repair</div>
            <div class="service-desc">Battery and system repair for Toyota, Honda, Ford hybrids.</div>
        </a>
    </div>
</section>

<!-- ── WHY CHOOSE US ─────────────────────────────────────── -->
<section class="why-us">
    <div class="why-us-inner">
        <div class="why-us-text">
            <span class="section-tag">Why Choose Us</span>
            <h2>Repairs You Can<br>Count On</h2>
            <p>We're not a franchise. We're your neighbours — a local team that built this garage from the ground up and takes pride in every job that rolls through our doors.</p>
            <div class="features-list">
                <div class="feature-item">
                    <div class="feature-check"><i class="fa-solid fa-check"></i></div>
                    <div>
                        <div class="feature-title">Certified Technicians</div>
                        <div class="feature-sub">Our mechanics are trained and experienced on all major vehicle makes.</div>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-check"><i class="fa-solid fa-check"></i></div>
                    <div>
                        <div class="feature-title">Genuine OEM Parts</div>
                        <div class="feature-sub">We source genuine and quality-tested parts for lasting repairs.</div>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-check"><i class="fa-solid fa-check"></i></div>
                    <div>
                        <div class="feature-title">Free Diagnostic Check</div>
                        <div class="feature-sub">Every vehicle gets a complimentary inspection when you book in.</div>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-check"><i class="fa-solid fa-check"></i></div>
                    <div>
                        <div class="feature-title">90-Day Repair Warranty</div>
                        <div class="feature-sub">We stand behind our work. If it fails, we fix it — free of charge.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="why-us-cards">
            <div class="why-card">
                <div class="why-card-num" data-target="500" data-suffix="+">500+</div>
                <div class="why-card-label">Happy Customers</div>
            </div>
            <div class="why-card">
                <div class="why-card-num">90</div>
                <div class="why-card-label">Day Warranty</div>
            </div>
            <div class="why-card">
                <div class="why-card-num">14+</div>
                <div class="why-card-label">Service Types</div>
            </div>
            <div class="why-card">
                <div class="why-card-num">24/7</div>
                <div class="why-card-label">Drop-off Box</div>
            </div>
        </div>
    </div>
</section>

<!-- ── TESTIMONIALS ──────────────────────────────────────── -->
<section class="testimonials" style="padding:80px 32px;">
    <div class="testimonials-inner">
        <div class="section-header" style="margin-bottom:40px;">
            <div>
                <span class="section-tag">Reviews</span>
                <h2>What Our Customers Say</h2>
            </div>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"Brought my Rav4 in for an engine noise and they diagnosed it within the hour. Honest, fast, and very affordable. Won't go anywhere else."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">JK</div>
                    <div>
                        <div class="testimonial-name">James Kato</div>
                        <div class="testimonial-car">Toyota RAV4, 2018</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"The team ordered parts overnight and had my car ready by the next afternoon. The online booking system made the whole process seamless."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">AN</div>
                    <div>
                        <div class="testimonial-name">Amina Nakato</div>
                        <div class="testimonial-car">Honda CRV, 2020</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"Best garage in Entebbe. They serviced my taxi fleet with no fuss, great pricing, and everything was done on time. Highly recommended."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">RM</div>
                    <div>
                        <div class="testimonial-name">Robert Mukasa</div>
                        <div class="testimonial-car">Toyota Hiace Fleet</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── CTA BAND ───────────────────────────────────────────── -->
<section class="cta-band">
    <h2>Ready to Book Your Service?</h2>
    <p>Schedule online in under 2 minutes — we'll confirm within 1 business hour.</p>
    <a href="bookings.php" class="btn-dark"><i class="fa-solid fa-calendar-plus"></i> Book an Appointment Today</a>
</section>

</main>

<?php include 'footer.php'; ?>
