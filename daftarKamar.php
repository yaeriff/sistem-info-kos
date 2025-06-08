<?php
require_once 'helper/connection.php';

$query = "SELECT * FROM kamar LIMIT 6";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_error($connection));
}

$dataKamar = mysqli_fetch_all($result, MYSQLI_ASSOC);


$kamarByTipe = [];

foreach ($dataKamar as $kamar) {
    $tipe = $kamar['tipe'];
    if (!isset($kamarByTipe[$tipe])) {
        $kamarByTipe[$tipe] = [];
    }
    $kamarByTipe[$tipe][] = $kamar;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
        />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<section id="portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar Kamar</h2>
    <p>Berikut adalah daftar kamar kos yang tersedia berdasarkan tipe:</p>
  </div>

  <div class="container">
    <?php foreach ($kamarByTipe as $tipe => $kamars): ?>
      <div class="mb-5">
        <h4 class="mb-3"><?php echo htmlspecialchars(ucwords($tipe)); ?></h4>
        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          <?php foreach ($kamars as $kamar): ?>
            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-content h-100">
                <a href="assets/img/fasilitas/<?php echo htmlspecialchars($kamar['foto']); ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                  <img src="assets/img/kamar/<?php echo htmlspecialchars($kamar['foto']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($kamar['nama_kamar']); ?>">
                </a>
                <div class="portfolio-info">
                  <h4><?php echo htmlspecialchars($kamar['nama_kamar']); ?></h4>
                  <p><?php echo htmlspecialchars($kamar['deskripsi']); ?></p>
                  <p><strong>Harga:</strong> Rp<?php echo number_format($kamar['harga'], 0, ',', '.'); ?> / bulan</p>
                  <form method="POST" action="<?= isset($_SESSION['login']) ? 'preorder.php' : 'forms/auth/login.php'; ?>">
                    <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($kamar['id_kamar']); ?>">
                    <button type="submit" class="btn btn-primary" <?= ($kamar['status'] === 'terisi') ? 'disabled' : ''; ?>>
                      <?= ($kamar['status'] === 'terisi') ? 'Terisi' : 'Pre Order'; ?>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
      const lightbox = GLightbox({ selector: '.glightbox' });
    </script>
</body>
</html>

