<?php
session_start();
include_once('config/connect.php');

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
                <li><a href="../contact.php">Contact</a></li>
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


    <!------------------------ Form ------------------------>
    <div class="container container-fluid pt-4 pb-4 px-5">
        <h2 class="text-center">FORM TEST DRIVE</h2>
        <form class="row g-3 mt-3" id="testDriveForm" action="login.php" method="POST">
            <div class="col-md-6">
                <label for="inputFullName" class="form-label">Full Name</label>
                <input name="fullName" type="text" class="form-control" id="inputFullName" placeholder="Enter your full name" readonly required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter your email"  readonly required>
            </div>
            <div class="col-12">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <input name="phoneNumber" type="tel" class="form-control" id="inputPhone" placeholder="Enter your phone number" readonly required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input name="address" type="text" class="form-control" id="inputAddress" placeholder="Enter your address" readonly required>
            </div>

            <div class="col-md-6">
                <label for="inputCarModel" class="form-label">Car Model</label>
                <select id="inputCarModel" class="form-select" name="carModel" readonly required>
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
            <select id="inputCarYear" class="form-select" name="carYear">
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
            <input type="datetime-local" id="inputTestDriveTime" class="form-control" name="testDriveTime" readonly>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck" name="agree">
                    I agree to the terms and conditions
                </label>
            </div>
        </div>
        <div class="col-12">
        <input type="submit" class="btn btn-primary" id="submitBtn" name="book_submit" value="Test Drive Submit">
        </div>
    </form>

    </div>

        </form>
    </div>

    <!-- Modal untuk meminta login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <p>You need to login to access the test drive.</p>
                </div>
                <div class="modal-footer">
                    <a href="login.php" class="btn btn-primary">Login</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
          // Menampilkan modal login
          $('#loginModal').modal('show');

          // Mengatur event handler untuk tombol submit
          $('#submitBtn').click(function() {
              if (validateForm()) {
                  $('#successModal').modal('show');
                  $('#successModal').on('hidden.bs.modal', function() {
                      $('#bookingForm')[0].reset();
                  });
              }
          });
      });

      function validateForm() {
          var formInputs = $('#bookingForm input, #bookingForm select');
          for (var i = 0; i < formInputs.length; i++) {
              if ($(formInputs[i]).val() === '' || $(formInputs[i]).val() === null) {
                  alert('Please fill in all fields.');
                  return false;
              }
          }
      }
  </script>


    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
