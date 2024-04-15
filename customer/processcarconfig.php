<?php
session_start();
include_once('../config/connect.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah model mobil telah dipilih
    if (empty($_POST['carModel'])) {
        $_SESSION['alert'] = "error";
        $_SESSION['error_message'] = "Please select a car model.";
        header("Location: configuration.php");
        exit();
    }

    $carModel = $_POST['carModel'];
    $carType = $_POST['carType'];
    $carColor = $_POST['carColor'];
    $carFeatures = isset($_POST['carFeatures']) ? implode(",", $_POST['carFeatures']) : "";

    $username = $_SESSION['username'];
    $query = "INSERT INTO car_configurations (username, car_model, car_type, car_color, car_features) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $username, $carModel, $carType, $carColor, $carFeatures);
    
    if ($stmt->execute()) {
        $_SESSION['alert'] = "success";
    } else {
        $_SESSION['alert'] = "error";
    }
    header("Location: configuration.php");
    exit();
} else {
    if (isset($_SESSION['alert'])) {
        if ($_SESSION['alert'] == "success") {
            echo '<div class="alert alert-success" role="alert">Car configuration added successfully!</div>';
        } elseif ($_SESSION['alert'] == "error") {
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            } else {
                echo '<div class="alert alert-danger" role="alert">Please choose your car model first to continue. Please try again.</div>';
            }
        }
        unset($_SESSION['alert']);
    } else {
        header("Location: configuration.php");
        exit();
    }
}
?>
