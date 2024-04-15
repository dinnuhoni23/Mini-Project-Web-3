<?php
session_start();
include_once('../config/connect.php');

$username = "";

// Periksa apakah ada sesi username yang tersimpan
if (isset($_SESSION['username'])) {
    // Jika ada, simpan username dari sesi
    $username = $_SESSION['username'];

    // Ambil data pengguna dari database berdasarkan username
    $query = "SELECT * FROM customer WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah data pengguna ditemukan
    if ($row = mysqli_fetch_assoc($result)) {
        // Simpan data pengguna ke dalam sesi
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['postal_code'] = $row['postal_code'];
        $_SESSION['city'] = $row['city'];
    }
    
    // Gabungkan nama firstname dan lastname
    $display_name = $row['firstname'] . ' ' . $row['lastname'];
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

    <!-- ======= Cta Section ======= -->
    <section class="cta">
        <div class="container">
            <div class="row">
                <div class="col text-center text-lg-left">
                    <h3>We've served more than anyone else<span> -Test Drive- </span> Now!</h3>
                </div>
            </div>
        </div>
    </section><!-- End Cta Section -->

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/img/car/creta.png" class="d-block w-50 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color: black; background:white">CRETA</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/car/ioniq1.png" class="d-block w-50 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color: black; background:white">IONIQ 6</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/car/ioniq.png" class="d-block w-50 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color: black; background:white">IONIQ 5</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/car/palisade1.png" class="d-block w-50 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color: black; background:white">PALISADE</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/car/santafe.png" class="d-block w-50 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color: black; background:white">SANTA FE</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/car/staria.png" class="d-block w-50 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color: black; background:white">STARIA</h5>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>




    <!------------------------ Form ------------------------>
    <div class="container container-fluid pt-4 pb-4 px-5">
    <h2 class="text-center">FORM TEST DRIVE</h2>
    <form class="row g-3 mt-3" id="testDriveForm" action="prosestestdrive.php" method="POST">
    <div class="col-md-6">
        <label for="inputFullName" class="form-label">Full Name</label>
        <input name="fullName" type="text" class="form-control" id="inputFullName" placeholder="Enter your full name" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>" readonly required>
    </div>
    <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>" readonly required>
    </div>
    <div class="col-12">
        <label for="inputPhone" class="form-label">Phone Number</label>
        <input name="phoneNumber" type="tel" class="form-control" id="inputPhone" placeholder="Enter your phone number" value="<?php echo $_SESSION['phone']; ?>" readonly required>
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input name="address" type="text" class="form-control" id="inputAddress" placeholder="Enter your address" value="<?php echo $_SESSION['address']; ?>" readonly required>
    </div>

    <div class="col-md-6">
        <label for="inputCarModel" class="form-label">Car Model</label>
        <select id="inputCarModel" class="form-select" name="carModel" required>
            <option selected disabled>Choose...</option>
            <option value="creta alpha">Creta Alpha</option>
            <option value="stargazer x">Stargazer X</option>
            <option value="stargazer">Stargazer</option>
            <option value="creta">Creta</option>
            <option value="ioniq 5">Ioniq 5</option>
            <option value="new palisade">New Palisade</option>
            <option value="sante fe">Sante Fe</option>
            <option value="ioniq 6">Ioniq 6</option>
            <option value="staria">Staria</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputCarYear" class="form-label">Car Year</label>
        <select id="inputCarYear" class="form-select" name="carYear" required>
            <option selected disabled>Choose...</option>
            <option>2024</option>
            <option>2023</option>
            <option>2022</option>
            <option>2021</option>
            <option>2020</option>
            <option>2019</option>
            <option>2018</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputTestDriveTime" class="form-label">Test Drive Time</label>
        <input type="datetime-local" id="inputTestDriveTime" class="form-control" name="testDriveTime" required>
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required> <!-- Dijadikan required -->
            <label class="form-check-label" for="gridCheck" name="agree">
                I agree to the terms and conditions
            </label>
        </div>
    </div>
    <div class="col-12">
        <input type="submit" class="btn btn-primary" id="submitBtn" name="test_drive_submit" value="Schedule Test Drive">
    </div>
</form>

</div>


    <!-- Modal untuk notifikasi keberhasilan booking -->



    <?php include '../footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function validateForm() {
            var carModel = $('#inputCarModel').val();
            var carYear = $('#inputCarYear').val();
            if (carModel === null || carModel === "" || carModel === "Choose...") {
                alert('Please select a car model.');
                return false;
            }
            if (carYear === null || carYear === "" || carYear === "Choose...") {
                alert('Please select a car year.');
                return false;
            }
            alert('Your test drive schedule has been successfully submitted.');
            return true;
        }
        
      function validateForm() {
          var formInputs = $('#bookingForm input, #bookingForm select');
          for (var i = 0; i < formInputs.length; i++) {
              if ($(formInputs[i]).val() === '' || $(formInputs[i]).val() === null) {
                  alert('Please fill in all fields.');
                  return false;
              }
          }
          alert('Your booking service has been successfully submitted.');
      }
  </script>


    <!-- Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>
