<!-- login.php -->
<?php
require_once '../../helper/connection.php';
session_start();

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM pengguna WHERE email = ?";
  $stmt = mysqli_prepare($connection, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  if ($row && password_verify($password, $row['password'])) {
    $_SESSION['login'] = $row;
     if ($row['role'] == 'Admin') {
      header('Location: ../../dashboard_admin/dashboard/index.php');
    } elseif ($row['role'] == 'User') {
      header('Location: ../../index.php');
    } 
    exit;
  } else {
    $error = true;
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
        
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
            <div class="alert alert-danger mt-2" role="alert">email atau password salah</div>
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
