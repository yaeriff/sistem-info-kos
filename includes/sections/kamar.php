<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Hindari error jika sudah ada session sebelumnya
}// Penting agar $_SESSION bisa digunakan

// Ambil data JSON dari API
$response = file_get_contents('http://localhost/backend/api/kamar.php');

// Decode JSON ke array
$dataKamar = json_decode($response, true);
?>

<!-- Tampilkan dalam HTML -->
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
              <img src="assets/img/fasilitas/<?php echo htmlspecialchars($kamar['foto']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($kamar['nama_kamar']); ?>">
            </a>
            <div class="portfolio-info">
              <h4><?php echo htmlspecialchars($kamar['nama_kamar']); ?></h4>
              <p><?php echo htmlspecialchars($kamar['deskripsi']); ?></p>
              
              <!-- Tombol Pre Order -->
              <form action="<?= isset($_SESSION['user']) ? 'preorder.php' : 'forms/auth/login.php'; ?>" method="POST">
                <input type="hidden" name="id_kamar" value="<?= htmlspecialchars($kamar['id_kamar']); ?>">
                <input type="hidden" name="nama_kamar" value="<?= htmlspecialchars($kamar['nama_kamar']); ?>">
                <input type="hidden" name="tipe_kamar" value="<?= htmlspecialchars($kamar['tipe']); ?>">
                <button type="submit" class="btn btn-primary" <?= ($kamar['status'] === 'terisi') ? 'disabled' : ''; ?>>
                  Pre Order
                </button>
              </form>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
