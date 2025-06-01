<?php
require_once '../../helper/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Validasi: Cek apakah email sudah digunakan
    $stmt = $connection->prepare("SELECT id FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.');
              window.location.href = '../auth/register.php';</script>";
        exit;
    }

    // Simpan ke database
    $insert = $connection->prepare("INSERT INTO pengguna (nama_pengguna, email, telepon, password) VALUES (?, ?, ?, ?)");
    $insert->bind_param("ssss", $nama, $email, $telepon, $password);

    if ($insert->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.');
              window.location.href = '../auth/login.php';</script>";
        exit;
    } else {
        echo "<script>alert('Registrasi gagal: " . $insert->error . "');
              window.location.href = '../auth/register.php';</script>";
        exit;
    }
} else {
    header("Location: ../auth/register.php");
    exit;
}
