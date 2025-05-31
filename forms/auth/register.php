<!-- login.php -->
<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      $data = ['nama' => $nama, 'email' => $email, 'phone' => $phone, 'password' => $password];
      $options = [
          'http' => [
              'header'  => "Content-type: application/json",
              'method'  => 'POST',
              'content' => json_encode($data)
          ]
      ];
      $context = stream_context_create($options);
      $result = @file_get_contents("http://localhost/backend/api/auth/login.php", false, $context);

      if ($result === FALSE) {
          echo "Gagal menghubungi server.";
      } else {
          $res = json_decode($result, true);
          if ($res['status']) {
              $_SESSION['token'] = $res['token'];
              $_SESSION['user'] = $res['data']['id'];
              $_SESSION['nama'] = $res['data']['nama'];
              
              header("Location: ../../index.php"); // redirect ke homepage
              exit;
          } else {
              echo "<p style='color:red;'>Login gagal: " . $res['message'] . "</p>";
          }
      }
  }
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
        <header>Register</header>
        <form action="" method="post">

          <div class="field input">
            <label for="nama">Nama</label>
            <input type="email" name="nama" id="nama" autocomplete="off" required>
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

          <div class="field">
            <input type="submit" class="btn" name="submit" value="login" autocomplete="off" required>
          </div>
          <div class="links">
            Sudah punya akun? <a href="login.php">Login Sekarang!</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

