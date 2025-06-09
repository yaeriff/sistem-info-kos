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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <h3 class="mb-4">Perpanjang Sewa Kos</h3>

<form method="POST" action="../process/process_bayar_ulang.php">
  <input type="hidden" name="id_pemesanan" value="<?= htmlspecialchars($id_pemesanan) ?>">
  <input type="hidden" name="total_harga" value="<?= htmlspecialchars($total_baru) ?>">
  <input type="hidden" name="durasi" value="<?= htmlspecialchars($durasi_baru) ?>">

  <div class="card shadow-sm p-4 mb-4">
    <div class="mb-3">
      <p class="mb-1"><strong>No Kamar:</strong> <?= htmlspecialchars($pesanan['no_kamar']) ?></p>
      <p class="mb-1"><strong>Nama Kamar:</strong> <?= htmlspecialchars($pesanan['nama_kamar']) ?></p>
      <p class="mb-1"><strong>Durasi:</strong> <?= htmlspecialchars($durasi_baru) ?> bulan</p>
      <p class="mb-0"><strong>Total Bayar:</strong> <span class="text-success">Rp<?= number_format($total_baru, 0, ',', '.') ?></span></p>
    </div>

    <div class="mb-3">
      <label for="metode_pembayaran" class="form-label">Pilih Metode Pembayaran:</label>
      <select id="metode_pembayaran" class="form-select" name="metode_pembayaran" required>
        <option value="" disabled selected>-- Pilih Metode --</option>
        <option value="bri">Transfer BRI</option>
        <option value="dana">DANA</option>
        <option value="qris">QRIS</option>
      </select>
    </div>

    <div id="info-pembayaran" class="alert alert-info d-none"></div>

    <div class="mt-4 d-flex justify-content-between">
      <button type="submit" class="btn btn-success">Bayar Sekarang</button>
      <a href="../index.php?page=profile" class="btn btn-secondary">Batal</a>
    </div>
  </div>
</form>

<script>
  const metodeSelect = document.getElementById('metode_pembayaran');
  const infoPembayaran = document.getElementById('info-pembayaran');

  metodeSelect.addEventListener('change', function () {
    const metode = this.value;
    infoPembayaran.classList.remove('d-none');

    if (metode === 'bri') {
      infoPembayaran.innerHTML = `
        <strong>Transfer ke Rekening BRI:</strong><br>
        No Rekening: <span class="text-primary">1234 5678 9012 3456</span><br>
        Atas Nama: <strong>Kos Amanah</strong>
      `;
    } else if (metode === 'dana') {
      infoPembayaran.innerHTML = `
        <strong>Transfer ke DANA:</strong><br>
        No DANA: <span class="text-primary">0812 3456 7890</span><br>
        Atas Nama: <strong>Kos Amanah</strong>
      `;
    } else if (metode === 'qris') {
      infoPembayaran.innerHTML = `
        <strong>Scan Barcode QRIS:</strong><br>
        <img src="../assets/img/qris-barcode.png" alt="QRIS" class="img-fluid mt-2" style="max-width: 200px;">
      `;
    } else {
      infoPembayaran.classList.add('d-none');
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
