<?php
session_start();
require_once 'helper/connection.php';

// Ambil kamar premium
$queryPremium = "SELECT * FROM kamar WHERE tipe = 'premium'";
$resultPremium = mysqli_query($connection, $queryPremium);
if (!$resultPremium) {
    die("Query Error (Premium): " . mysqli_error($connection));
}
$kamarPremium = mysqli_fetch_all($resultPremium, MYSQLI_ASSOC);

// Ambil kamar reguler
$queryReguler = "SELECT * FROM kamar WHERE tipe = 'reguler'";
$resultReguler = mysqli_query($connection, $queryReguler);
if (!$resultReguler) {
    die("Query Error (Reguler): " . mysqli_error($connection));
}
$kamarReguler = mysqli_fetch_all($resultReguler, MYSQLI_ASSOC);
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
    
  <style>
  body {
    background-color: white;
    color: #16404D;
  }

  .bg-custom-card {
    background-color: #A6CDC6;
  }

  .btn-custom {
    background-color: #DDA853;
    color: #16404D;
    font-weight: 600;
    border: none;
  }

  .btn-custom:hover {
    background-color: #c49448;
    color: #fff;
  }

  .section-title h2, .section-title p {
    color: #16404D;
  }

  .portfolio-info h4 {
    color: #16404D;
  }
</style>

</head>
<body>
<section id="portfolio" class="portfolio section">
  <a href="index.php" class="btn btn-outline-warning m-3">
    <i class="bi bi-arrow-left me-1"></i> Kembali
  </a>
<div class="container text-center py-4" data-aos="fade-up">
  <h2 class="fw-bold mb-3">
    <i class="bi bi-building-check me-2 text-primary"></i>Daftar Kamar
  </h2>
  <p class="text-muted fs-5">
    Berikut adalah daftar kamar kos yang tersedia berdasarkan tipe:
  </p>
</div>

  <div class="container">
    <!-- Tipe Premium -->
    <div class="mb-5">
      <h4 class="mb-3 text-primary fw-bold border-start border-4 ps-3 d-flex align-items-center" style="border-color: #16404D;">
        <i class="bi bi-star-fill me-2" style="color:#16404D;"></i> Tipe Premium
      </h4>
      <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($kamarPremium as $kamar): ?>
          <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm position-relative overflow-hidden">
              <div class="position-relative">
                <a href="assets/img/kamar/<?php echo htmlspecialchars($kamar['foto']); ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                  <img src="assets/img/kamar/<?php echo htmlspecialchars($kamar['foto']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($kamar['nama_kamar']); ?>">
                </a>
                <span class="badge position-absolute top-0 start-0 m-2 px-3 py-2 fs-6 <?= $kamar['status'] === 'terisi' ? 'bg-danger' : 'bg-success'; ?>">
                  <?= $kamar['status'] === 'terisi' ? 'Tidak Tersedia' : 'Tersedia'; ?>
                </span>
              </div>
             <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-semibold mb-2">
                  <i class="bi bi-door-open-fill me-1 text-primary" style="color: #16404D !important;"></i>
                  <?php echo htmlspecialchars($kamar['nama_kamar']); ?>
                </h5>
                <p class="card-text text-muted mb-2" style="font-size: 0.95rem; max-height: 4.5em; overflow: hidden; text-overflow: ellipsis;">
                  <?php echo htmlspecialchars($kamar['deskripsi']); ?>
                </p>
                <p class="card-text fw-bold text-success fs-6 mb-3">
                  <i class="bi bi-cash-coin me-1"></i>
                  Rp<?php echo number_format($kamar['harga'], 0, ',', '.'); ?> <span class="text-muted fw-normal">/ bulan</span>
                </p>

                <form method="POST" action="<?= isset($_SESSION['login']) ? 'preorder.php' : 'forms/auth/login.php'; ?>" class="mt-auto">
                  <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($kamar['id_kamar']); ?>">
                  <button type="submit"
                          class="btn w-100 <?= ($kamar['status'] === 'terisi') ? 'btn-danger' : 'btn-warning'; ?>"
                          <?= ($kamar['status'] === 'terisi') ? 'disabled' : ''; ?>>
                    <?= ($kamar['status'] === 'terisi') ? '<i class="bi bi-x-circle me-1"></i>Terisi' : '<i class="bi bi-cart-plus me-1"></i>Pre Order'; ?>
                  </button>
                </form>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Tipe Reguler -->
    <div class="mb-5">
      <h4 class="mb-3 text-success fw-bold border-start border-4 ps-3 d-flex align-items-center" style="border-color: #28a745;">
        <i class="bi bi-house-door-fill me-2" style="color:#28a745;"></i> Tipe Reguler
      </h4>
      <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($kamarReguler as $kamar): ?>
          <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm position-relative overflow-hidden">
              <div class="position-relative">
                <a href="assets/img/kamar/<?php echo htmlspecialchars($kamar['foto']); ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                  <img src="assets/img/kamar/<?php echo htmlspecialchars($kamar['foto']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($kamar['nama_kamar']); ?>">
                </a>
                <span class="badge position-absolute top-0 start-0 m-2 px-3 py-2 fs-6 <?= $kamar['status'] === 'terisi' ? 'bg-danger' : 'bg-success'; ?>">
                  <?= $kamar['status'] === 'terisi' ? 'Tidak Tersedia' : 'Tersedia'; ?>
                </span>
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-semibold mb-2">
                  <i class="bi bi-door-open-fill me-1 text-primary" style="color: #16404D !important;"></i>
                  <?php echo htmlspecialchars($kamar['nama_kamar']); ?>
                </h5>
                <p class="card-text text-muted mb-2" style="font-size: 0.95rem; max-height: 4.5em; overflow: hidden; text-overflow: ellipsis;">
                  <?php echo htmlspecialchars($kamar['deskripsi']); ?>
                </p>
                <p class="card-text fw-bold text-success fs-6 mb-3">
                  <i class="bi bi-cash-coin me-1"></i>
                  Rp<?php echo number_format($kamar['harga'], 0, ',', '.'); ?> <span class="text-muted fw-normal">/ bulan</span>
                </p>

                <form method="POST" action="<?= isset($_SESSION['login']) ? 'preorder.php' : 'forms/auth/login.php'; ?>" class="mt-auto">
                  <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($kamar['id_kamar']); ?>">
                  <button type="submit"
                          class="btn w-100 <?= ($kamar['status'] === 'terisi') ? 'btn-danger' : 'btn-warning'; ?>"
                          <?= ($kamar['status'] === 'terisi') ? 'disabled' : ''; ?>>
                    <?= ($kamar['status'] === 'terisi') ? '<i class="bi bi-x-circle me-1"></i>Terisi' : '<i class="bi bi-cart-plus me-1"></i>Pre Order'; ?>
                  </button>
                </form>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
      const lightbox = GLightbox({ selector: '.glightbox' });
    </script>
</body>
</html>

