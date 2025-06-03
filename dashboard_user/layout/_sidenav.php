<!-- Pastikan Bootstrap CSS & FontAwesome sudah di-include -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh;">
  <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
    <img src="../assets/img/logo.png" alt="logo" width="150">
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <span class="nav-link disabled">Dashboard</span>
    </li>
    <li>
      <a href="../" class="nav-link text-dark">
        <i class="fas fa-fire me-2"></i>Home
      </a>
    </li>

    <li class="nav-item mt-3">
      <span class="nav-link disabled">Main Feature</span>
    </li>

    <!-- Dropdown Dosen -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownDosen" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-columns me-2"></i>Dosen
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownDosen">
        <li><a class="dropdown-item" href="../dosen/index.php">List</a></li>
        <li><a class="dropdown-item" href="../dosen/create.php">Tambah Data</a></li>
      </ul>
    </li>

    <!-- Dropdown Mahasiswa -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownMahasiswa" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-columns me-2"></i>Mahasiswa
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMahasiswa">
        <li><a class="dropdown-item" href="../mahasiswa/index.php">List</a></li>
        <li><a class="dropdown-item" href="../mahasiswa/create.php">Tambah Data</a></li>
      </ul>
    </li>

    <!-- Dropdown User -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-columns me-2"></i>User
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownUser">
        <li><a class="dropdown-item" href="../user/index.php">List</a></li>
        <li><a class="dropdown-item" href="../user/create.php">Tambah Data</a></li>
      </ul>
    </li>

    
    <!-- Dropdown Mata Kuliah -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownMatkul" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-columns me-2"></i>Mata Kuliah
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMatkul">
        <li><a class="dropdown-item" href="../matakuliah/index.php">List</a></li>
        <li><a class="dropdown-item" href="../matakuliah/create.php">Tambah Data Nilai</a></li>
      </ul>
    </li>

    <!-- Dropdown Nilai -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownNilai" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-columns me-2"></i>Nilai
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownNilai">
        <li><a class="dropdown-item" href="../nilai/index.php">List</a></li>
        <li><a class="dropdown-item" href="../nilai/create.php">Tambah Nilai</a></li>
      </ul>
    </li>
  </ul>
</div>

<!-- Tambahkan Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
