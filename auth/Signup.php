<?php
require '../config/connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // using email as username
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat   = $_POST['repeat_password'];

    if ($password !== $repeat) {
        $message = "<span class='error'>Passwords do not match.</span>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([
                ':username' => $username,
                ':email'    => $email,
                ':password' => $hashed_password
            ]);
            $message = "<span class='success'>Account created! <a href='Login.php'>Login here</a></span>";
        } catch (PDOException $e) {
            $message = "<span class='error'>Error: That email is already registered.</span>";
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
    <title>Sign up Page</title>
</head>
<body>
    <div class="Signup">
    <form action="Signup.php" method="POST">
        <h1>Soft-Ride</h1>
        <h3>Auto</h3>

        <?php if ($message) echo "<p>$message</p>"; ?>

        <div class="inputBox">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="inputBox">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="inputBox">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="inputBox">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="repeat_password" placeholder="Repeat Password" required>
        </div>
        <br>
        <button type="submit" class="signup-btn">Sign Up</button>
        <a href="forgot-password.php">Forgot Password?</a>
        <p>Already have an account. <a href="login.php">Sign In</a></p>
        <h2>Or:</h2>
        <h3>Sign In with:</h3>
        <div class="logIcon">
            <a href="google-login.php"><i class="fab fa-google"></i></a>
            <a href="github-login.php"><i class="fab fa-github"></i></a>
        </div>
    </form>
    </div>
</body>
</html>
