<?php
session_start();

require 'config/connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("127.0.0.1", "root", "", "auto_garage");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$success = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic server-side validation
    $firstName   = trim($_POST['first_name']   ?? '');
    $lastName    = trim($_POST['last_name']    ?? '');
    $phone       = trim($_POST['phone']        ?? '');
    $email       = trim($_POST['email']        ?? '');
    $vehicleYear = trim($_POST['vehicle_year'] ?? '');
    $makeModel   = trim($_POST['make_model']   ?? '');
    $service     = trim($_POST['service']      ?? '');
    $date        = trim($_POST['date']         ?? '');
    $notes       = trim($_POST['notes']        ?? '');

    if (!$firstName || !$lastName || !$phone || !$email || !$service) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO bookings (first_name, last_name, phone, email, vehicle_year, make_model, service_name, booking_date, notes) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "sssssssss",
            $firstName, $lastName, $phone, $email, $vehicleYear, $makeModel, $service, $date, $notes
        );
        if($stmt->execute()){
        $success = "Thank you, $firstName! Your appointment request has been received. We'll confirm within 1 business hour.";
        }else{
            $error = "Something went wrong.Please try again later.";
        }
        $stmt->close();
    }
}

include 'header.php';
?>

<main>

<section class="page-hero">
    <div class="page-hero-content">
        <span class="section-tag">Get in Touch</span>
        <h1>Contact &amp;<br>Book Service</h1>
        <p>Ready to get your car sorted? Schedule online, call us, or drop in. We're here Monday through Friday.</p>
    </div>
</section>

<div class="contact-container">

    <!-- ── Left: contact details ─── -->
    <div class="contact-container1">
        <h2>Find Us &amp;<br>Reach Out</h2>

        <?php if ($error):   ?><div class="msg error"><i class="fa-solid fa-circle-exclamation"></i> <?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?><div class="msg success"><i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($success) ?></div><?php endif; ?>

        <div class="contact-details">
            <div class="contact-detail">
                <div class="contact-detail-title"><i class="fa-solid fa-map-marker-alt"></i> Our Location</div>
                <div class="contact-detail-value">123 Gowers Road</div>
                <div class="contact-detail-sub">Entebbe, Uganda</div>
            </div>
            <div class="contact-detail">
                <div class="contact-detail-title"><i class="fa-solid fa-phone"></i> Phone</div>
                <div class="contact-detail-value">(+256) 718 826 545</div>
                <div class="contact-detail-sub">Call or text during business hours</div>
            </div>
            <div class="contact-detail">
                <div class="contact-detail-title"><i class="fa-solid fa-envelope"></i> Email</div>
                <div class="contact-detail-value">info@softrideauto.com</div>
                <div class="contact-detail-sub">We respond within 1 business day</div>
            </div>
            <div class="contact-detail">
                <div class="contact-detail-title"><i class="fa-solid fa-key"></i> After-Hours Drop-Off</div>
                <div class="contact-detail-value">Available 24 / 7</div>
                <div class="contact-detail-sub">Secure key drop box at the front entrance</div>
            </div>
        </div>

        <div class="hours-table" style="margin-top:24px;">
            <h4>Shop Hours</h4>
            <div class="hours-row"><span class="hours-day">Monday</span>    <span class="hours-time">8:00 AM – 6:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Tuesday</span>   <span class="hours-time">8:00 AM – 6:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Wednesday</span> <span class="hours-time">8:00 AM – 6:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Thursday</span>  <span class="hours-time">8:00 AM – 6:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Friday</span>    <span class="hours-time">8:00 AM – 6:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Saturday</span>  <span class="hours-time closed">Closed</span></div>
            <div class="hours-row"><span class="hours-day">Sunday</span>    <span class="hours-time closed">Closed</span></div>
        </div>
    </div>

    <!-- ── Right: booking form ─── -->
    <div class="contact-container2">
        <h2>Book an<br>Appointment</h2>
        <form action="bookings.php" method="POST">
            <div class="form-group">
                <label>First Name <span style="color:var(--red)">*</span></label>
                <input type="text" name="first_name" placeholder="John" required value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Last Name <span style="color:var(--red)">*</span></label>
                <input type="text" name="last_name" placeholder="Mukasa" required value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Phone Number <span style="color:var(--red)">*</span></label>
                <input type="tel" name="phone" placeholder="(+256) 7XX XXX XXX" required value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Email Address <span style="color:var(--red)">*</span></label>
                <input type="email" name="email" placeholder="john@email.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Vehicle Year</label>
                <input type="text" name="vehicle_year" placeholder="e.g. 2019" value="<?= htmlspecialchars($_POST['vehicle_year'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Make &amp; Model</label>
                <input type="text" name="make_model" placeholder="e.g. Toyota Camry" value="<?= htmlspecialchars($_POST['make_model'] ?? '') ?>">
            </div>
            <div class="form-group full">
                <label>Service Needed <span style="color:var(--red)">*</span></label>
                <select name="service" required>
                    <option value="" disabled <?= empty($_POST['service']) ? 'selected' : '' ?>>Select a service…</option>
                    <?php
                    $services = [
                        'Oil Change','Brake Repair','Engine Repair','Transmission Repair',
                        'Auto A/C Repair','Hybrid Repair','Wheel Alignment','Tire Services',
                        'Check Engine Light','Suspension Repair','Exhaust Repair',
                        'Electrical Repair','Clutch Repair','General Maintenance','Other / Not Sure'
                    ];
                    foreach ($services as $svc) {
                        $sel = (($_POST['service'] ?? '') === $svc) ? 'selected' : '';
                        echo "<option value=\"$svc\" $sel>$svc</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group full">
                <label>Preferred Date</label>
                <input type="date" name="date" value="<?= htmlspecialchars($_POST['date'] ?? '') ?>">
            </div>
            <div class="form-group full">
                <label>Tell Us More</label>
                <textarea name="notes" placeholder="Describe the issue or any symptoms you've noticed…"><?= htmlspecialchars($_POST['notes'] ?? '') ?></textarea>
            </div>
            <div class="form-submit">
                <button type="submit" class="btn-purple">
                    <i class="fa-solid fa-calendar-check"></i> Submit Appointment Request
                </button>
            </div>
        </form>
    </div>

</div>
</main>

<?php include 'footer.php'; ?>
