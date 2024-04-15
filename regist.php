<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Registration - Hyundai</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>HYUNDAI</p>
        </div>
        <div class="nav-button">
            <button class="btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn white-btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        <!------------------- registration form -------------------------->

        <div class="login-container" id="register">
            <div class="top">
                <span>Already have an account? <a href="login.php">Sign In</a></span>
                <header>Registration</header>
            </div>
            <form id="registrationForm" action="register_process.php" method="post" onsubmit="register(event)">

            <!-- <form action="register_process.php" method="post"> -->
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" name="firstname" class="input-field" placeholder="Firstname" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="lastname" class="input-field" placeholder="Lastname" required>
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="username" class="input-field" placeholder="Username" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" class="input-field" placeholder="Email" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="tel" name="phone" class="input-field" placeholder="Phone" required>
                    <i class="bx bx-phone"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="address" class="input-field" placeholder="Address" required>
                    <i class="bx bx-map"></i>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="number" name="postal_code" class="input-field" placeholder="Postal Code" required>
                        <i class="bx bx-map"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="city" class="input-field" placeholder="City" required>
                        <i class="bx bxs-city"></i>
                    </div>
                </div>

                <div class="input-box">
                    <input type="submit" class="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>   
<img src="assets/img/cover.png" class="background-img img-fluid" alt="Background Image">

<script src="assets/js/script.js"></script>

</body>
</html>
