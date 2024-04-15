<?php
session_start();
include_once('config/connect.php');

$username = "";

if (isset($_SESSION['customer'])) {
    $username = $_SESSION['customer'];

    $query = "SELECT * FROM customer WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['postal_code'] = $row['postal_code'];
        $_SESSION['city'] = $row['city'];
    }
    
    $display_name = $row['firstname'] . ' ' . $row['lastname'];
} else {
    $display_name = "";
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


  <!-- ======= Hero Section ======= -->
    <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div>
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide1.png);">
            <div class="carousel-container container-fluid">
            <div class="carousel-content animate__animated animate__fadeInUp" style="border-top: 5px solid #62cfea;">
                <?php if (!empty($display_name)): ?>
                <h2>Welcome to <span>Hyundai, <?php echo $display_name; ?></span></h2>
                <?php else: ?>
                <h2>Welcome to <span>Hyundai</span></h2>
                <?php endif; ?>
            </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide2.png);">
            <div class="carousel-container">
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide3.png);">
            <div class="carousel-container">
            </div>
        </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
    </section>


    <!-- ======= Cta Section ======= -->
    <section class="cta">
      <div class="container">

      <div class="row">
        <div class="col text-center text-lg-left">
          <h3>We've sold more than <span style="color: #338de1;">200 cars</span> this year!</h3>
          <p> Buying a car is a thrilling experience. Enjoy the comfort of driving and find the freedom you are looking for. 
            With our wide selection of cars, you are sure to find one that suits your needs and lifestyle.</p>
        </div>
      </div>

      </div>
    </section><!-- End Cta Section -->

  <div class="card">
    <img src="assets/img/promo.png" class="card-img" alt="...">
    <div class="card-img-overlay">
      <h5 class="card-title">Banyak Promo Menarik untuk Mobil</h5>
      <p class="card-text">Dapatkan penawaran istimewa untuk layanan perawatan dan perbaikan mobil Anda! Kami menawarkan berbagai promo menarik 
        yang dapat Anda manfaatkan. Jangan lewatkan kesempatan ini untuk merawat mobil Anda dengan harga terbaik.</p>
      <p class="card-text"><small>Last updated 3 mins ago</small></p>
    </div>
  </div>

  <?php include 'footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>
