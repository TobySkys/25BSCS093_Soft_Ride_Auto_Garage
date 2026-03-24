
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>| Soft-Ride Auto Garage |</title>
</head>
<body>
<header>
    <div class="logo">
        <img src="assets/images/company.png" alt="Soft-Ride Auto Logo" width="100%" height="100%">
    </div>
    <a href="index.php" class="brand-wordmark">SOFT-RIDE <span>AUTO</span></a>
    <div class="menu" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>
    <nav id="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="services.php">Services</a></li>
                <li><a href="shop_parts.php">Shop Parts</a></li>
                <li><a href="bookings.php">Bookings</a></li>
                <button class="action-btn outline"><a href="admin_login.php">Admin</a></button>
                <button class="action-btn"><a href="index.php?logout=true">Log Out</a></button>
            <?php else: ?>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="bookings.php">Contact</a></li>
                <button class="action-btn outline"><a href="auth/login.php">Login</a></button>
                <button class="action-btn"><a href="auth/Signup.php">Sign Up</a></button>
            <?php endif; ?>
        </ul>
    </nav>
</header>
