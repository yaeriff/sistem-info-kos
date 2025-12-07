<?php
session_start();
require '../../helper/connection.php';

$id_pemesanan = $_POST['id_pemesanan'];
$metode = $_POST['metode_pembayaran'];
$durasi = $_POST['durasi'];
$total = $_POST['total_harga'];

$mulai_baru = date('Y-m-d');
$status_pembayaran = 'lunas';

// Update pesanan lama
$query = "UPDATE pesanan 
          SET mulai_pemesanan = ?, 
              durasi = ?, 
              total_harga = ?, 
              metode_pembayaran = ?, 
              status_pembayaran = ? 
          WHERE id_pemesanan = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'sisssi', $mulai_baru, $durasi, $total, $metode, $status_pembayaran, $id_pemesanan);
$success = mysqli_stmt_execute($stmt);

if ($success) {
    header("Location: ../index.php?page=profile&msg=bayar_ulang_sukses");
} else {
    header("Location: ../index.php?page=profile&msg=bayar_ulang_gagal");
}
?>
