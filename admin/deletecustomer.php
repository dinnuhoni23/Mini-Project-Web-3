<?php
session_start();
include_once('../config/connect.php');

// Periksa apakah ada parameter ID yang diterima
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Query untuk menghapus data customer berdasarkan ID
    $query = "DELETE FROM customer WHERE id='$customer_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: customer.php");
        exit();
    } else {
        echo "Failed to delete customer.";
    }
} else {
    echo "Customer ID not provided.";
    exit();
}
?>
