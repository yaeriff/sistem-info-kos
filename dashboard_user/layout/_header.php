<?php

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
?>
<div class="navbar-bg bg-dark"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" style="color: white; width: 30px">
        <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['login']['nama_pengguna'] ?></div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="../logout.php" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>