<!-- login.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
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
              $_SESSION['user'] = $email;
              header("Location: ../../index.php"); // redirect ke homepage
              exit;
          } else {
              echo "<p style='color:red;'>Login gagal: " . $res['message'] . "</p>";
          }
      }
  }
  ?>
</body>
</html>
