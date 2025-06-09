<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id_kamar'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$status = $_POST['status'];
$deskripsi = $_POST['deskripsi'];
$nama = $_POST['nama_kamar'];

// Mengambil data gambar lama
$gambarlama = $_POST['gambarlama'];
$folder = "../assets/img/fasilitas/";
$lokasigambarlama = $folder . $gambarlama;

// Menghapus gambar lama dari database
if (file_exists($lokasigambarlama)) {
    unlink($lokasigambarlama);
}

// Menyimpan data gambar baru ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
      $ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
      $namafoto = $nama . '.' . $ekstensi;
      $tmp = $_FILES['foto']['tmp_name'];
      $tujuan = "../assets/img/fasilitas/" . $namafoto;
    
      if (move_uploaded_file($tmp, $tujuan)) {
      echo "Gambar berhasil diupload";
      
      } else {
      echo "Gambar gagal diupload";
      }
    }
}

$query = mysqli_query($connection, "UPDATE kamar SET tipe = '$tipe', harga = '$harga', status = '$status', deskripsi = '$deskripsi', foto = '$namafoto', nama_kamar = '$nama' WHERE id_kamar='$id'");
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
