<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nama = $_POST['nama_pengguna'];
$email = $_POST['email'];
$role = $_POST['role'];
$notelp = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];

// Mengganti Password Jika diisi
$passwordbaru = $_POST['passwordbaru'];
if (!empty($passwordbaru)) {
  $hashpasswordbaru = password_hash("$passwordbaru", PASSWORD_DEFAULT);
}

// Menyimpan data gambar baru ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
      $ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
      $namafoto = $nama . '.' . $ekstensi;
      $tmp = $_FILES['foto']['tmp_name'];
      $tujuan = "../assets/img/ktp/" . $namafoto;
    
      if (move_uploaded_file($tmp, $tujuan)) {
      echo "Gambar berhasil diupload";
      
      } else {
      echo "Gambar gagal diupload";
      }
    }
}

if (!empty($passwordbaru)) {
  $query = mysqli_query($connection, "UPDATE pengguna SET nama_pengguna = '$nama', email = '$email', role = '$role', nomor_telepon = '$notelp', password = '$hashpasswordbaru', alamat = '$alamat' WHERE id = '$id'");
} else {
  $query = mysqli_query($connection, "UPDATE pengguna SET nama_pengguna = '$nama', email = '$email', role = '$role', nomor_telepon = '$notelp', alamat = '$alamat' WHERE id = '$id'");
}

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
