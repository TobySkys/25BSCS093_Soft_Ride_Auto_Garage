
    <header>
        <div class="logo">
            <img src="assets/images/company.jpeg" alt="" width="100%" height="100%">
        </div>
        <div class="menu" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>
        <nav id="navbar">
            <ul>
                <li><a href="index.php">home</a></li>
                <?php 
                if(isset($_SESSION['user_id'])): 
                ?>
                <!--Post-Signup-->
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="#">shop parts</a></li>
                <li><a href="#">boookings</a></li>
                <li><a href="profile.php">profile</a></li>
                <button class="action-btn"><a href="index.php?logout=true">LogOut</a></button>
                <?php else: ?>
                <!--Pre-Signup-->
                <li><a href="#">about us</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="#">contact us</a></li>
                <button class="action-btn"><a href="auth/Signup.php">Signup</a></button>
                <button class="action-btn"><a href="auth/login.php">Login</a></button>
                <?php endif; ?>
            </ul>
        </nav>
    </header>