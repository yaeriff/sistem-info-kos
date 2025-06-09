<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$query = mysqli_query($connection, "SELECT id_kamar FROM kamar ORDER BY id_kamar DESC LIMIT 1");
$row = mysqli_fetch_assoc($query);

if ($row) {
    $tambah = $row['id_kamar'] + 1;
} else {
    $tambah = 1;
}

?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Tambah Kamar</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>ID_Kamar</td>
                <td><input class="form-control" type="number" name="id_kamar" size="20" required value="<?= $tambah ?>"></td>
              </tr>

              <tr>
                <td>Tipe</td>
                <td>
                  <select class="form-control" name="tipe" required>
                    <option value="">-- Pilih Tipe Kamar --</option>
                    <option value="Reguler">Reguler</option>
                    <option value="Premium">Premium</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="number" name="harga" size="20" required></td>
              </tr>

              <tr>
                <td>Status</td>
                <td><input class="form-control" type="text" name="harga" size="20" required value="Tersedia" disabled></td>
              </tr>

              <tr>
                <td>Deskripsi</td>
                <td><input class="form-control" type="text" name="deskripsi" size="20" required></td>
              </tr>

              <tr>
                <td>Foto</td>
                <td>
                  <input class="form-control" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png" required>* Format yang didukung: .png / .jpg / .jpeg
                  <img id="preview" src="" alt="" style="margin-top:10px; max-width: 200px; display: none;">

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
                <td><input class="form-control" type="text" name="nama_kamar" size="20" required></td>
              </tr>

              <tr>
                <td>
                  <input class="btn btn-success" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-info" type="reset" name="batal" value="Bersihkan"></td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>