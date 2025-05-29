<!-- login.php -->
<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
      body {
        background: linear-gradient(135deg,rgb(25, 25, 27),rgb(129, 131, 138));
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .card {
        width: 100%;
        max-width: 400px;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        background-color: #fff;
      }
      .form-label {
        font-weight: 600;
      }
      .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
      }
      .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
      }
    </style>
    
  </head>
  <body>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
      </form>
  </body>
</html>


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
              $_SESSION['nama'] = $res['data']['nama'];
              
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
