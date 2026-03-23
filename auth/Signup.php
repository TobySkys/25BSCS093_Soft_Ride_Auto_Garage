<?php
require '../config/connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email']    ?? '');
    $password = $_POST['password']         ?? '';
    $repeat   = $_POST['repeat_password']  ?? '';

    if (!$username || !$email || !$password) {
        $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> All fields are required.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> Please enter a valid email address.</div>";
    } elseif (strlen($password) < 8) {
        $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> Password must be at least 8 characters.</div>";
    } elseif ($password !== $repeat) {
        $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> Passwords do not match.</div>";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql    = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt   = $pdo->prepare($sql);
        try {
            $stmt->execute([':username' => $username, ':email' => $email, ':password' => $hashed]);
            $message = "<div class='msg success'><i class='fa-solid fa-circle-check'></i> Account created! <a href='login.php'>Sign in here →</a></div>";
        } catch (PDOException $e) {
            $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> That email address is already registered. <a href='login.php'>Log in instead?</a></div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/icons/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Create Account | Soft-Ride Auto Garage</title>
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="brand">SOFT-RIDE <span>AUTO</span></div>
            <p>Entebbe, Uganda — Est. 2024</p>
        </div>

        <h2>Create Account</h2>

        <?= $message ?>

        <form action="Signup.php" method="POST" style="display:flex;flex-direction:column;gap:14px;">
            <div class="form-group">
                <label>Username</label>
                <div class="inputBox">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Your name" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <div class="inputBox">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="you@email.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="inputBox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Min. 8 characters" required>
                </div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <div class="inputBox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="repeat_password" placeholder="Repeat password" required>
                </div>
            </div>
            <button type="submit" class="signup-btn" style="width:100%;justify-content:center;margin-top:4px;">
                <i class="fa-solid fa-user-plus"></i> Create Account
            </button>
        </form>

        <div class="auth-divider"><span>or continue with</span></div>

        <div class="social-btns">
            <a href="google-login.php" class="social-btn"><i class="fab fa-google"></i> Google</a>
            <a href="github-login.php" class="social-btn"><i class="fab fa-github"></i> GitHub</a>
        </div>

        <div class="auth-footer">
            Already have an account? <a href="login.php">Sign in</a>
        </div>
    </div>
</div>
</body>
</html>
