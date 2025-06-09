<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id_kamar'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$status = $_POST['status'];
$deskripsi = $_POST['deskripsi'];
$nama = $_POST['nama_kamar'];

// Menyimpan data gambar ke database
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

$query = mysqli_query($connection, "INSERT INTO kamar(id_kamar, tipe, harga, status, deskripsi, foto, nama_kamar) VALUES ('$id', '$tipe', '$harga', '$status', '$deskripsi', '$namafoto', '$nama')");
if ($query) {

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
                                          }