<?php
session_start();
require '../config/connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']    ?? '');
    $password = $_POST['password']         ?? '';

    if (!$email || !$password) {
        $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> Please enter your email and password.</div>";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email']    = $user['email'];
            header("Location: ../index.php");
            exit();
        } else {
            $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> Incorrect email or password.</div>";
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
    <title>Sign In | Soft-Ride Auto Garage</title>
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="brand">SOFT-RIDE <span>AUTO</span></div>
            <p>Entebbe, Uganda — Est. 2024</p>
        </div>

        <h2>Welcome Back</h2>

        <?= $message ?>

        <form action="login.php" method="POST" style="display:flex;flex-direction:column;gap:14px;">
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
                    <input type="password" name="password" placeholder="Your password" required>
                </div>
            </div>
            <div style="text-align:right;margin-top:-8px;">
                <a href="forgot-password.php" style="font-size:12px;color:var(--muted);">Forgot password?</a>
            </div>
            <button type="submit" class="signup-btn" style="width:100%;justify-content:center;">
                <i class="fa-solid fa-right-to-bracket"></i> Sign In
            </button>
        </form>

        <div class="auth-divider"><span>or continue with</span></div>

        <div class="social-btns">
            <a href="google-login.php" class="social-btn"><i class="fab fa-google"></i> Google</a>
            <a href="github-login.php" class="social-btn"><i class="fab fa-github"></i> GitHub</a>
        </div>

        <div class="auth-footer">
            Don't have an account? <a href="Signup.php">Sign up free</a>
        </div>
    </div>
</div>
</body>
</html>
