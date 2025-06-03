<?php
$nama = $_SESSION['login']['nama_pengguna'];
  $email = $_SESSION['login']['email'];
  $telepon = $_SESSION['login']['telepon'];
  $alamat = $_SESSION['login']['alamat'];
  $password = $_SESSION['login']['password'];
  $ktp = $_SESSION['login']['ktp'];
  $foto = $_SESSION['login']['foto'];
?>
<h3>Profil Anda</h3>
<form method='POST' action='update_profile.php'>
    <div class='mb-3'>
        <label for='nama' class='form-label'>Nama Lengkap</label>
        <input type='text' class='form-control' id='nama' name='nama' value='<?= $nama ?>'>
    </div>
    <div class='mb-3'>
        <label for='email' class='form-label'>Email</label>
        <input type='email' class='form-control' id='email' name='email' value='<?= $email ?>'>
    </div>
    <div class='mb-3'>
        <label for='telepon' class='form-label'>No HP</label>
        <input type='text' class='form-control' id='telepon' name='telepon' value='<?= $telepon ?>'>
    </div>
    <div class='mb-3'>
        <label for='alamat' class='form-label'>Alamat</label>
        <textarea class='form-control' id='alamat' name='alamat'><?= $alamat ?></textarea>
    </div>
    <button type='submit' class='btn btn-primary'>Simpan Perubahan</button>
<a href='dashboard.php?page=change_password' class='btn btn-warning ms-2'>Ubah Password</a>
</form>
