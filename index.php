<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kos Bu Anna</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

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
          include 'includes/sections/services.php';
        ?>
      <!-- /Services Section -->

      <!-- Testimonials Section -->
        <?php 
          include 'includes/sections/testimonial.php';
        ?>
      <!-- /Testimonials Section -->

      <!-- Portfolio Section -->
      <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
          <p>
            Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
            consectetur velit
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
            <ul
              class="portfolio-filters isotope-filters"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-product">Product</li>
              <li data-filter=".filter-branding">Branding</li>
              <li data-filter=".filter-books">Books</li>
            </ul>
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
                    href="assets/img/portfolio/app-1.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/app-1.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >App 1</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/product-1.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/product-1.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Product 1</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/branding-1.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/branding-1.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Branding 1</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/books-1.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/books-1.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Books 1</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/app-2.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/app-2.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >App 2</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/product-2.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/product-2.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Product 2</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/branding-2.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/branding-2.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Branding 2</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/books-2.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/books-2.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Books 2</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/app-3.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/app-3.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >App 3</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/product-3.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/product-3.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Product 3</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/branding-3.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/branding-3.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Branding 3</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->

              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books"
              >
                <div class="portfolio-content h-100">
                  <a
                    href="assets/img/portfolio/books-3.jpg"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox"
                    ><img
                      src="assets/img/portfolio/books-3.jpg"
                      class="img-fluid"
                      alt=""
                  /></a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"
                        >Books 3</a
                      >
                    </h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->
            </div>
            <!-- End Portfolio Container -->
          </div>
        </div>
      </section>
      <!-- /Portfolio Section -->

      <!-- Team Section -->
      <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Our Team</h2>
          <p>
            Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
            consectetur velit
          </p>
        </div>
        <!-- End Section Title -->

        <div class="container">
          <div class="row gy-4">
            <div
              class="col-xl-3 col-md-6 d-flex"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-1.jpg"
                  class="img-fluid"
                  alt=""
                />
                <h4>Walter White</h4>
                <span>Web Development</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
            <!-- End Team Member -->

            <div
              class="col-xl-3 col-md-6 d-flex"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-2.jpg"
                  class="img-fluid"
                  alt=""
                />
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
            <!-- End Team Member -->

            <div
              class="col-xl-3 col-md-6 d-flex"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-3.jpg"
                  class="img-fluid"
                  alt=""
                />
                <h4>William Anderson</h4>
                <span>Content</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
            <!-- End Team Member -->

            <div
              class="col-xl-3 col-md-6 d-flex"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-4.jpg"
                  class="img-fluid"
                  alt=""
                />
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
            <!-- End Team Member -->
          </div>
        </div>
      </section>
      <!-- /Team Section -->

      <!-- Pricing Section -->
      <section id="pricing" class="pricing section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Harga</h2>
          <p>Pilihan Paket Kamar :</p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="zoom-in" data-aos-delay="100">
          <div class="row g-4">
            <div class="col-lg-4">
              <div class="pricing-item">
                <h3>Kamar 3 orang</h3>
                <div class="icon">
                  <i class="bi bi-box"></i>
                </div>
                <h4><sup>Rp</sup>270k<span> / month</span></h4>
                <ul>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Quam adipiscing vitae proin</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Nec feugiat nisl pretium</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Nulla at volutpat diam uteera</span>
                  </li>
                  <li class="na">
                    <i class="bi bi-x"></i>
                    <span>Pharetra massa massa ultricies</span>
                  </li>
                  <li class="na">
                    <i class="bi bi-x"></i>
                    <span>Massa ultricies mi quis hendrerit</span>
                  </li>
                </ul>
                <div class="text-center">
                  <a href="#" class="buy-btn">Cek Ketersediaan</a>
                </div>
              </div>
            </div>
            <!-- End Pricing Item -->

            <div class="col-lg-4">
              <div class="pricing-item featured">
                <h3>Kamar 2 orang</h3>
                <div class="icon">
                  <i class="bi bi-rocket"></i>
                </div>

                <h4><sup>Rp</sup>400k<span> / month</span></h4>
                <ul>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Quam adipiscing vitae proin</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Nec feugiat nisl pretium</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Nulla at volutpat diam uteera</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Pharetra massa massa ultricies</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Massa ultricies mi quis hendrerit</span>
                  </li>
                </ul>
                <div class="text-center">
                  <a href="#" class="buy-btn">Cek Ketersediaan</a>
                </div>
              </div>
            </div>
            <!-- End Pricing Item -->

            <div class="col-lg-4">
              <div class="pricing-item">
                <h3>Kamar 1 orang</h3>
                <div class="icon">
                  <i class="bi bi-send"></i>
                </div>
                <h4><sup>Rp</sup>800k<span> / month</span></h4>
                <ul>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Quam adipiscing vitae proin</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Nec feugiat nisl pretium</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Nulla at volutpat diam uteera</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Pharetra massa massa ultricies</span>
                  </li>
                  <li>
                    <i class="bi bi-check"></i>
                    <span>Massa ultricies mi quis hendrerit</span>
                  </li>
                </ul>
                <div class="text-center">
                  <a href="#" class="buy-btn">Cek Ketersediaan</a>
                </div>
              </div>
            </div>
            <!-- End Pricing Item -->
          </div>
        </div>
      </section>
      <!-- /Pricing Section -->

      <!-- Faq Section -->
      <section id="faq" class="faq section">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="content px-xl-5">
                <h3>
                  <span>Frequently Asked </span><strong>Questions</strong>
                </h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Duis aute irure dolor in reprehenderit
                </p>
              </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3>
                    <span class="num">1.</span>
                    <span>Non consectetur a erat nam at lectus urna duis?</span>
                  </h3>
                  <div class="faq-content">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna
                      id volutpat lacus laoreet non curabitur gravida. Venenatis
                      lectus magna fringilla urna porttitor rhoncus dolor purus
                      non.
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

                <div class="faq-item">
                  <h3>
                    <span class="num">2.</span>
                    <span
                      >Feugiat scelerisque varius morbi enim nunc faucibus a
                      pellentesque?</span
                    >
                  </h3>
                  <div class="faq-content">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque
                      habitant morbi. Id interdum velit laoreet id donec
                      ultrices. Fringilla phasellus faucibus scelerisque
                      eleifend donec pretium. Est pellentesque elit ullamcorper
                      dignissim. Mauris ultrices eros in cursus turpis massa
                      tincidunt dui.
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

                <div class="faq-item">
                  <h3>
                    <span class="num">3.</span>
                    <span
                      >Dolor sit amet consectetur adipiscing elit
                      pellentesque?</span
                    >
                  </h3>
                  <div class="faq-content">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices
                      sagittis orci. Faucibus pulvinar elementum integer enim.
                      Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                      tellus pellentesque eu tincidunt. Lectus urna duis
                      convallis convallis tellus. Urna molestie at elementum eu
                      facilisis sed odio morbi quis
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

                <div class="faq-item">
                  <h3>
                    <span class="num">4.</span>
                    <span
                      >Ac odio tempor orci dapibus. Aliquam eleifend mi in
                      nulla?</span
                    >
                  </h3>
                  <div class="faq-content">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque
                      habitant morbi. Id interdum velit laoreet id donec
                      ultrices. Fringilla phasellus faucibus scelerisque
                      eleifend donec pretium. Est pellentesque elit ullamcorper
                      dignissim. Mauris ultrices eros in cursus turpis massa
                      tincidunt dui.
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

                <div class="faq-item">
                  <h3>
                    <span class="num">5.</span>
                    <span
                      >Tempus quam pellentesque nec nam aliquam sem et tortor
                      consequat?</span
                    >
                  </h3>
                  <div class="faq-content">
                    <p>
                      Molestie a iaculis at erat pellentesque adipiscing
                      commodo. Dignissim suspendisse in est ante in. Nunc vel
                      risus commodo viverra maecenas accumsan. Sit amet nisl
                      suscipit adipiscing bibendum est. Purus gravida quis
                      blandit turpis cursus in
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Faq Section -->

      <!-- Contact Section -->
      <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Kontak kami</h2>
          <p>
            Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
            consectetur velit
          </p>
        </div>
        <!-- End Section Title -->

        <div
          class="container d-flex flex-column align-items-center justify-content-center"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="row gx-lg-0 gy-4 justify-content-center">
            <div class="col-lg-15">
              <div
                class="info-container d-flex flex-column align-items-center justify-content-center"
              >
                <div
                  class="info-item d-flex"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <i class="bi bi-geo-alt flex-shrink-0"></i>
                  <div>
                    <h3>Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div>
                <!-- End Info Item -->

                <div
                  class="info-item d-flex"
                  data-aos="fade-up"
                  data-aos-delay="300"
                >
                  <i class="bi bi-telephone flex-shrink-0"></i>
                  <div>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55</p>
                  </div>
                </div>
                <!-- End Info Item -->

                <div
                  class="info-item d-flex"
                  data-aos="fade-up"
                  data-aos-delay="400"
                >
                  <i class="bi bi-envelope flex-shrink-0"></i>
                  <div>
                    <h3>Email Us</h3>
                    <p>info@example.com</p>
                  </div>
                </div>
                <!-- End Info Item -->

                <div
                  class="info-item d-flex"
                  data-aos="fade-up"
                  data-aos-delay="500"
                >
                  <i class="bi bi-clock flex-shrink-0"></i>
                  <div>
                    <h3>Open Hours:</h3>
                    <p>Mon-Sat: 11AM - 23PM</p>
                  </div>
                </div>
                <!-- End Info Item -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer accent-background">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">Impact</span>
            </a>
            <p>
              Cras fermentum odio eu feugiat lide par naso tierra. Justo eget
              nada terra videa magna derita valies darta donna mare fermentum
              iaculis eu non diam phasellus.
            </p>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div
            class="col-lg-3 col-md-12 footer-contact text-center text-md-start"
          >
            <h4>Contact Us</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p>United States</p>
            <p class="mt-4">
              <strong>Phone:</strong> <span>+1 5589 55488 55</span>
            </p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>
          © <span>Copyright</span>
          <strong class="px-1 sitename">Impact</strong>
          <span>All Rights Reserved</span>
        </p>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
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

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
