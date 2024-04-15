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
    if (isset($_POST['edit_test_drive_submit'])) {
        $test_drive_id = $_POST['test_drive_id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $car_model = $_POST['car_model'];
        $car_year = $_POST['car_year'];
        $test_drive_time = $_POST['test_drive_time'];

        $query = "UPDATE test_drive SET full_name='$full_name', email='$email', phone_number='$phone_number', address='$address', car_model='$car_model', car_year='$car_year', test_drive_time='$test_drive_time' WHERE id='$test_drive_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: testdrive.php");
            exit();
        } else {
            echo "Failed to update test drive details.";
        }
    }
}

if (isset($_GET['id'])) {
    $test_drive_id = $_GET['id'];

    $query = "SELECT * FROM test_drive WHERE id = '$test_drive_id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $full_name = $row['full_name'];
        $email = $row['email'];
        $phone_number = $row['phone_number'];
        $address = $row['address'];
        $car_model = $row['car_model'];
        $car_year = $row['car_year'];
        $test_drive_time = $row['test_drive_time'];
    } else {
        echo "Test drive not found.";
        exit();
    }
} else {
    echo "Test drive ID not provided.";
    exit();
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
                <h3>Edit -Test Drive- </h3>
            </div>
        </div>
    </div>
</section>

<div class="container mt-12 pt-4 pb-4">
    <h2>Edit Test Drive</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="test_drive_id" value="<?php echo $test_drive_id; ?>">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $full_name; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="col-md-6">
            <div class="col-md-6">
                <label for="inputCarModel" class="form-label">Car Model</label>
                <select id="inputCarModel" class="form-select" name="car_model" required>
                    <option disabled>Choose...</option>
                    <option value="creta alpha" <?php if ($car_model == 'creta alpha') echo 'selected'; ?>>Creta Alpha</option>
                    <option value="stargazer x" <?php if ($car_model == 'stargazer x') echo 'selected'; ?>>Stargazer X</option>
                    <option value="stargazer" <?php if ($car_model == 'stargazer') echo 'selected'; ?>>Stargazer</option>
                    <option value="creta" <?php if ($car_model == 'creta') echo 'selected'; ?>>Creta</option>
                    <option value="ioniq 5" <?php if ($car_model == 'ioniq 5') echo 'selected'; ?>>Ioniq 5</option>
                    <option value="new palisade" <?php if ($car_model == 'new palisade') echo 'selected'; ?>>New Palisade</option>
                    <option value="sante fe" <?php if ($car_model == 'sante fe') echo 'selected'; ?>>Sante Fe</option>
                    <option value="ioniq 6" <?php if ($car_model == 'ioniq 6') echo 'selected'; ?>>Ioniq 6</option>
                    <option value="staria" <?php if ($car_model == 'staria') echo 'selected'; ?>>Staria</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCarYear" class="form-label">Car Year</label>
                <select id="inputCarYear" class="form-select" name="car_year" required>
                    <option disabled>Choose...</option>
                    <option <?php if ($car_year == '2024') echo 'selected'; ?>>2024</option>
                    <option <?php if ($car_year == '2023') echo 'selected'; ?>>2023</option>
                    <option <?php if ($car_year == '2022') echo 'selected'; ?>>2022</option>
                    <option <?php if ($car_year == '2021') echo 'selected'; ?>>2021</option>
                    <option <?php if ($car_year == '2020') echo 'selected'; ?>>2020</option>
                    <option <?php if ($car_year == '2019') echo 'selected'; ?>>2019</option>
                    <option <?php if ($car_year == '2018') echo 'selected'; ?>>2018</option>
                </select>
            </div>

                <div class="mb-3">
                    <label for="test_drive_time" class="form-label">Test Drive Time</label>
                    <input type="datetime-local" class="form-control" id="test_drive_time" name="test_drive_time" value="<?php echo $test_drive_time; ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3 d-flex justify-content-between">
                    <a href="testdrive.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="edit_test_drive_submit">Submit</button>
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
