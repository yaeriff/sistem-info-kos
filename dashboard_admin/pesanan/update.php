<?php
session_start();
require_once '../helper/connection.php';

$idpemesanan = $_POST['id_pemesanan'];
$tanggalpesan = $_POST['tanggalpesan'];
$durasi = $_POST['durasi'];
$catatan = $_POST['catatan'];
$metodebayar = $_POST['metode'];
$id_kamar = $_POST['id_kamar'];
$id_pengguna = $_POST['id_pengguna'];
$statuspesan = $_POST['statuspesan'];

$query = mysqli_query($connection, "SELECT harga FROM kamar WHERE id_kamar='$id_kamar'");
$data = mysqli_fetch_assoc($query);
$harga = $data['harga'];

$totalharga = $harga * $durasi;

// Mengambil data gambar lama
$gambarlama = $_POST['gambarlama'];
$folder = "../assets/img/bukti/";
$lokasigambarlama = $folder . $gambarlama;

// Menghapus gambar lama dari database
if (file_exists($lokasigambarlama)) {
    unlink($lokasigambarlama);
}

// Menyimpan data gambar baru ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
      $ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
      $namafoto = 'Bukti_ID' . $idpemesanan . '.' . $ekstensi;
      $tmp = $_FILES['foto']['tmp_name'];
      $tujuan = "../assets/img/bukti/" . $namafoto;
    
      if (move_uploaded_file($tmp, $tujuan)) {
      echo "Gambar berhasil diupload";
      
      } else {
      echo "Gambar gagal diupload";
      }
    }
}

$query2 = mysqli_query($connection, "UPDATE pesanan SET mulai_pemesanan='$tanggalpesan', durasi='$durasi', catatan='$catatan', metode_pembayaran='$metodebayar', id_kamar='$id_kamar', id_pengguna='$id_pengguna', total_harga='$totalharga', status_pemesanan='$statuspesan', bukti_pembayaran='$namafoto' WHERE id_pemesanan='$idpemesanan'");

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
