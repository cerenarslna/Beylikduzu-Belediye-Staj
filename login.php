<?php
session_start();
include "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $sifre = $_POST['sifre'];

  $sql = "SELECT * FROM kullanicilar WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($sifre, $user['sifre'])) {
    $_SESSION['user_id'] = $user['id'];
    header("Location: profil.php");
    exit;
  } else {
    $hata = "E-posta veya şifre hatalı!";
  }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-light">
  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 400px;">
      <h3 class="mb-4 text-center">Giriş Yap</h3>
      <?php if (isset($hata)): ?>
        <div class="alert alert-danger"><?= $hata ?></div>
      <?php endif; ?>
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">E-posta</label>
          <input type="email" class="form-control" name="email" required />
        </div>
        <div class="mb-3">
          <label class="form-label">Şifre</label>
          <input type="password" class="form-control" name="sifre" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
      </form>
    </div>
  </div>
</body>
</html>