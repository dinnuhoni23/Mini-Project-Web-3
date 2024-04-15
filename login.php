<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login - Hyundai</title>
    <style>
    </style>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>HYUNDAI</p>
        </div>

        <div class="nav-button">
            <button class="btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <!----------------------------- Form box ----------------------------------->
    <div class="form-box">
        <!------------------- login form -------------------------->

        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="regist.php" id="registerLink">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form id="loginForm" action="login_process.php" method="post">
                <div class="input-box">
                    <input type="text" name="username" class="input-field" placeholder="Username">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
            </form>
        </div>
    </div>
</div>

<img src="assets/img/cover.png" class="background-img img-fluid" alt="Background Image">
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
