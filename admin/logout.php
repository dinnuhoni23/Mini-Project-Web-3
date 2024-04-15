<?php
session_start(); // Mulai sesi

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Arahkan pengguna ke halaman beranda
header("Location: ../index.php");
exit();
?>
