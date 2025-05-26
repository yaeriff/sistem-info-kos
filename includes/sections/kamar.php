<?php

// Ambil data JSON dari API
$response = file_get_contents('http://localhost/backend/api/kamar.php');

// Decode JSON ke array
$dataKamar = json_decode($response, true);
?>

<section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Fasilitas</h2>
          <p>
            Beberapa fasilitas yang ditawarkan oleh Kos Bunna :
          </p>
        </div>
        <!-- End Section Title -->

        <div class="container">
          <div
            class="isotope-layout"
            data-default-filter="*"
            data-layout="masonry"
            data-sort="original-order"
          >
            <!-- <ul
              class="portfolio-filters isotope-filters"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-product">Product</li>
              <li data-filter=".filter-branding">Branding</li>
              <li data-filter=".filter-books">Books</li>
            </ul> -->
            <!-- End Portfolio Filters -->

            <div
              class="row gy-4 isotope-container"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/kasur.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/kasur.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Kasur</a
                      >
                    </h4>
                    <p>Kasur yang nyaman, lengkap dengan bantal dan sprei.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->
              

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


              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/kipasangin.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/kipasangin.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Kipas Angin</a
                      >
                    </h4>
                    <p>Kipas angin yang menyejukkan.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/lemaribaju.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/lemaribaju.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Lemari Baju</a
                      >
                    </h4>
                    <p>Lemari untuk menyimpan pakaian Anda.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Free Wi-Fi</a
                      >
                    </h4>
                    <p>Wi-Fi gratis untuk menunjang aktivitas Anda.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Kamar Mandi Luar</a
                      >
                    </h4>
                    <p>Kamar mandi untuk membersihkan diri Anda.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >TV Bersama</a
                      >
                    </h4>
                    <p>TV untuk menonton acara favorit Anda.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Jemuran Bersama</a
                      >
                    </h4>
                    <p>Jemuran untuk mengeringkan pakaian Anda.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Balkon Lantai 2</a
                      >
                    </h4>
                    <p>Tempat untuk melihat pemandangan.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Tempat Parkir</a
                      >
                    </h4>
                    <p>Tempat untuk memakirkan kendaraan Anda.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Kompor Bersama</a
                      >
                    </h4>
                    <p>Kompor untuk memasak makanan Anda. Ini sudah termasuk fasilitas untuk Gas Elpiji.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Air Conditioner (AC)</a
                      >
                    </h4>
                    <p>AC yang menyejukkan.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/fasilitas/placeholder.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/fasilitas/placeholder.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Akun Kos</a
                      >
                    </h4>
                    <p>Akun untuk melihat informasi seputar kos.</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->
            </div>
            <!-- End Portfolio Container -->
          </div>
        </div>
      </section>