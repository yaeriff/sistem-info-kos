<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$tanggalbuat = $_POST['tanggal_pembuatan'];
$nama = $_POST['nama_pengguna'];
$email = $_POST['email'];
$role = $_POST['role'];
$notelp = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];

// Hash Password
$password = $_POST['password'];
$hashpassword = password_hash("$password", PASSWORD_DEFAULT);

// Menyimpan data gambar ke database
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

$query = mysqli_query($connection, "INSERT INTO pengguna(id, tanggal_pembuatan, nama_pengguna, email, role, nomor_telepon, password, alamat, ktp) VALUES ('$id', '$tanggalbuat', '$nama', '$email', '$role', '$notelp', '$hashpassword', '$alamat', '$namafoto')");
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