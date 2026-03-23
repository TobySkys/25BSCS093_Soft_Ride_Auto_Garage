<?php
session_start();
require_once '../config/connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $stmt =$pdo->prepare("SELECT * FROM admins WHERE username=:username");
    $stmt->execute(['username'=> $username]);
    $admin =$stmt->fetch();
    if($admin && password_verify($password,$admin['password'])){
        $_SESSION['admin']= true;
        $_SESSION['admin_username']= $admin['username'];
        header("Location: ../admin_dashboard.php");
        exit();
    }else{
        $error="Invalid username or password";
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
    <title>Admin Login|</title>
</head>
<body>
    <main>
    <form action="admin_login.php" method="POST" style="display:flex;flex-direction:column;gap:14px;">
        <?php if(!empty($error)): ?>
            <p style="color:red;"><?= $error ?></p>
            <?php endif; ?>
            <div class="form-group">
                <label>Email Address</label>
                <div class="inputBox">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="inputBox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="admin_login_btn" style="width:100%;justify-content:center;">
                <i class="fa-solid fa-right-to-bracket"></i>Login
            </button>
        </form>
</main>
</body>
</html>