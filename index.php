<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kos Bunna</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/Logo-KosBunna.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

   
    <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>
  <body class="index-page">
    <header id="header" class="header fixed-top">
      <?php
        include 'includes/header.php';
    ?>
    </header>

    <main class="main">
      <!-- Hero Section : includes/sections/hero.php -->
        <?php 
        include 'includes/sections/hero.php';
        ?>
      <!-- /Hero Section -->

      <!-- About Section : includes/sections/about.php -->
        <?php 
        include 'includes/sections/about.php';
        ?>
      <!-- /About Section -->

      <!-- Clients Section -->
      <section id="clients" class="clients section">
        <div class="container">
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "spaceBetween": 40
                  },
                  "480": {
                    "slidesPerView": 3,
                    "spaceBetween": 60
                  },
                  "640": {
                    "slidesPerView": 4,
                    "spaceBetween": 80
                  },
                  "992": {
                    "slidesPerView": 6,
                    "spaceBetween": 120
                  }
                }
              }
            </script>
          </div>
        </div>
      </section>
      <!-- /Clients Section -->

      <!-- Stats Section -->
        <?php 
          include 'includes/sections/stats.php';
        ?>
      <!-- /Stats Section -->

      <!-- Call To Action Section -->
      <section
        id="call-to-action"
        class="call-to-action section dark-background"
      >
        <div class="container">
          <img src="assets/img/cta-bg.jpg" alt="" />
          <div
            class="content row justify-content-center"
            data-aos="zoom-in"
            data-aos-delay="100"
          >
            <div class="col-xl-10">
              <div class="text-center">
                <a
                  href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                  class="glightbox play-btn"
                ></a>
                <h3>Call To Action</h3>
                <p>
                  Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint
                  occaecat cupidatat non proident, sunt in culpa qui officia
                  deserunt mollit anim id est laborum.
                </p>
                <a class="cta-btn" href="#">Call To Action</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Call To Action Section -->

      <!-- Services Section -->
        <?php 
          include 'includes/sections/service.php';
        ?>
      <!-- /Services Section -->

      <!-- Testimonials Section -->
        <?php 
          include 'includes/sections/testimonial.php';
        ?>
      <!-- /Testimonials Section -->

      <!-- Portfolio Section -->
        <?php 
          include 'includes/sections/portfolio.php';
        ?>
      <!-- /Portfolio Section -->

      <!-- Team Section -->
        <?php 
          include 'includes/sections/team.php';
        ?>
      <!-- /Team Section -->

      <!-- Pricing Section -->
        <?php 
          include 'includes/sections/pricing.php';
        ?>
      <!-- /Pricing Section -->

      <!-- Faq Section -->
        <?php 
          include 'includes/sections/faq.php';
        ?>
      <!-- /Faq Section -->

      <!-- Contact Section -->
        <?php 
          include 'includes/sections/contact.php';        
        ?>
      <!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer accent-background">
      <?php
        include 'includes/footer.php';
      ?>
    </footer>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>