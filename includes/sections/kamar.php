<?php

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
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo $kamar['tipe']; ?>">
          <div class="portfolio-content h-100">
            <a href="assets/img/fasilitas/<?php echo $kamar['foto']; ?>" data-gallery="portfolio-gallery-app" class="glightbox">
              <img src="assets/img/fasilitas/<?php echo $kamar['foto']; ?>" class="img-fluid" alt="<?php echo $kamar['nama_kamar']; ?>">
            </a>
            <div class="portfolio-info">
              <h4><?php echo $kamar['nama_kamar']; ?></h4>
              <p><?php echo $kamar['deskripsi']; ?></p>
              
              <!-- Tombol Pre Order -->
              <form action="<?php echo isset($_SESSION['user']) ? 'preorder.php' : 'forms/auth/login.php'; ?>" method="POST">
                <input type="hidden" name="id_kamar" value="<?php echo $kamar['id_kamar']; ?>">
                <button type="submit" class="btn btn-primary" <?php echo ($kamar['status'] === 'terisi') ? 'disabled' : ''; ?>>
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

