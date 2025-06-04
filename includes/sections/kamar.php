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
    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
      <?php foreach ($dataKamar as $kamar): ?>
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo htmlspecialchars($kamar['tipe']); ?>">
          <div class="portfolio-content h-100">
            <a href="assets/img/fasilitas/<?php echo htmlspecialchars($kamar['foto']); ?>" data-gallery="portfolio-gallery-app" class="glightbox">
              <img src="assets/img/fasilitas/<?php echo htmlspecialchars($kamar['foto']); ?>" class="img-" alt="<?php echo htmlspecialchars($kamar['nama_kamar']); ?>" width="100px">
            </a>
            <div class="portfolio-info">
              <h4><?php echo htmlspecialchars($kamar['nama_kamar']); ?></h4>
              <p><?php echo htmlspecialchars($kamar['deskripsi']); ?></p>
              <p><strong>Harga:</strong> Rp<?php echo number_format($kamar['harga'], 0, ',', '.'); ?> / bulan</p>

              <form method="POST" action="<?= isset($_SESSION['login']) ? 'preorder.php' : 'forms/auth/login.php'; ?>">
                <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($kamar['id_kamar']); ?>">
                <br>
                <button type="submit" class="btn btn-primary"
                  <?= ($kamar['status'] === 'terisi') ? 'disabled' : ''; ?>>
                  <?= ($kamar['status'] === 'terisi') ? 'Terisi' : 'Pre Order'; ?>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tombol Lihat Selengkapnya -->
    <div class="text-center mt-4">
      <a href="daftarKamar.php" class="btn btn-outline-primary">Lihat Selengkapnya</a>
    </div>
  </div>
</section>
