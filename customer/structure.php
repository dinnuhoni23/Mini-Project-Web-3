<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  include 'head.php';
  ?>

</head>

<body>

  <!------------------- Header ------------------------>
  <?php
  include 'header.php';
  ?>


  <!------------------- Structure ------------------------>
  <div class="container container-fluid pt-4 pb-4">
  <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">Structure</h3>
            <p class="card-text">Struktur organisasi PT Hyundai Mobil Indonesia memiliki ciri-ciri yang saling terhubung satu
                sama lain antar divisi. Hal ini memungkinkan antar divisi memiliki komunikasi dan pengerjaan
                tugas yang lebih cepat dan terstruktur serta meminimalkan adanya misinformasi dan
                miskomunikasi antar divisi internal perusahaan.</p>
        </div>
        <img src="../assets/img/structure.png" class="card-img-bottom" alt="..." height="600px" width="300px">
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').click(function() {
            if (validateForm()) {
                $('#exampleModal').modal('show');
                $('#exampleModal').on('hidden.bs.modal', function() {
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
        alert('Your booking service has been successfully submitted.');
    }

</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>