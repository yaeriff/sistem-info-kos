<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
        <div class="text-center mb-4 fs-4 fw-bold">Buat Akun Baru</div>
        <form action="../process/register_process.php" method="post">

          <div class="field input">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" autocomplete="off" required>
          </div>

          <div class="field input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="off" required>
          </div>

          <div class="field input">
            <label for="telepon">No. Telepon</label>
            <input type="number" name="telepon" id="telepon" autocomplete="off" required>
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

