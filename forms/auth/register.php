<!-- register.php -->
<?php
session_start(); 
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';         // isi dengan password MySQL Anda
$db_name = 'kos'; // ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    // Ambil data dari form
    $nama     = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone    = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Validasi sederhana (bisa diperluas)
    if (empty($nama) || empty($email) || empty($phone) || empty($password)) {
        echo "<p style='color:red;'>Semua kolom harus diisi.</p>";
    } else {
        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errore = true;
            $stmt->close();
        } else {
            $stmt->close();

            // Hash password sebelum disimpan (gunakan password_hash)
            $plain_password = $password;

            // Siapkan statement untuk insert data
            $insert = $conn->prepare("INSERT INTO user (nama, email, phone, password) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $nama, $email, $phone, $plain_assword);

            if ($insert->execute()) {
                // Jika berhasil, redirect ke halaman login.php
                header("Location: login.php");
                exit();
            } else {
                echo "<p style='color:red;'>Terjadi kesalahan: " . $conn->error . "</p>";
            }

            $insert->close();
        }
    }
}

$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
        <header>Buat Akun Baru</header>
        <form action="" method="post">

          <div class="field input">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" autocomplete="off" required>
          </div>

          <div class="field input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="off" required>
          </div>

          <div class="field input">
            <label for="phone">No Telp</label>
            <input type="number" name="phone" id="phone" autocomplete="off" required>
          </div>

          <div class="field input">
            <label for="password">Buat Password</label>
            <input type="password" name="password" id="password" autocomplete="off" required>
          </div>

          <?php if(isset($errore)) : ?>
            <div class="alert alert-danger mt-2" role="alert">Email sudah ada!</div>
          <?php endif ?>

          <div class="field">
            <input type="submit" class="btn" name="submit" value="Daftar" autocomplete="off" required>
          </div>
          <div class="links">
            Sudah punya akun? <a href="login.php">Login Sekarang!</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

