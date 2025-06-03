<?php
require_once '../helper/connection.php';
require_once '../helper/auth.php';
isLogin();

$pengguna = mysqli_query($connection, "SELECT COUNT(*) FROM pengguna");
$pesanan = mysqli_query($connection, "SELECT COUNT(*) FROM pesanan");
$kamar = mysqli_query($connection, "SELECT COUNT(*) FROM kamar");

$total_pengguna = mysqli_fetch_array($pengguna)[0];
$total_pesanan = mysqli_fetch_array($pesanan)[0];
$total_kamar = mysqli_fetch_array($kamar)[0];
?>

<?php require_once 'layout/_top.php'; ?>

<div class="container py-4">
  <div class="row mb-4">
    <div class="col">
      <h1 class="h3">Dashboard</h1>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-lg-3 col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <div class="mb-2 text-success">
            <i class="fas fa-user fa-2x"></i>
          </div>
          <h5 class="card-title">Total Dosen</h5>
          <p class="card-text fs-4 fw-bold"><?= $total_pengguna ?></p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <div class="mb-2 text-primary">
            <i class="fas fa-user-graduate fa-2x"></i>
          </div>
          <h5 class="card-title">Total Mahasiswa</h5>
          <p class="card-text fs-4 fw-bold"><?= $total_pesanan ?></p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <div class="mb-2 text-warning">
            <i class="fas fa-star fa-2x"></i>
          </div>
          <h5 class="card-title">Total Nilai</h5>
          <p class="card-text fs-4 fw-bold"><?= $total_kamar ?></p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <div class="mb-2 text-dark">
            <i class="fas fa-book fa-2x"></i>
          </div>
          <h5 class="card-title">Total Mata Kuliah</h5>
          <p class="card-text fs-4 fw-bold"><?= $total_kamar ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'layout/_bottom.php'; ?>
