<?php
session_start();
require_once '../../helper/connection.php';

if (!isset($_SESSION['login'])) {
  header('Location: ../../forms/auth/login.php');
  exit;
}

$id_user = $_SESSION['login']['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

// Cek apakah ada file KTP yang diupload
$ktp_path = $_SESSION['login']['ktp']; // default ke path lama
if (isset($_FILES['ktp']) && $_FILES['ktp']['error'] == UPLOAD_ERR_OK) {
  $uploadDir = '../uploads/ktp/';
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  $fileTmp = $_FILES['ktp']['tmp_name'];
  $fileName = uniqid('ktp_') . '_' . basename($_FILES['ktp']['name']);
  $filePath = $uploadDir . $fileName;

  if (move_uploaded_file($fileTmp, $filePath)) {
    $ktp_path = 'uploads/ktp/' . $fileName;

    // Hapus file lama (jika berbeda dan file lama bukan default)
    if ($_SESSION['login']['ktp'] !== $ktp_path && file_exists('../' . $_SESSION['login']['ktp'])) {
      unlink('../' . $_SESSION['login']['ktp']);
    }
  }
}

// Update data ke database
$query = "UPDATE pengguna SET nama_pengguna = ?, email = ?, telepon = ?, alamat = ?, ktp = ? WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "sssssi", $nama, $email, $telepon, $alamat, $ktp_path, $id_user);
$success = mysqli_stmt_execute($stmt);

// Update session juga
if ($success) {
  $_SESSION['login']['nama_pengguna'] = $nama;
  $_SESSION['login']['email'] = $email;
  $_SESSION['login']['telepon'] = $telepon;
  $_SESSION['login']['alamat'] = $alamat;
  $_SESSION['login']['ktp'] = $ktp_path;
  header("Location: ../index.php?page=profile&status=success");
} else {
  header("Location: ../index.php?page=profile&status=fail");
}
