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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang diinput dari form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Password
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];

    // Hash password menggunakan md5
    $hashed_password = md5($password);

    // Query untuk menambahkan data pelanggan baru
    $query = "INSERT INTO customer (firstname, lastname, username, email, password, phone, address, postal_code, city) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$phone', '$address', '$postal_code', '$city')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: customer.php");
        exit();
    } else {
        echo "Failed to add new customer.";
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
                    <h3>Add New Customer</h3>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5 pb-4">
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="number" class="form-control" id="postal_code" name="postal_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="customer.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Main JS File -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>
