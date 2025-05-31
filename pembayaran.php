<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: forms/auth/login.php');
    exit;
}

$id_pemesanan = $_GET['id_pemesanan'] ?? null;
if (!$id_pemesanan) {
    die("ID pemesanan tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
  <h1>Halaman Pembayaran</h1>

  <div id="detail-pemesanan" class="mb-4">
    <p>Loading data pemesanan...</p>
  </div>

  <form id="form-pembayaran" style="display:none;">
    <div class="mb-3">
      <label for="metode_pembayaran" class="form-label">Pilih Metode Pembayaran</label>
      <select id="metode_pembayaran" name="metode_pembayaran" class="form-select" required>
        <option value="">-- Pilih --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="E-Wallet">E-Wallet</option>
        <option value="COD">COD</option>
      </select>
    </div>

    <input type="hidden" name="id_pemesanan" value="<?= htmlspecialchars($id_pemesanan) ?>" />

    <button type="submit" class="btn btn-success">Bayar Sekarang</button>
  </form>

  <div id="message" class="mt-3"></div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const idPemesanan = "<?= addslashes($id_pemesanan) ?>";
    const detailDiv = document.getElementById('detail-pemesanan');
    const formBayar = document.getElementById('form-pembayaran');
    const messageDiv = document.getElementById('message');

    // Load detail pemesanan via AJAX
    fetch(`http://localhost/backend/detail_pemesanan.php?id_pemesanan=${encodeURIComponent(idPemesanan)}`)
      .then(res => res.json())
      .then(data => {
        if (data.status === 'success') {
          detailDiv.innerHTML = `
            <ul class="list-group">
              <li class="list-group-item"><strong>ID Pemesanan:</strong> ${data.id_pemesanan}</li>
              <li class="list-group-item"><strong>ID User:</strong> ${data.id}</li>
              <li class="list-group-item"><strong>No Kamar:</strong> ${data.no_kamar}</li>
              <li class="list-group-item"><strong>Tanggal Mulai:</strong> ${data.start_pemesanan}</li>
              <li class="list-group-item"><strong>Durasi:</strong> ${data.durasi} bulan</li>
              <li class="list-group-item"><strong>Total Harga:</strong> Rp${parseInt(data.total_harga).toLocaleString('id-ID')}</li>
              <li class="list-group-item"><strong>Catatan:</strong> ${data.catatan || '-'}</li>
              <li class="list-group-item"><strong>Bukti KTP/KTM:</strong> <a href="http://localhost/uploads/${data.ktm_ktp}" target="_blank">Lihat File</a></li>
            </ul>
          `;
          formBayar.style.display = 'block';
        } else {
          detailDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
        }
      }).catch(e => {
        detailDiv.innerHTML = `<div class="alert alert-danger">Gagal memuat data pemesanan</div>`;
      });

    // Handle pembayaran form submit
    formBayar.addEventListener('submit', function(e) {
      e.preventDefault();
      messageDiv.textContent = '';

      const formData = new FormData(formBayar);

      fetch('http://localhost/backend/pembayaran.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(res => {
        if (res.status === 'success') {
          messageDiv.innerHTML = `<div class="alert alert-success">${res.message}</div>`;
          formBayar.style.display = 'none';
        } else {
          messageDiv.innerHTML = `<div class="alert alert-danger">${res.message}</div>`;
        }
      }).catch(() => {
        messageDiv.innerHTML = `<div class="alert alert-danger">Gagal mengirim pembayaran</div>`;
      });
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
