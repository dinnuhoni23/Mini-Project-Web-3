<?php
session_start();
include_once('config/connect.php');

$username = "";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); 
        $_SESSION['username'] = $row['username'];
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hyundai</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/animate.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body>

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <div class="logo">
            <h1 class="text-light"><a href="index.php">HYUNDAI</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="testdrive.php">Test Drive</a></li>
                <li><a href="price.php">Price</a></li>
                <li class="dropdown active">
                    <a href="about.php"><span>About</span> <i class="bx bx-chevron-down"></i></a>
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="visi-misi.php">Vission & Mission</a></li>
                        <li><a href="structure.php">Structure</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact</a></li>
                <li class="dropdown">
                    <?php if(!empty($username)): ?>
                        <a href="#"><span><?php echo $username; ?></span> <i class="bx bx-chevron-down"></i></a>
                        <ul>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <a href="#"><span>Login</span> <i class="bx bx-chevron-down"></i></a>
                        <ul>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
            <i class="bx bx-menu mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->


  <!------------------- Visi Misi ------------------------>
    <div class="container container-fluid pt-5 pb-5">
        <div class="card mb-3">
        <h2 class="card-title text-center mt-2">Vission & Mission</h2>
        <img src="assets/img/cover/cover4.png" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
            <p class="card-text">Sebagai perusahaan besar yang disegani melalui produknya yang ditawarkan,
                perusahaan PT Hyundai Mobil Indonesia mempunyai landasan yang menjadi kunci sukses dan
                acuan dalam memberikan pelayanan yang terbaik dan produk dengan kualitas dan teknologi
                tinggi kepada pelanggan. Dalam perjalanannya, PT Hyundai Mobil Indonesia mencanangkan
                “Menjadi Agen Tunggal juga Distributor yang Disegani” dan “Mampu bersaing menyediakan
                mobil berkualitas, serta memiliki keseragaman jaringan berstandar global, dan mengerti
                keinginan pelanggan” sebagai visi misi mereka.
            </p>
            <p>
                Visi misi ini mengantarkan PT Hyundai Mobil Indonesia menjadi perusahaan leading
                pada teknologi yang mereka tawarkan, sehingga perlu adanya komitmen pada pelayanan dan
                inovasi produk untuk mempertahankan pencapaian tersebut.</p>
        </div>
        </div>
    </div>


  <!-------------------------------------------------------------------->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>HYUNDAI</h3>
            <p>
            Jl. A. Wahab Syahranie No.102,<br>
              Kota Samarinda<br>
              Kalimantan Timur 75131 <br><br>
              <strong>Whatsapp:</strong> 021-31182572<br>
              <strong>Email:</strong> hyundai@email.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.php">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Get the latest news and exciting offers delivered directly to your email.</p>
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your email" style="color: black;"><input type="submit" value="Subscribe" style="background: grey">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Hyundai</span></strong>. All Rights Reserved
        </div>

      </div>
    </div>
  </footer><!-- End Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>
</html>