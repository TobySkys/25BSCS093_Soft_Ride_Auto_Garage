<?php
// book_service.php — handles appointment form submissions (POST only)
session_start();
require 'config/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: bookings.php");
    exit();
}

$firstName   = trim($_POST['first_name']   ?? '');
$lastName    = trim($_POST['last_name']    ?? '');
$phone       = trim($_POST['phone']        ?? '');
$email       = trim($_POST['email']        ?? '');
$vehicleYear = trim($_POST['vehicle_year'] ?? '');
$makeModel   = trim($_POST['make_model']   ?? '');
$service     = trim($_POST['service']      ?? '');
$date        = trim($_POST['date']         ?? '') ?: null;
$notes       = trim($_POST['notes']        ?? '');

if (!$firstName || !$lastName || !$phone || !$email || !$service) {
    header("Location: bookings.php?error=missing_fields");
    exit();
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO bookings
            (first_name, last_name, phone, email, vehicle_year, make_model, service_name, booking_date, notes, status)
        VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')
    ");
    $stmt->execute([$firstName, $lastName, $phone, $email, $vehicleYear, $makeModel, $service, $date, $notes]);

    header("Location: bookings.php?success=1");
} catch (PDOException $e) {
    header("Location: bookings.php?error=db");
}
exit();
