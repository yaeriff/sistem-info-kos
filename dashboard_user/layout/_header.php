<?php

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="sticky: top; height: 10vh; ">
  <div class="container-fluid">
    <div class="dropdown ms-auto">
      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../assets/img/avatar/avatar-1.png" alt="avatar" class="rounded-circle me-2" style="width: 30px;">
        <span class="text-white">Hi, <?= $_SESSION['login']['nama_pengguna'] ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a href="../form/auth/logout.php" class="dropdown-item text-danger">
            <i class="bi bi-box-arrow-left me-2"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

