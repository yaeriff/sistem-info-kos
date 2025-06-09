<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM pesanan");

// Pengecekan status kamar
$status_kamar = [];
while ($datak = mysqli_fetch_assoc($result)) {
    $id_kamar = $datak['id_kamar'];
    $status = $datak['status_pemesanan'];

    // Jika ada pesanan aktif, maka status kamar tidak tersedia
    if ($status == 'Aktif') {
        $status_kamar[$id_kamar] = 'Terisi';
    } else {
        // Jika ada pesanan namun sudah kadaluwarsa, maka maka status kamar tersedia
        if (!isset($status_kamar[$id_kamar])) {
            $status_kamar[$id_kamar] = 'Tersedia';
        }
    }
}

foreach ($status_kamar as $id_kamar => $status) {
    mysqli_query($connection, "UPDATE kamar SET status = '$status' WHERE id_kamar = '$id_kamar'");
}

$result2 = mysqli_query($connection, "SELECT * FROM kamar");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Daftar Kamar</h1>
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
                  <th>ID_Kamar</th>
                  <th>Tipe</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Deskripsi</th>
                  <th>Foto</th>
                  <th>Nama Kamar</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result2)) :
                ?>
                  <tr>
                    <td><?= $data['id_kamar'] ?></td>
                    <td><?= $data['tipe'] ?></td>
                    <td>Rp. <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td>
                    <?php
                      if ($data['status'] == 'Tersedia') {
                        echo '<span class="badge bg-success text-white">Tersedia</span>';
                      } else {
                        echo '<span class="badge bg-warning text-white">Terisi</span>';
                      }
                    ?>
                    </td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td><img src="../assets/img/fasilitas/<?php echo htmlspecialchars($data['foto']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($data['nama_kamar']); ?>">
                    <td><?= $data['nama_kamar'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_kamar=<?= $data['id_kamar'] ?>">
                        <i class="fas fa-times fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-warning" href="edit.php?id_kamar=<?= $data['id_kamar'] ?>">
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