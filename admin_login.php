<?php
session_start();
require 'config/connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username  = trim($_POST['username']    ?? '');
    $password = $_POST['password']         ?? '';

    // Look up admin user (add is_admin column to users or use a separate admins table)
    $stmt = $pdo->prepare("SELECT * FROM  admins  WHERE username = ? ");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id']  = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['is_admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $message = "<div class='msg error'><i class='fa-solid fa-circle-exclamation'></i> Invalid credentials or you don't have admin access.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Admin Login | Soft-Ride Auto Garage</title>
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="brand">SOFT-RIDE <span>AUTO</span></div>
            <p style="color:var(--accent);font-size:11px;letter-spacing:0.15em;font-weight:700;text-transform:uppercase;">Admin Portal</p>
        </div>

        <h2>Admin Sign In</h2>

        <div class="alert alert-warning" style="margin-bottom:20px;">
            <i class="fa-solid fa-shield-halved"></i>
            This area is restricted to authorised staff only.
        </div>

        <?= $message ?>

        <form action="admin_login.php" method="POST" style="display:flex;flex-direction:column;gap:14px;">
            <div class="form-group">
                <label>Admin Username</label>
                <div class="inputBox">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="example" required>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="inputBox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Admin password" required>
                </div>
            </div>
            <button type="submit" class="signup-btn" style="width:100%;justify-content:center;background:#ef4444;">
                <i class="fa-solid fa-shield-halved"></i> Access Admin Panel
            </button>
        </form>

        <div class="auth-footer">
            <a href="index.php" style="color:var(--muted);">← Back to website</a>
        </div>
    </div>
</div>
</body>
</html>
