<?php
session_start();
require_once 'helper/connection.php';

if (!isset($_SESSION['login'])) {
    header('Location: forms/auth/login.php');
    exit;
}

$id_user = $_SESSION['login']['id'];

// Ambil semua pesanan pengguna
$query = "SELECT p.*, k.nama_kamar, k.harga 
          FROM pesanan p
          JOIN kamar k ON p.no_kamar = k.id_kamar
          WHERE p.id_pengguna = ?
          ORDER BY p.id_pemesanan DESC";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="riwayat.css">
</head>
<body>
<div class="container py-5">
    <h2>Riwayat Pemesanan Anda</h2>
    <a href="index.php" class="btn btn-danger mb-3">← Kembali ke Beranda</a>
    
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Kamar</th>
                    <th>Mulai Pemesanan</th>
                    <th>Durasi</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)): 
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_kamar']) ?></td>
                    <td><?= htmlspecialchars($row['mulai_pemesanan']) ?></td>
                    <td><?= $row['durasi'] ?> bulan</td>
                    <td>Rp <?= number_format($row['total_harga']) ?></td>
                    <td><?= strtoupper($row['metode_pembayaran']) ?: '-' ?></td>
                    <td>
                        <?php if ($row['status_pembayaran'] == 'lunas'): ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Belum Lunas</span>
                        <?php endif; ?>
                    </td>
                    <td><?= nl2br(htmlspecialchars($row['catatan'])) ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada riwayat pemesanan.</div>
    <?php endif; ?>
</div>
</body>
</html>
