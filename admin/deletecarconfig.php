<?php
session_start();
include_once('../config/connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query to delete car configuration
    $delete_query = "DELETE FROM car_configurations WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['alert'] = "success"; // Set alert success
    header("Location: configuration.php"); // Redirect back to car configuration page
    exit();
} else {
    $_SESSION['alert'] = "error"; // Set alert error
    header("Location: configuration.php"); // Redirect back to car configuration page
    exit();
}
?>
