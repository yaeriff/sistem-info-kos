<?php
session_start();
require_once 'helper/connection.php';

if (!isset($_SESSION['login'])) {
    header('Location: forms/auth/login.php');
    exit;
}

$id_user = $_SESSION['login']['id'];

// Ambil ID pemesanan dari query string
if (!isset($_GET['id_pemesanan'])) {
    die("ID pemesanan tidak tersedia.");
}

$id_pemesanan = $_GET['id_pemesanan'];

// Ambil data pesanan dan harga kamar
$query = "SELECT p.*, k.nama_kamar, k.harga 
          FROM pesanan p
          JOIN kamar k ON p.no_kamar = k.id_kamar
          WHERE p.id_pemesanan = ? AND p.id_pengguna = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ii", $id_pemesanan, $id_user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$pemesanan = mysqli_fetch_assoc($result);

if (!$pemesanan) {
    die("Data pemesanan tidak ditemukan.");
}

$total_harga = $pemesanan['harga'] * $pemesanan['durasi'];

// Proses update pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['metode_pembayaran'])) {
    $metode = $_POST['metode_pembayaran'];
    $status = 'belum lunas'; // default

    $update = "UPDATE pesanan SET metode_pembayaran = ?, status_pembayaran = ?, total_harga = ? WHERE id_pemesanan = ?";
    $stmt = mysqli_prepare($connection, $update);
    mysqli_stmt_bind_param($stmt, "ssii", $metode, $status, $total_harga, $id_pemesanan);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: konfirmasi.php?id_pemesanan=$id_pemesanan");
        exit;
    } else {
        $error = "Gagal menyimpan metode pembayaran.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Detail Pembayaran</h2>
    <table class="table">
        <tr><th>Nama Kamar</th><td><?= htmlspecialchars($pemesanan['nama_kamar']) ?></td></tr>
        <tr><th>Harga per Bulan</th><td>Rp <?= number_format($pemesanan['harga']) ?></td></tr>
        <tr><th>Durasi</th><td><?= $pemesanan['durasi'] ?> bulan</td></tr>
        <tr><th>Total Harga</th><td><strong>Rp <?= number_format($total_harga) ?></strong></td></tr>
        <tr><th>Catatan</th><td><?= nl2br(htmlspecialchars($pemesanan['catatan'])) ?></td></tr>
    </table>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Pilih Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="bri">Transfer BRI</option>
                <option value="dana">Dana</option>
                <option value="qris">QRIS</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lanjutkan Pembayaran</button>
    </form>
</div>
</body>
</html>
