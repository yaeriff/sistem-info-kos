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

// Menyimpan data gambar ke database
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

$query2 = mysqli_query($connection, "INSERT INTO pesanan (id_pemesanan, mulai_pemesanan, durasi, catatan, metode_pembayaran, id_kamar, id_pengguna, total_harga, status_pemesanan, bukti_pembayaran) VALUES ('$idpemesanan', '$tanggalpesan', '$durasi', '$catatan', '$metodebayar', '$id_kamar', '$id_pengguna', '$totalharga', '$statuspesan', '$namafoto')");
if ($query2) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
