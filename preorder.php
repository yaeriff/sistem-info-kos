<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek login
if (!isset($_SESSION['user'])) {
    header("Location: forms/auth/login.php");
    exit();
}

// Ambil data POST dari halaman kamar.php via form submit
$id_kamar = $_POST['id_kamar'] ?? '';
$nama_kamar = $_POST['nama_kamar'] ?? '';
$tipe_kamar = $_POST['tipe_kamar'] ?? '';
$nama_user = $_SESSION['nama'] ?? '';

// Result response dari backend upload.php
$result = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $postData = [
        'user' => $_SESSION['user'],
        'id_kamar' => $_POST['id_kamar'],
        'tanggal_mulai' => $_POST['tanggal_mulai'],
        'durasi' => $_POST['durasi'],
        'catatan' => $_POST['catatan'] ?? '',
    ];

    $file = $_FILES['file'];
    $cfile = new CURLFile($file['tmp_name'], mime_content_type($file['tmp_name']), $file['name']);

    $postData['file'] = $cfile;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://localhost/backend/api/upload.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Pre-Order Kamar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
  <h1>Pre-Order Kamar</h1>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama Pengguna</label>
      <input type="text" class="form-control" value="<?= htmlspecialchars($nama_user) ?>" disabled>
    </div>

    <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($id_kamar) ?>">
    <div class="mb-3">
      <label class="form-label">Nama Kamar</label>
      <input type="text" class="form-control" value="<?= htmlspecialchars($nama_kamar) ?>" disabled>
    </div>

    <div class="mb-3">
      <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
      <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required />
    </div>

    <div class="mb-3">
      <label for="durasi" class="form-label">Durasi (hari)</label>
      <input type="number" id="durasi" name="durasi" class="form-control" min="1" required />
    </div>

    <div class="mb-3">
      <label for="catatan" class="form-label">Catatan (opsional)</label>
      <textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
      <label for="file" class="form-label">Upload KTP/KTM</label>
      <input type="file" id="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required />
    </div>

    <button type="submit" class="btn btn-primary">Submit Pre-Order</button>
  </form>

  <?php if (!empty($result)): ?>
    <div class="mt-4">
      <?php if ($result['status'] === 'success'): ?>
        <div class="alert alert-success">
          Pre-Order berhasil dengan ID: <?= htmlspecialchars($result['id_pemesanan']) ?><br>
          File uploaded: <?= htmlspecialchars($result['file']) ?>
        </div>
      <?php else: ?>
        <div class="alert alert-danger">
          Error: <?= htmlspecialchars($result['message']) ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
