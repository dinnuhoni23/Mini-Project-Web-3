<?php
session_start();
include_once('../config/connect.php');

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
  <?php include 'head.php'; ?>

</head>

<body>

  <?php include 'header.php'; ?>

  <!------------------------ Title ------------------->

  <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../assets/img/cover/price.png" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-md-block">
                    <h2>CAR</h2>
                </div>
            </div>
        </div>
    </div>

    <!----------------------------------------------->

    <!------------------ Car ----------------->
    <div class="container container-fluid pt-5 pb-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
            <img src="../assets/img/car/creta.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">CRETA</h5>
                <small class="card-text">dari <strong style="color: #338de1;">Rp.297.300.000 </strong></small>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="../assets/img/car/ioniq1.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">IONIQ 6</h5>
                <small class="card-text">start <strong style="color: #338de1;">Rp.1.220.000.000</strong></small>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="../assets/img/car/ioniq.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">IONIQ 5</h5>
                <small class="card-text">start <strong style="color: #338de1;">Rp.782.000.000</strong></small>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="../assets/img/car/palisade1.png" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">PALISADE</h5>
                <small class="card-text">start <strong style="color: #338de1;">Rp.904.000.000</strong></small>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="../assets/img/car/santafe.png" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">SANTA FE</h5>
                <small class="card-text">start <strong style="color: #338de1;">Rp.625.000.000</strong></small>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="../assets/img/car/staria.png" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">STARIA</h5>
                <small class="card-text">start <strong style="color: #338de1;">Rp.924.000.000</strong></small>
            </div>
            </div>
        </div>
    </div>
    </div>

    <!------------------------------------------------->



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