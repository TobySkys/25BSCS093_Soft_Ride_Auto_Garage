<?php
// login.php
session_start(); // Start a session to keep the user logged in
require '../config/connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Look for the user in the database by email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    // 2. If user exists AND password matches the hash
    if ($user && password_verify($password, $user['password'])) {
        // Create session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Redirect to a protected page
        header("Location: ../index.php");
        exit();
    } else {
        $message = "Invalid email or password!";
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
    <title>Login Page</title>
</head>
<body>
    <div class="login">
    <form action="login.php" method="POST">
        <h1>Soft-Ride</h1>
        <h3>Auto Parts</h3>
        <div class="inputBox">
            <i class="fa-solid fa-user"></i>
            <input type="text"  id="user" name="email" placeholder="Email" required>
        </div>
        <br>
        <div class="inputBox">
            <i class="fa-solid fa-lock"></i>
            <input type="password"  id="pass" name="password" placeholder="Password" required>
        </div>
        <br>
        <br>
        <button type="submit" class="login-btn">Login</button>
        <br>
        <a href="forgot-password.php">Forgot Password?</a>
        <br>
        <p>Dont have an account.<a href="Signup.php">Create</a></p>
    </form>
   </div>
</body>
</html>