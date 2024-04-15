<?php
session_start();
include_once('../config/connect.php');

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $test_drive_id = $_GET['id'];

    $query = "DELETE FROM test_drive WHERE id = '$test_drive_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        echo "<script>alert('Test drive data has been successfully deleted.'); window.location.href='testdrive.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to delete test drive data.'); window.location.href='testdrive.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Test drive ID not provided.'); window.location.href='testdrive.php';</script>";
    exit();
}
?>
