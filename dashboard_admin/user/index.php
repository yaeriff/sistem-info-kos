<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM pengguna");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Daftar Pengguna</h1>
    
    <a href="./create.php" class="btn btn-dark"><i class="fa fa-user-plus mr-2"></i>Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID_Pengguna</th>
                  <th>Tanggal Dibuat</th>
                  <th>Nama Pengguna</th>
                  <th>E-mail</th>
                  <th>Peran</th>
                  <th>Nomor Telepon</th>
                  <th>Kata Sandi</th>
                  <th>Alamat</th>
                  <th>KTP</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result)) :
                ?>

                  <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['tanggal_pembuatan'] ?></td>
                    <td><?= $data['nama_pengguna'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['role'] ?></td>
                    <td><?= $data['nomor_telepon'] ?></td>
                    <td><span class="badge bg-warning text-white">Terenkripsi</td>
                    <td><?= $data['alamat'] ?></td>
                    <td><img src="../assets/img/ktp/<?php echo htmlspecialchars($data['ktp']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($data['nama_pengguna']); ?>">
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id=<?= $data['id'] ?>">
                        <i class="fas fa-user-times fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-warning" href="edit.php?id=<?= $data['id'] ?>">
                        <i class="fas fa-user-cog fa-fw"></i>
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