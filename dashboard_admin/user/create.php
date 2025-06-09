<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$query = mysqli_query($connection, "SELECT id FROM pengguna ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($query);

if ($row) {
    $tambah = $row['id'] + 1;
} else {
    $tambah = 1;
}

?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Tambah Pengguna</h1>
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
                <td>ID_Pengguna</td>
                <td><input class="form-control" type="number" name="id" size="20" required value="<?= $tambah ?>"></td>
              </tr>
              
              <tr>
                <td>Tanggal Pembuatan</td>
                <td><input class="form-control" type="date" name="tanggal_pembuatan" size="20" required value="<?= date('Y-m-d') ?>"></td>
              </tr>

              <tr>
                <td>Nama Pengguna</td>
                <td><input class="form-control" type="text" name="nama_pengguna" size="20" required></td>
              </tr>

              <tr>
                <td>E-mail</td>
                <td><input class="form-control" type="text" name="email" size="20" placeholder="Contoh: nama@gmail.com" required></td>
              </tr>

              <tr>
                <td>Peran</td>
                <td>
                  <select class="form-control" name="role" required>
                    <option value="">-- Pilih Peran --</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Nomor Telepon</td>
                <td><input class="form-control" type="text" name="nomor_telepon" size="20" required></td>
              </tr>

              <tr>
                <td>Kata Sandi</td>
                <td><input class="form-control" type="password" name="password" size="20" required></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td><input class="form-control" type="text" name="alamat" size="20" required></td>
              </tr>

              <tr>
                <td>Foto KTP</td>
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