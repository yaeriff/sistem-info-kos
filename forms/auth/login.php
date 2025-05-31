<!-- login.php -->
<?php
require_once '../../helper/connection.php';
session_start();
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  //$sql = "SELECT * FROM login WHERE username='$username' and password='$password' LIMIT 1";
  $sql = "SELECT * FROM user WHERE email='$email'";

  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  var_dump($row);

  if ((mysqli_num_rows($result) === 1) && ($password==$row['password'])) {
    $_SESSION['login'] = $row;
    header('Location: ../../index.php');
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
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body>
    <div class="container">
      <div class="box form-box">
        <header>Login</header>
        <form action="" method="post">

          <div class="field input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
          </div>

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
