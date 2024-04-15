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
            <img src="../assets/img/cover/cover2.png" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-md-block">
                    <h2>ABOUT</h2>
                </div>
            </div>
        </div>
    </div>

<!----------------------------------------------->

  <!------------------- About ------------------------>
<div class="container container-fluid pt-5 pb-5">
<div class="card container-fluid">
  <div class="card-header"> <h3> ABOUT</h3>
  </div>
  <div class="card-body">
    <h5 class="card-title">Tentang Kami</h5>
    <p class="card-text">Hyundai Motor Manufacturing Indonesia dimulai pada Agustus 2019 dengan di tandatanganinya MOU oleh pihak Pemerintah 
        Republik Indonesia dengan Hyundai Motor Company (HMC) di Ulsan, Korea Selatan.
    Hyundai Motor Manufacturing Indonesia memproduksi 4 tipe kendaraan, dengan bangga Hyundai Motor Manufacturing 
    Indonesia memproduksi EV pertama di Indonesia yaitu IONIQ pada Maret 2022
    Hyundai Motor Manufacturing Indonesia memiliki 3 komitmen sebagai perusahaan ramah lingkungan, 
    ramah pekerja dan kami ingin bertumbuh bersama perusahaan-perusahaan yang ada di Indonesia sebagai upaya kerja sama antara Korea Selatan – Indonesia
    Hyundai Motor Manufacturing Indonesia membuka program baru yang berupa Program Pabrik Tur Hyundai yang menjadi fasilitas edukasi tentang Hyundai 
    Motor Manufacturing Indonesia, peninjauan proses pembuatan mobil Hyundai, memahami tentang keselamatan karyawan Hyundai Motor Manufacturing Indonesia.</p>
    <a href="index.php" class="btn btn-primary">Back to Home</a>
  </div>
</div>
</div>


  <!-------------------------------------------------------------------->

  <?php include '../footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>
</html>