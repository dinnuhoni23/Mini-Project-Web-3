<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Detail koneksi ke database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "hyundai";

// Buat koneksi
$conn = mysqli_connect($hostname, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
