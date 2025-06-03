<?php
session_start();
// Pastikan user sudah login
if (!isset($_SESSION['login'])) {
  header('Location: ../forms/auth/login.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      min-width: 250px;
      max-width: 250px;
      background-color: #343a40;
      color: white;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
    }
    .sidebar .nav-link:hover {
      background-color: #495057;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-white">Kos Online</h4>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="dashboard.php?page=home" class="nav-link text-white">Home</a>
      </li>
      <li>
        <a href="dashboard.php?page=riwayat" class="nav-link text-white">Riwayat Pemesanan</a>
      </li>
      <li>
        <a href="dashboard.php?page=profile" class="nav-link text-white">Profil</a>
      </li>
      <li>
        <a href="dashboard.php?page=pesan" class="nav-link text-white">Pesan Masuk</a>
      </li>
    </ul>
  </div>

  <!-- Main content -->
  <div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container-fluid">
        <span class="navbar-brand">Dashboard Pengguna</span>
        <div class="d-flex">
          <span class="navbar-text me-3">Hi, <?php echo $_SESSION['nama_pengguna']; ?></span>
          <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
      </div>
    </nav>

    <!-- Dynamic Content -->
    <div>
      <?php
      $page = $_GET['page'] ?? 'home';

      switch ($page) {
        case 'home':
          echo "<h3>Selamat Datang, {$_SESSION['username']}!</h3>
          <p>Silakan pilih kamar yang tersedia untuk dipesan.</p>

          <h5 class='mt-4'>Daftar Kamar Tersedia</h5>
          <div class='row'>
            <div class='col-md-4'>
              <div class='card mb-4'>
                <div class='card-body'>
                  <h5 class='card-title'>Kamar A1</h5>
                  <p class='card-text'>Rp800.000 / bulan</p>
                  <p class='card-text'><small class='text-muted'>AC, Wifi, KM Dalam</small></p>
                  <a href='preorder.php?kamar_id=1' class='btn btn-primary btn-sm'>Pesan</a>
                </div>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='card mb-4'>
                <div class='card-body'>
                  <h5 class='card-title'>Kamar B2</h5>
                  <p class='card-text'>Rp650.000 / bulan</p>
                  <p class='card-text'><small class='text-muted'>Kipas, KM Luar</small></p>
                  <a href='preorder.php?kamar_id=2' class='btn btn-primary btn-sm'>Pesan</a>
                </div>
              </div>
            </div>
          </div>

          <h5 class='mt-5'>Riwayat Pemesanan Terakhir</h5>
          <table class='table table-bordered'>
            <thead>
              <tr>
                <th>Kamar</th>
                <th>Durasi</th>
                <th>Tanggal Mulai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Kamar A1</td>
                <td>3 bulan</td>
                <td>2025-06-10</td>
                <td><span class='badge bg-success'>Aktif</span></td>
              </tr>
            </tbody>
          </table>";
          break;

        case 'riwayat':
          echo "<h3>Riwayat Pemesanan</h3><p>Daftar lengkap pemesanan Anda akan ditampilkan di sini.</p>";
          break;

        case 'profile':
          echo "<h3>Profil Anda</h3><p>Informasi akun dan data pribadi Anda.</p>";
          break;

        case 'pesan':
          echo "<h3>Pesan Masuk</h3><p>Notifikasi atau pesan dari pengelola kos akan muncul di sini.</p>";
          break;

        default:
          echo "<h3>404</h3><p>Halaman tidak ditemukan.</p>";
          break;
      }
      ?>
    </div>
  </div>

</body>
</html>
