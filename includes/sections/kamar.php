<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'helper/connection.php';

$query = "SELECT * FROM kamar LIMIT 6";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_error($connection));
}

$dataKamar = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<section id="portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar Kamar</h2>
    <p>Berikut adalah daftar kamar kos yang tersedia:</p>
  </div>
  <div class="container">
    <div class="d-flex align-items-center mb-3">
      <h6 class="fw-bold mb-0">Daftar Kamar Kos</h6>
      <div class="flex-grow-1 border-top border-2 mx-3" style="border-color: #16404D !important;"></div>
      <a href="daftarKamar.php" class="btn btn-sm fw-semibold shadow-sm rounded-pill" style="background-color: #16404D; color: #fff;">Lihat Selengkapnya</a>
    </div>
     <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
    <?php foreach ($dataKamar as $kamar): ?>
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100 border-0" style="background-color: #FBF5DD !important;">
          <div class="position-relative">
            <img src="dashboard_admin/assets/img/fasilitas/<?php echo htmlspecialchars($kamar['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($kamar['nama_kamar']); ?>">
            <span class="position-absolute top-0 start-0 bg-<?= $kamar['status'] === 'terisi' ? 'danger' : 'success'; ?> text-white px-3 py-1 rounded-end">
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

    <!-- Tombol Lihat Selengkapnya -->
    
  </div>
</section>
