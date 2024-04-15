<?php
session_start();
include_once('../config/connect.php');

$username = "";

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
                <h3>Test Drive Data<span> -Details- </span></h3>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-auto">
                    <a href="addtestdrive.php" class="btn btn-primary">Add Test Drive</a>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Cta Section -->


<!-- Table to display test drive details -->
<div class="container container-fluid mt-2 pb-4">
    <h2>Test Drive Details</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Car Model</th>
                <th>Car Year</th>
                <th>Test Drive Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Query to retrieve test drive details from the test_drive table
            $test_drive_query = "SELECT * FROM test_drive";
            $test_drive_result = mysqli_query($conn, $test_drive_query);

            // Display each test drive detail in a table row
            while ($test_drive_row = mysqli_fetch_assoc($test_drive_result)) {
                echo "<tr>";
                echo "<td>" . $test_drive_row['full_name'] . "</td>";
                echo "<td>" . $test_drive_row['email'] . "</td>";
                echo "<td>" . $test_drive_row['phone_number'] . "</td>";
                echo "<td>" . $test_drive_row['address'] . "</td>";
                echo "<td>" . $test_drive_row['car_model'] . "</td>";
                echo "<td>" . $test_drive_row['car_year'] . "</td>";
                echo "<td>" . $test_drive_row['test_drive_time'] . "</td>";
                echo "<td>";
                echo "<a href='edittestdrive.php?id=" . $test_drive_row['id'] . "' class='btn btn-primary'>Edit</a> ";
                echo "<a href='deletetestdrive.php?id=" . $test_drive_row['id'] . "' class='btn btn-danger ml-2' onclick=\"return confirm('Are you sure you want to delete this test drive?')\">Delete</a>";
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
