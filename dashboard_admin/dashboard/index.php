<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$pesanan = mysqli_query($connection, "SELECT COUNT(*) FROM pesanan");
$kamar = mysqli_query($connection, "SELECT COUNT(*) FROM kamar");
$user = mysqli_query($connection, "SELECT COUNT(*) FROM pengguna");

$total_pesanan = mysqli_fetch_array($pesanan)[0];
$total_kamar = mysqli_fetch_array($kamar)[0];
$total_user = mysqli_fetch_array($user)[0];
?>

<section class="section">
  <div class="section-header" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Beranda</h1>
  </div>
  <div class="column">
      <div class="col-lg-12 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="border-radius: 20px;">
          <div class="card-icon bg-dark" style="border-radius: 50%;">
            <i class="fas fa-receipt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Pesanan</h4>
            </div>
            <div class="card-body">
              <?= $total_pesanan ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="border-radius: 20px;">
          <div class="card-icon bg-dark" style="border-radius: 50%;">
            <i class="fas fa-bed"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Kamar</h4>
            </div>
            <div class="card-body">
              <?= $total_kamar ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="border-radius: 20px;">
          <div class="card-icon bg-dark" style="border-radius: 50%;">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Pengguna</h4>
            </div>
            <div class="card-body">
              <?= $total_user ?>
            </div>
          </div>
        </div>
      </div>
  </div>

</section>

<?php
require_once '../layout/_bottom.php';
?>