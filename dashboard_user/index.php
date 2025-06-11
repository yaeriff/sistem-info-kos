<?php
session_start();
require_once '../helper/connection.php';
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
      background-color: #A6CDC6;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3" style="background-color: #16404D;">
    <h4 style="color: #DDA853;">Kos Bu Anna</h4>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../index.php" class="nav-link text-white">Home</a>
      </li>
      <li>
        <a href="index.php?page=riwayat" class="nav-link text-white">Riwayat Pemesanan</a>
      </li>
      <li>
        <a href="index.php?page=profile" class="nav-link text-white">Profil</a>
      </li>
      <li>
        <a href="index.php?page=pesan" class="nav-link text-white">Pesan Masuk <span class="badge bg-danger"><?php
          $id = $_SESSION['login']['id'];
          $notif = mysqli_query($connection, "SELECT COUNT(*) as total FROM pesanan WHERE id_pengguna = $id AND status_pemesanan = 'baru'");
          $jml = mysqli_fetch_assoc($notif)['total'];
          echo $jml > 0 ? $jml : '';
          ?></span></a>
      </li>
      <li>
        <a href="index.php?page=pembayaran" class="nav-link text-white">Pembayaran</a>
      </li>

    </ul>
  </div>

  <!-- Main content -->
  <div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container-fluid">
        <span class="navbar-brand">Dashboard Pengguna</span>
        <div class="d-flex">
          <span class="navbar-text me-3">Hi, <?php echo $_SESSION['login']['nama_pengguna']; ?></span>
          <a href="../forms/auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
      </div>
    </nav>

    <!-- Dynamic Content -->
    <div>
      <?php
      $page = $_GET['page'] ?? 'home';

      switch ($page) {
        case 'home':
          echo "<h3>Selamat Datang, {$_SESSION['login']['nama_pengguna']}!</h3>";
              require_once 'pages/home.php';
          break;

        case 'riwayat':
            $id_user = $_SESSION['login']['id'];

            $query = "SELECT p.*, k.nama_kamar, k.harga 
                      FROM pesanan p
                      JOIN kamar k ON p.id_kamar = k.id_kamar
                      WHERE p.id_pengguna = ?
                      ORDER BY p.id_pemesanan DESC";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $id_user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            ?>

            <div class="container py-5">
              <h2>Riwayat Pemesanan Anda</h2>
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

            <?php
            break;


        case 'profile':
          include 'pages/profile.php';
          break;


        case 'pesan':
          $id_user = $_SESSION['login']['id'];
          $query = "SELECT * FROM pesan_masuk WHERE id_pengguna = ? ORDER BY tanggal DESC";
          $stmt = mysqli_prepare($connection, $query);
          mysqli_stmt_bind_param($stmt, "i", $id_user);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          ?>
          <div class="container py-4">
            <h3>Pesan Masuk</h3>
            <?php if (mysqli_num_rows($result) > 0): ?>
              <div class="list-group">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?= htmlspecialchars($row['judul']) ?></h5>
                      <small><?= date('d M Y H:i', strtotime($row['tanggal'])) ?></small>
                    </div>
                    <p class="mb-1"><?= nl2br(htmlspecialchars($row['isi'])) ?></p>
                    <div class="d-flex w-100 justify-content-between">
                      <small class="<?= $row['status'] === 'baru' ? 'text-danger' : 'text-muted' ?>">
                      Status: <?= ucfirst($row['status']) ?>
                      </small>
                      <div class="d-flex">
                        <a href="process/tandai_dibaca.php?id=<?= $row['id_pesan'] ?>" class="btn btn-sm btn-outline-primary">Tandai Dibaca</a>
                        <a href="process/hapus_pesan.php?id=<?= $row['id_pesan'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php else: ?>
              <div class="alert alert-info mt-3">Belum ada pesan masuk.</div>
            <?php endif; ?>
          </div>
          <?php
          break;
          case 'pembayaran':
            include 'pages/pembayaran_user.php';
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
