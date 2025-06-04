<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/main.css">

<div class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center">
        <a href="mailto:kosbunna@gmail.com">kosbunna@gmail.com</a>
      </i>
      <i class="bi bi-phone d-flex align-items-center ms-4">
        <span>+62 8951 4595 376</span>
      </i>
    </div>
    <!-- Login / Logout Button -->
    <div>
      <?php if (isset($_SESSION['login'])): ?>
        <div class="dropdown">
          <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" style="color: white; width: 30px">
              <div class="d-sm-none d-lg-inline-block" style="color: white; font-weight: bold;">Hi, <?= $_SESSION['login']['nama_pengguna'] ?></div>
          </a>

          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="dashboard_user/index.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="#">Pesan Masuk</a></li>
            <li><a class="dropdown-item" href="riwayat.php">Riwayat Pemesanan</a></li>
            <li>
              <a href="forms/auth/logout.php" class="dropdown-item has-icon text-danger">
                <i class="bi bi-box-arrow-left"></i> Logout
              </a>
            </li>
          </ul>
        </div>
      <?php else: ?>
        <a href="forms/auth/login.php" class="btn btn-sm btn-primary px-4">Login</a>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- End Top Bar -->

<div class="branding d-flex align-items-center" id="branding">
  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo-KosBunna.png" alt="Logo KosBunna" width="50px" />
      <h1 class="sitename">Kos Bunna</h1>
      <span>.</span>
    </a>
    <nav id="navmenu" class="navmenu">
      <ul>
        
        <li><a href="#hero">Beranda<br /></a></li>
        <li><a href="#about">Tentang Kos</a></li>
        <li><a href="#portfolio">Daftar Kamar</a></li>
        <li><a href="#contact">Kontak</a></li>

      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
