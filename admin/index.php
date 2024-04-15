<?php
session_start();
include_once('../config/connect.php');

$username = "";

// Periksa apakah ada sesi username yang tersimpan
if (isset($_SESSION['admin'])) {
    // Jika ada, simpan username dari sesi
    $username = $_SESSION['admin'];

    // Ambil data pengguna dari database berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah data pengguna ditemukan
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
    }
    
    // Gabungkan nama firstname dan lastname
    $display_name = $row['username'];
} else {
    // Jika tidak ada sesi username, atur display_name menjadi string kosong
    $display_name = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>

</head>

<body>

  <?php include 'header.php'; ?>

  <!-- ======= Hero Section ======= -->

    <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div>
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(../assets/img/slide/slide1.png);">
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
        <div class="carousel-item" style="background-image: url(../assets/img/slide/slide2.png);">
            <div class="carousel-container">
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/slide3.png);">
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
    <img src="../assets/img/promo.png" class="card-img" alt="...">
    <div class="card-img-overlay">
      <h5 class="card-title">Banyak Promo Menarik untuk Mobil</h5>
      <p class="card-text">Dapatkan penawaran istimewa untuk layanan perawatan dan perbaikan mobil Anda! Kami menawarkan berbagai promo menarik 
        yang dapat Anda manfaatkan. Jangan lewatkan kesempatan ini untuk merawat mobil Anda dengan harga terbaik.</p>
      <p class="card-text"><small>Last updated 3 mins ago</small></p>
    </div>
  </div>

  <?php include '../footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>
</html>
