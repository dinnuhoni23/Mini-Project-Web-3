<?php
session_start();
include_once('../config/connect.php');

$username = "";

// Periksa apakah ada sesi username yang tersimpan
if (isset($_SESSION['username'])) {
    // Jika ada, simpan username dari sesi
    $username = $_SESSION['username'];

    // Ambil data pengguna dari database berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah data pengguna ditemukan
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_test_drive_submit'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $car_model = $_POST['car_model'];
        $car_year = $_POST['car_year'];
        $test_drive_time = $_POST['test_drive_time'];

        $query = "INSERT INTO test_drive (full_name, email, phone_number, address, car_model, car_year, test_drive_time) VALUES ('$full_name', '$email', '$phone_number', '$address', '$car_model', '$car_year', '$test_drive_time')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: testdrive.php");
            exit();
        } else {
            echo "Failed to add new test drive.";
        }
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

<section class="cta">
    <div class="container">
        <div class="row">
            <div class="col text-center text-lg-left">
                <h3>Add New Test Drive</h3>
            </div>
        </div>
    </div>
</section>

<div class="container mt-12 pt-4 pb-4">
    <h2>Add Test Drive</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-6">
                    <label for="inputCarModel" class="form-label">Car Model</label>
                    <select id="inputCarModel" class="form-select" name="car_model" required>
                        <option disabled selected>Choose...</option>
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
                    <select id="inputCarYear" class="form-select" name="car_year" required>
                        <option disabled selected>Choose...</option>
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2020</option>
                        <option>2019</option>
                        <option>2018</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="test_drive_time" class="form-label">Test Drive Time</label>
                    <input type="datetime-local" class="form-control" id="test_drive_time" name="test_drive_time" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3 d-flex justify-content-between">
                    <a href="testdrive.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="add_test_drive_submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include '../footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
