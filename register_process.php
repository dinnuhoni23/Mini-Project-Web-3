<?php
include 'config/connect.php';

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['postal_code']) && isset($_POST['city'])) {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); 
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    

    $sql = "INSERT INTO customer (firstname, lastname, username, email, password, phone, address, postal_code, city) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$phone', '$address', '$postal_code', '$city')";

    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert('Registration successful. Redirecting to login page...');</script>";
        header("refresh:2; url=login.php"); 
    } else {
        // Error in registration
        echo "<script>alert('Error: Registration failed. Please try again later.');</script>";
    }
} else {
    // If all fields are not provided
    echo "All fields are required.";
}

// Close connection
mysqli_close($conn);
?>
