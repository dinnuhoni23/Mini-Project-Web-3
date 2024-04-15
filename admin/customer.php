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


    <!-- ======= Cta Section ======= -->
    <section class="cta">
        <div class="container">
            <div class="row">
                <div class="col text-center text-lg-left">
                    <h3>Customer Data<span> -Registration- </span></h3>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-auto">
                    <a href="addcustomer.php" class="btn btn-primary">Add Customer</a>
                </div>
            </div>
        </div>
    </section><!-- End Cta Section -->

  <!-- Table to display customer account details -->
  <div class="container container-fluid mt-5 pb-4">
    <h2>Customer Account Details</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>City</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Query to retrieve customer account details from the customer table
          $customer_query = "SELECT * FROM customer";
          $customer_result = mysqli_query($conn, $customer_query);

          // Display each customer's account details in a table row
          while ($customer_row = mysqli_fetch_assoc($customer_result)) {
              echo "<tr>";
              echo "<td>" . $customer_row['firstname'] . "</td>";
              echo "<td>" . $customer_row['lastname'] . "</td>";
              echo "<td>" . $customer_row['username'] . "</td>";
              echo "<td>" . $customer_row['email'] . "</td>";
              echo "<td>" . $customer_row['phone'] . "</td>";
              echo "<td>" . $customer_row['address'] . "</td>";
              echo "<td>" . $customer_row['postal_code'] . "</td>";
              echo "<td>" . $customer_row['city'] . "</td>";
              // Tambahkan tautan edit dan hapus dengan menyertakan ID data ke halaman edit dan delete
              echo "<td>";
              echo "<a href='editcustomer.php?id=" . $customer_row['id'] . "' class='btn btn-primary'>Edit</a> ";
              echo "<a href='deletecustomer.php?id=" . $customer_row['id'] . "' class='btn btn-danger ml-2' onclick=\"return confirm('Are you sure you want to delete this customer?')\">Delete</a>";
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
