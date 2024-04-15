<?php
session_start();
include_once('../config/connect.php');

// Pastikan data yang disubmit tersedia
if(isset($_POST['test_drive_submit'])) {
    // Tangkap data yang disubmit dari formulir
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber']; // Ubah 'phone' menjadi 'phoneNumber' sesuai dengan name di input
    $address = $_POST['address'];
    $carModel = $_POST['carModel'];
    $carYear = $_POST['carYear'];
    $testDriveTime = $_POST['testDriveTime'];

    // Periksa apakah ada kolom yang kosong
    if(empty($fullName) || empty($email) || empty($phone) || empty($address) || empty($carModel) || empty($carYear) || empty($testDriveTime)) {
        // Redirect kembali ke halaman sebelumnya dengan pesan error jika ada kolom yang kosong
        header("Location: testdrive.php?error=emptyfields");
        exit();
    } else {
        // Buat query SQL untuk menyimpan data ke dalam tabel test_drive
        $query = "INSERT INTO test_drive (full_name, email, phone_number, address, car_model, car_year, test_drive_time) VALUES ('$fullName', '$email', '$phone', '$address', '$carModel', '$carYear', '$testDriveTime')";

        // Jalankan query SQL
        $result = mysqli_query($conn, $query);

        // Periksa apakah query berhasil dieksekusi
        if($result) {
            // Redirect kembali ke halaman sebelumnya dengan pesan sukses jika query berhasil
            header("refresh:2;url=testdrive.php?success=1"); // Refresh halaman setelah 5 detik
            exit();
        } else {
            // Redirect kembali ke halaman sebelumnya dengan pesan error jika query gagal dieksekusi
            header("Location: testdrive.php?error=sqlerror");
            exit();
        }
    }
} else {
    // Jika tidak ada data yang disubmit, redirect kembali ke halaman sebelumnya
    header("Location: testdrive.php");
    exit();
}
?>
