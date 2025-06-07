<?php
          $nama = $_SESSION['login']['nama_pengguna'];
          $email = $_SESSION['login']['email'];
          $password = $_SESSION['login']['password'];
          $telepon = $_SESSION['login']['telepon'];
          $alamat = $_SESSION['login']['alamat'];
          $ktp = $_SESSION['login']['ktp'];

          if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status === 'success') {
                echo "<div class='alert alert-success'>Profil berhasil diperbarui.</div>";
            } elseif ($status === 'fail') {
                echo "<div class='alert alert-danger'>Gagal memperbarui profil.</div>";
            } elseif ($status === 'password_success') {
                echo "<div class='alert alert-success'>Password berhasil diubah.</div>";
            } elseif ($status === 'wrong_old') {
                echo "<div class='alert alert-warning'>Password lama salah.</div>";
            } elseif ($status === 'confirm_mismatch') {
                echo "<div class='alert alert-warning'>Konfirmasi password tidak cocok.</div>";
            } elseif ($status === 'password_fail') {
                echo "<div class='alert alert-danger'>Gagal mengubah password.</div>";
            }
          }
?>
          <h3>Profil Anda</h3>
          <form method='POST' action='process/update_profile.php' enctype='multipart/form-data'>
            <div class='mb-3'>
              <label for='nama' class='form-label'>Nama Lengkap</label>
              <input type='text' class='form-control' id='nama' name='nama' value='<?=$nama ?>'>
            </div>
            <div class='mb-3'>
              <label for='email' class='form-label'>Email</label>
              <input type='email' class='form-control' id='email' name='email' value='<?=$email ?>'>
            </div>
            <div class='mb-3'>
              <label for='telepon' class='form-label'>No HP</label>
              <input type='text' class='form-control' id='telepon' name='telepon' value='<?= $telepon ?>'>
            </div>
            <div class='mb-3'>
            <label for='alamat' class='form-label'>Alamat</label>
            <textarea class='form-control' id='alamat' name='alamat'><?= $alamat ?></textarea>
            </div>
            <div class='mb-3'>
                <label for='ktp' class='form-label'>Foto KTP/KTM</label><br>  
                <img src='../<?= $ktp ?>' alt='Foto KTP' width='200' class='img-thumbnail'><br><br>
                <input type='file' name='ktp' id='ktp' class='form-control mb-2'>
            </div>
            <button  type='submit' class='btn btn-primary'>Simpan Perubahan</button>
            <a class='btn btn-warning ms-2' id='change-password'>Ubah Password</a>
          </form>
          <div id="passwordModal" ></div>
            </form>"
            <script>
                let passwordModal = document.getElementById('passwordModal');
                document.getElementById('change-password').addEventListener('click', function(event) {
                    passwordModal.innerHTML =  `
                    <div class="card p-3 mt-4 border">
                        <h4>Ubah Password</h4>
                        <form method="POST" action="process/process_change_password.php">
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                        <a href="index.php?page=profile" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>`;
                });
            </script>
        