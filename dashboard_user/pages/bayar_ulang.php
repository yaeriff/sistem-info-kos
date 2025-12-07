<?php
session_start();
require '../../helper/connection.php';

if (!isset($_GET['id'])) {
    header('Location: ../index.php?page=profile');
    exit;
}

$id_pemesanan = $_GET['id'];

// Ambil data pesanan lama
$query = "SELECT p.*, k.harga FROM pesanan p 
JOIN kamar k ON p.no_kamar = k.id_kamar 
WHERE p.id_pemesanan = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_pemesanan);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$pesanan = mysqli_fetch_assoc($result);

// Hitung total harga baru (misal durasi tetap sama)
$durasi_baru = $pesanan['durasi'];
$total_baru = $pesanan['harga'] * $durasi_baru;
?>

<h3>Perpanjang Sewa Kos</h3>
<form method="POST" action="../process/process_bayar_ulang.php">
  <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan ?>">
  <input type="hidden" name="total_harga" value="<?= $total_baru ?>">
  <input type="hidden" name="durasi" value="<?= $durasi_baru ?>">

  <p><strong>No Kamar:</strong> <?= $pesanan['no_kamar'] ?></p>
    <p><strong>nama_kamar:</strong><?= $pesanan['nama_kamar']?></p>
  <p><strong>Durasi:</strong> <?= $durasi_baru ?> bulan</p>
  <p><strong>Total Bayar:</strong> Rp<?= number_format($total_baru) ?></p>

  <label for="metode_pembayaran">Pilih Metode Pembayaran:</label>
  <select class="form-select" name="metode_pembayaran" required>
    <option value="bri">Transfer BRI</option>
    <option value="dana">DANA</option>s
    <option value="qris">QRIS</option>
  </select><br>

  <button type="submit" class="btn btn-success">Bayar Sekarang</button>
  <a href="../index.php?page=profile" class="btn btn-secondary">Batal</a>
</form>
