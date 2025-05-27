<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, redirect ke login.php
    header("Location: forms/auth/login.php");
    exit();
}



// Jika sudah login, lanjutkan proses pre-order di sini
$nama_user = $_SESSION['user'] ?? 'Pengguna';
$nama = $_SESSION['nama'] ?? 'Nama Tidak Ditemukan';
$kamar_id = $_POST['kamar_id'] ?? 'Tidak diketahui';
$tanggal_preorder = date("Y-m-d H:i:s");
?>



<!DOCTYPE html>
<html>
<head>
    <title>Preorder Kamar</title>
</head>
<body>
    <div class="container">
        <h1>Preorder Kamar</h1>
        <div class="card">
            <div class="card-header">Featured</div>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($nama) ?></h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>HEADSET BLUETOOTH I12 MACARON</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .warna-btn {
      margin: 4px;
    }
    .warna-btn input[type="radio"] {
      display: none;
    }
    .warna-btn label {
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      cursor: pointer;
    }
    .warna-btn input[type="radio"]:checked + label {
      border-color: #ff5722;
      background-color: #ffeae3;
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <div class="row">
    <!-- Gambar -->
    <div class="col-md-5">
      <img src="https://cf.shopee.co.id/file/3f3de2a2e19b6bc8d62c9a5e1d79e1c6" alt="Produk" class="img-fluid rounded mb-3">
      <div class="d-flex gap-2">
        <img src="https://cf.shopee.co.id/file/3f3de2a2e19b6bc8d62c9a5e1d79e1c6" width="60" class="rounded border">
        <img src="https://cf.shopee.co.id/file/4704316f1d53a7b99bb91cfa9e6edbe0" width="60" class="rounded border">
        <img src="https://cf.shopee.co.id/file/4b44762a3189a0e96a279aa1807e2202" width="60" class="rounded border">
      </div>
    </div>

    <!-- Detail Produk -->
    <div class="col-md-7">
      <h4 class="mb-2">HEADSET BLUETOOTH I12 MACARON TWS BLUETOOTH 5.0</h4>
      <div class="mb-2">
        <span class="badge bg-warning text-dark">4.5 ★</span>
        <span> | 4RB Penilaian | 10RB+ Terjual</span>
      </div>
      <h3 class="text-danger">Rp23.497 - Rp25.497 <small class="text-muted fs-6 text-decoration-line-through">Rp69.995</small></h3>
      <div class="mb-3">
        <span class="badge bg-danger">FLASH SALE</span> Mulai pada 18:00, 27 Mei
      </div>

      <!-- Pilihan Warna -->
      <div class="mb-3">
        <h6>Warna</h6>
        <div class="d-flex flex-wrap">
          <?php
          $warna = ["PINK", "HIJAU", "BIRU MUDA", "ABU ABU", "NAVY", "KUNING", "HITAM", "PUTIH"];
          foreach ($warna as $w) {
            echo '
            <div class="warna-btn">
              <input type="radio" name="warna" id="'.$w.'" value="'.$w.'">
              <label for="'.$w.'">'.$w.'</label>
            </div>';
          }
          ?>
        </div>
      </div>

      <!-- Jumlah -->
      <div class="mb-3">
        <label for="qty" class="form-label">Kuantitas</label>
        <input type="number" id="qty" class="form-control" value="1" min="1" style="width: 100px;">
      </div>

      <!-- Tombol -->
      <div class="d-flex gap-2">
        <button class="btn btn-outline-warning">Masukkan Keranjang</button>
        <button class="btn btn-danger">Beli Sekarang</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

