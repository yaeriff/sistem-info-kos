<?php
session_start();
require_once 'helper/connection.php';

if (!isset($_SESSION['login'])) {
    header('Location: forms/auth/login.php');
    exit;
}

$id_user = $_SESSION['login']['id'];

if (!isset($_GET['id_pemesanan'])) {
    die("ID pemesanan tidak ditemukan.");
}

$id_pemesanan = $_GET['id_pemesanan'];

$query = "SELECT p.*, k.nama_kamar 
          FROM pesanan p
          JOIN kamar k ON p.id_kamar = k.id_kamar
          WHERE p.id_pemesanan = ? AND p.id_pengguna = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ii", $id_pemesanan, $id_user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$pemesanan = mysqli_fetch_assoc($result);

if (!$pemesanan) {
    die("Data tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['konfirmasi'])) {

    // Ambil ID pemesanan dari form
    $id_pemesanan = $_POST['id_pemesanan'];

    // Pastikan file dikirim dan tidak ada error
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

        $allowed = ['image/jpeg', 'image/jpg', 'image/png'];

        if (!in_array($_FILES['foto']['type'], $allowed)) {
            echo "<div class='alert alert-danger'>File tidak valid. Harus JPEG/JPG/PNG.</div>";
        } else {
            // Ambil ekstensi file
            $ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

            // Nama file yang akan disimpan
            $fileName = 'Bukti_ID' . $id_pemesanan . '.' . $ekstensi;

            // Path upload
            $uploadPath = "dashboard_admin/assets/img/bukti/" . $fileName;

            // Upload file
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadPath)) {
                // Update status di database
                $query = "UPDATE pesanan SET status_pemesanan='lunas', bukti_transaksi=? WHERE id_pemesanan=?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "si", $fileName, $id_pemesanan);
                mysqli_stmt_execute($stmt);

                echo "<script>alert('Pembayaran dikonfirmasi!'); window.location='riwayat.php';</script>";
                exit;
            } else {
                echo "<div class='alert alert-danger'>Upload gagal. Cek folder tujuan.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-warning'>Tidak ada file yang diunggah atau terjadi kesalahan.</div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="riwayat.css">k
</head>
<body>
<div class="container py-5">
    <h2>Konfirmasi Pembayaran</h2>

    <p><strong>Nama Kamar:</strong> <?= htmlspecialchars($pemesanan['nama_kamar']) ?></p>
    <p><strong>Metode Pembayaran:</strong> <?= strtoupper($pemesanan['metode_pembayaran']) ?></p>
    <p><strong>Total:</strong> Rp <?= number_format($pemesanan['total_harga']) ?></p>
    <p><strong>Status:</strong> <?= $pemesanan['status_pemesanan'] ?></p>

    <?php if ($pemesanan['status_pemesanan'] == 'belum lunas'): ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" name="foto" id="bukti" class="form-control" required>
            </div>
            <button type="submit" name="konfirmasi" class="btn btn-primary">Konfirmasi Pembayaran</button>
        </form>
    <?php else: ?>
        <div class="alert alert-success">Pembayaran sudah lunas.</div>
    <?php endif; ?>
</div>
</body>
</html>
