<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$query = mysqli_query($connection, "SELECT id_pemesanan FROM pesanan ORDER BY id_pemesanan DESC LIMIT 1");
$row = mysqli_fetch_assoc($query);

if ($row) {
    $tambah = $row['id_pemesanan'] + 1;
} else {
    $tambah = 1;
}

?>

<section class="section">
  <div class="section-header d-flex justify-content-between" style="background-color: #D6C0B3; border: none;">
    <h1 style="color: #ffffff;">Tambah Pesanan</h1>
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
                <td>ID_Pemesanan</td>
                <td><input class="form-control" type="number" name="id_pemesanan" size="20" required value="<?= $tambah ?>"></td>
              </tr>

              <tr>
                <td>Mulai Pemesanan</td>
                <td><input class="form-control" type="date" name="tanggalpesan" size="20" required value="<?= date('Y-m-d') ?>"></td>
              </tr>

              <tr>
                <td>Durasi Tinggal (Bulan)</td>
                <td><input class="form-control" type="number" name="durasi" size="20" required></td>
              </tr>
              
              <tr>
                <td>Catatan</td>
                <td><textarea input class="form-control" name="catatan" rows="4" required></textarea></td>
              </tr>

              <tr>
                <td>Metode Pembayaran</td>
                <td>
                  <select class="form-control" name="metode" required>
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="Cash">Cash</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                  </select>
                </td>
              </tr>
  
              <tr>
                <td>ID_Kamar</td>
                <td>
                  <select class="form-control" name="id_kamar" required>
                    <option value="">-- Pilih ID Kamar --</option>
                    <?php
                    // Query ke database
                    $query1 = mysqli_query($connection, "SELECT id_kamar, nama_kamar FROM kamar");

                    // Tampilkan semua id_kamar sebagai opsi
                    while ($row1 = mysqli_fetch_assoc($query1)) {
                        echo '<option value="' . $row1['id_kamar'] . '">' . $row1['id_kamar'] . ' - ' . $row1['nama_kamar'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td>ID Pengguna</td>
                <td>
                  <select class="form-control" name="id_pengguna" required>
                    <option value="">-- Pilih ID Pengguna --</option>
                    <?php
                    // Query ke database
                    $query2 = mysqli_query($connection, "SELECT id, nama_pengguna FROM pengguna");

                    // Tampilkan semua id_pengguna sebagai opsi
                    while ($row2 = mysqli_fetch_assoc($query2)) {
                        echo '<option value="' . $row2['id'] . '">' . $row2['id'] . ' - ' . $row2['nama_pengguna'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Total Harga</td>
                <td><input class="form-control" type="text" name="totalharga" size="20" value="Total harga akan dihitung secara otomatis saat menyimpan data" disabled></td>
              </tr>

              <tr>
                <td>Status Pemesanan</td>
                <td>
                  <select class="form-control" name="statuspesan" required>
                    <option value="">-- Pilih Status Pemesanan --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                    <option value="Kadaluwarsa">Kadaluwarsa</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Bukti Pembayaran</td>
                <td>
                  <input class="form-control" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png">* Format yang didukung: .png / .jpg / .jpeg
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