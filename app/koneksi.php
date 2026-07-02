<?php
// Konfigurasi database untuk Docker

$host = "db";
$username = "user";
$password = "password";
$database = "pengaduan";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
