<?php
session_start();
require_once 'helper/connection.php';

if (!isset($_SESSION['login'])) {
    header('Location: forms/auth/login.php');
    exit;
}

// Ambil data user
$nama_user = $_SESSION['login']['nama_pengguna'];
$id_user = $_SESSION['login']['id'];

// Ambil data kamar dari POST
if (isset($_POST['id_kamar'])) {
    $id_kamar = $_POST['id_kamar'];

    $queryKamar = "SELECT * FROM kamar WHERE id_kamar = '$id_kamar'";
    $resultKamar = mysqli_query($connection, $queryKamar);
    $kamar = mysqli_fetch_assoc($resultKamar);

    if (!$kamar) {
        die("Kamar tidak ditemukan.");
    }

    $nama_kamar = $kamar['nama_kamar'];
    $harga = $kamar['harga'];
  } else {
    die("Akses tidak valid.");
  }

$result = null;

// Proses submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $durasi = $_POST['durasi'];
    $catatan = $_POST['catatan'] ?? '';

    // Proses upload file
    $uploadDir = 'data/uploads/';
    $fileName = basename($_FILES['file']['name']);
    $uploadPath = $uploadDir . time() . '_' . $fileName;
    $fileType = $_FILES['file']['type'];
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];

   if (!in_array($fileType, $allowedTypes)) {
    $result = ['status' => 'error', 'message' => 'Tipe file tidak diizinkan.'];
    
  } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)) {
        $queryInsert = "INSERT INTO pesanan (id_pengguna, no_kamar, mulai_pemesanan, durasi, catatan)
                        VALUES ('$id_user', '$id_kamar', '$tanggal_mulai', '$durasi', '$catatan')";
        
        if (mysqli_query($connection, $queryInsert)) {
            $id_pemesanan = mysqli_insert_id($connection);
            if ($id_pemesanan == 0) {
                die("INSERT gagal! SQL: $queryInsert Error: " . mysqli_error($connection));
            }

            $queryUpdate = "UPDATE pengguna SET ktp = '$uploadPath' WHERE id = '$id_user'";
            mysqli_query($connection, $queryUpdate);

            header("Location: pembayaran.php?id_pemesanan=$id_pemesanan");
            exit;
        } else {
            $result = ['status' => 'error', 'message' => mysqli_error($connection)];
        }
    } else {
        $result = ['status' => 'error', 'message' => 'Upload file gagal.'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Pre-Order Kamar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="ordering.css" rel="stylesheet" />
</head>
<body>
  <div class="container py-5">
    <div class="box form-box">
      <div>
        <a href="index.php" type="button" class="btn btn-danger btn-close">Kembali</a>
      </div>
      
      <div class="text-center mb-4 fs-4 fw-bold">Pre-Order Kamar</div>
      <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Pengguna</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($nama_user) ?>" disabled>
      </div>

      <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($id_kamar) ?>">
      <div class="mb-3">
        <label class="form-label">Nama Kamar</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($nama_kamar) ?>" disabled>
      </div>

      <div class="mb-3">
        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
        <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="durasi" class="form-label">Durasi (bulan)</label>
        <input type="number" id="durasi" name="durasi" class="form-control" min="1" required />
      </div>

      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan (opsional)</label>
        <textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="file" class="form-label">Upload KTP/KTM</label>
        <input type="file" id="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required />
      </div>

      <button type="submit" class="btn btn-primary">Submit Pre-Order</button>
      <?php if (!empty($result)): ?>
        <div class="mt-4">
          <?php if ($result['status'] === 'success'): ?>
            <div class="alert alert-success">
              Pre-Order berhasil!<br>
              ID Pemesanan: <?= htmlspecialchars($result['id_pemesanan']) ?><br>
              File: <?= htmlspecialchars($result['file']) ?>
            </div>
          <?php else: ?>
            <div class="alert alert-danger">
              Error: <?= htmlspecialchars($result['message']) ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </form> 
    </div>
    

  </div>
</body>
</html>
