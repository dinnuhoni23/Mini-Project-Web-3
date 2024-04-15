<?php
session_start();
include_once('../config/connect.php');

$username = "";
$customer_name = "";


if (isset($_SESSION['admin'])) {
    $username = $_SESSION['admin'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
    }
    $display_name = $row['username'];
} else {
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
                    <h3>Car Configuration Data<span> -Details- </span></h3>
                </div>
            </div>
        </div>
    </section><!-- End Cta Section -->

  <!-- Table to display car configuration details -->
  <div class="container container-fluid mt-5 pb-4">
    <h2>Car Configuration Details</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Car Model</th>
            <th>Car Type</th>
            <th>Car Color</th>
            <th>Car Features</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Query to retrieve car configuration details from the car_configurations table
          $car_config_query = "SELECT cc.*, c.firstname, c.lastname FROM car_configurations cc INNER JOIN customer c ON cc.username = c.username";
          $car_config_result = mysqli_query($conn, $car_config_query);

          // Display each car configuration detail in a table row
          while ($car_config_row = mysqli_fetch_assoc($car_config_result)) {
              echo "<tr>";
              echo "<td>" . $car_config_row['firstname'] . " " . $car_config_row['lastname'] . "</td>"; // Tampilkan nama pelanggan
              echo "<td>" . $car_config_row['car_model'] . "</td>";
              echo "<td>" . $car_config_row['car_type'] . "</td>";
              echo "<td><div style='width: 30px; height: 30px; background-color: " . $car_config_row['car_color'] . ";'></div></td>"; // Menampilkan warna langsung
              echo "<td>" . $car_config_row['car_features'] . "</td>";
              echo "<td>";
              echo "<a href='editcarconfig.php?id=" . $car_config_row['id'] . "' class='btn btn-primary'>Edit</a> ";
              echo "<a href='deletecarconfig.php?id=" . $car_config_row['id'] . "' class='btn btn-danger ml-2' onclick=\"return confirm('Are you sure you want to delete this car configuration?')\">Delete</a>";
              echo "</td>";
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include '../footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>
