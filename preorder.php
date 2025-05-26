<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, redirect ke login.php
    header("Location: forms/auth/login.php");
    exit();
}

// Jika sudah login, lanjutkan proses pre-order di sini
$id_kamar = $_POST['id_kamar'];
$user_id = $_SESSION['user'];

// Proses penyimpanan data pre-order ke database di sini
// Misal simpan ke tabel 'preorder' dengan data user_id dan id_kamar

echo "Pre-order berhasil untuk kamar ID: $id_kamar";
echo "<br>";
echo "User ID: $user_id";
?>
