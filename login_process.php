<?php
include 'config/connect.php';

// session_start(); 

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $pwadmin = $_POST['password'];

    // Query untuk mencari admin
    $admin_sql = "SELECT * FROM users WHERE (username = '$username' OR username = '$username') AND password = '$pwadmin'";

    // Query untuk mencari pelanggan
    $customer_sql = "SELECT * FROM customer WHERE (username = '$username' OR username = '$username') AND password = '$password'";

    // Periksa apakah pengguna adalah admin
    $admin_result = mysqli_query($conn, $admin_sql);
    if(mysqli_num_rows($admin_result) == 1) {
        // Jika admin ditemukan, buat sesi admin_username dan arahkan ke halaman admin
        $_SESSION['admin'] = $username;
        header("Location: admin/");
        exit();
    }

    // Periksa apakah pengguna adalah pelanggan
    $customer_result = mysqli_query($conn, $customer_sql);
    if(mysqli_num_rows($customer_result) == 1) {
        // Jika pelanggan ditemukan, buat sesi customer_username dan arahkan ke halaman utama
        $_SESSION['customer'] = $username;
        header("Location: customer/");
        exit();
    } else {
        // Jika tidak ada yang cocok, arahkan kembali ke halaman login dengan pesan kesalahan
        $_SESSION['error'] = "Username atau password salah";
        header("Location: login.php");
        exit();
    }
} else {
    // Jika tidak ada username atau password yang diberikan, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}
?>
