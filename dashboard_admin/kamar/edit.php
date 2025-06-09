<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id_kamar'];
$query = mysqli_query($connection, "SELECT * FROM kamar WHERE id_kamar='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Ubah Data Kamar</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post" enctype="multipart/form-data">
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
              <input type="hidden" name="id_kamar" value="<?= $row['id_kamar'] ?>">
              <input type="hidden" name="gambarlama" value="<?= $row['foto'] ?>">
              <table cellpadding="8" class="w-100">
              <tr>
                <td>ID_Kamar</td>
                <td><input class="form-control" type="number" name="id_kamar" size="20" required value="<?= $row['id_kamar'] ?>" disabled></td>
              </tr>

              <tr>
                <td>Tipe</td>
                <td><input class="form-control" type="text" name="tipe" size="20" required value="<?= $row['tipe'] ?>"></td>
              </tr>

              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="number" name="harga" size="20" required value="<?= $row['harga'] ?>"></td>
              </tr>

              <tr>
                <td>Status</td>
                <td>
                  <select class="form-control" name="status" required>
                    <option value="">-- Pilih Status Kamar --</option>
                    <option value="Tersedia" <?= $row['status'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                    <option value="Terisi" <?= $row['status'] == 'Terisi' ? 'selected' : '' ?>>Terisi</option>
                  </select>* Status akan berubah secara otomatis, tergantung status pesanan
                </td>
              </tr>

              <tr>
                <td>Deskripsi</td>
                <td><input class="form-control" type="text" name="deskripsi" size="20" required value="<?= $row['deskripsi'] ?>"></td>
              </tr>

              <tr>
                <td>Foto</td>
                <td>
                  <input class="form-control" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png" required>* Format yang didukung: .png / .jpg / .jpeg<br>
                  <img id="preview" src="../../assets/img/fasilitas/<?= $row['foto'] ?>" alt="" style="margin-top:10px; max-width: 200px;">

                <script>
                  document.getElementById('foto').addEventListener('change', function(event) {
                    const file = event.target.files[0];

                    if (file && file.type.startsWith('image/')) {
                      const reader = new FileReader();
                      
                      reader.onload = function(e) {
                        const preview = document.getElementById('preview');
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                      }

                      reader.readAsDataURL(file);
                    } else {
                      alert('Format gambar tidak didukung, mohon gunakan format .jpg / .jpeg / .png');
                    }
                  });
                </script>
                </td>
              </tr>

              <tr>
                <td>Nama Kamar</td>
                <td><input class="form-control" type="text" name="nama_kamar" size="20" required value="<?= $row['nama_kamar'] ?>"></td>
              </tr>

                  <td>
                    <input class="btn btn-success d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-light">Kembali</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>