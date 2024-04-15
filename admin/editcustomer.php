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

if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    $query = "SELECT * FROM customer WHERE id = '$customer_id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $postal_code = $row['postal_code'];
        $city = $row['city'];
    } else {
        echo "Customer not found.";
        exit();
    }
} else {
    echo "Customer ID not provided.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang diubah dari form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];

    $query = "UPDATE customer SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', phone='$phone', address='$address', postal_code='$postal_code', city='$city' WHERE id='$customer_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: customer.php");
        exit();
    } else {
        echo "Failed to update customer details.";
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
                <h3>Edit Customer</h3>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 pb-4">
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $customer_id; ?>" method="post">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                </div>
        </div>
        <div class="col-md-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                </div>
                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo $postal_code; ?>">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>">
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
