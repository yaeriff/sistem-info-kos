<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM pengguna WHERE id='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Ubah Data Pengguna</h1>
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
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="gambarlama" value="<?= $row['ktp'] ?>">
              <table cellpadding="8" class="w-100">
              <tr>
                <td>ID_Pengguna</td>
                <td><input class="form-control" type="number" name="id" size="20" required value="<?= $row['id'] ?>" disabled></td>
              </tr>
              
              <tr>
                <td>Tanggal Pembuatan</td>
                <td><input class="form-control" type="date" name="tanggal_pembuatan" size="20" required value="<?= $row['tanggal_pembuatan'] ?>" disabled></td>
              </tr>

              <tr>
                <td>Nama Pengguna</td>
                <td><input class="form-control" type="text" name="nama_pengguna" size="20" required value="<?= $row['nama_pengguna'] ?>"></td>
              </tr>

              <tr>
                <td>E-mail</td>
                <td><input class="form-control" type="text" name="email" size="20" placeholder="Contoh: nama@gmail.com" required value="<?= $row['email'] ?>"></td>
              </tr>

              <tr>
                <td>Peran</td>
                <td>
                  <select class="form-control" name="role" required>
                    <option value="">-- Pilih Peran --</option>
                    <option value="User" <?= $row['role'] == 'User' ? 'selected' : '' ?>>User</option>
                    <option value="Admin" <?= $row['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Nomor Telepon</td>
                <td><input class="form-control" type="text" name="nomor_telepon" size="20" required value="<?= $row['nomor_telepon'] ?>"></td>
              </tr>

              <tr>
                <td>Ubah Kata Sandi</td>
                <td><input class="form-control" type="password" name="passwordbaru" size="20" placeholder="Isi jika ingin mengubah kata sandi"></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td><input class="form-control" type="text" name="alamat" size="20" required value="<?= $row['alamat'] ?>"></td>
              </tr>

              <tr>
                <td>Foto KTP</td>
                <td>
                  <input class="form-control" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png" required disabled>* Format yang didukung: .png / .jpg / .jpeg<br>
                  <img id="preview" src="../../assets/img/ktp/<?= $row['ktp'] ?>" alt="" style="margin-top:10px; max-width: 200px;">

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