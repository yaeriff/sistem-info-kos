<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM pesanan");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Daftar Pesanan</h1>
    <a href="./create.php" class="btn btn-dark"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID_Pesanan</th>
                  <th>Mulai Pemesanan</th>
                  <th>Durasi</th>
                  <th>Catatan</th>
                  <th>Metode Pembayaran</th>
                  <th>ID_Kamar</th>
                  <th>ID_Pengguna</th>
                  <th>Total Harga</th>
                  <th>Status Pemesanan</th>
                  <th>Bukti Transaksi</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result)) :
                ?>

                  <tr>
                    <td><?= $data['id_pemesanan'] ?></td>
                    <td><?= $data['mulai_pemesanan'] ?></td>
                    <td><?= $data['durasi'] ?> Bulan</td>
                    <td><?= $data['catatan'] ?></td>
                    <td><?= $data['metode_pembayaran'] ?></td>
                    <td><?= $data['id_kamar'] ?></td>
                    <td><?= $data['id_pengguna'] ?></td>
                    <td>Rp. <?= number_format($data['total_harga'], 0, ',', '.'); ?></td>
                    <td>
                    <?php
                    if ($data['status_pemesanan'] == 'Aktif') {
                      echo '<span class="badge bg-success text-white">Aktif</span>';
                    } elseif ($data['status_pemesanan'] == 'Belum Lunas') {
                      echo '<span class="badge bg-warning text-white">Belum Lunas</span>';                      
                    } else {
                      echo '<span class="badge bg-danger text-white">Kadaluwarsa</span>';
                    }
                    ?>
                    </td>
                    <td><img src="../assets/img/bukti/<?php echo htmlspecialchars($data['bukti_pembayaran']); ?>" class="img-fluid" alt="">
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_pemesanan=<?= $data['id_pemesanan'] ?>">
                        <i class="fas fa-times fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-warning" href="edit.php?id_pemesanan=<?= $data['id_pemesanan'] ?>">
                        <i class="fas fa-tools fa-fw"></i>
                      </a>
                    </td>
                  </tr>

                <?php
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>