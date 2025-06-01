<!-- login.php -->
<?php
require_once '../../helper/connection.php';
session_start();

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

      $data = ['email' => $email, 'password' => $password];
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
      // }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger">Email atau password salah!</div>
        <?php endif; ?>
        <div class="text-center mb-4 fs-4 fw-bold">Login</div>
        <form action="" method="post">

          <div class="field input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
          </div>

          <?php if(isset($error)) : ?>
            <div class="alert alert-danger mt-2" role="alert">user atau password salah</div>
          <?php endif ?>

          <div class="field">
            <input type="submit" class="btn" name="submit" value="login" required>
          </div>
          <div class="links">
            Belum punya akun? <a href="register.php">Daftar Sekarang!</a>
          </div>
        </form>

      </div>
    </div>
  </body>
</html>
