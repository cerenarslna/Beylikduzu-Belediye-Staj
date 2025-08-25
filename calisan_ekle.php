<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adsoyad = $_POST['adsoyad'];
    $eposta = $_POST['eposta'];
    $telefon = $_POST['telefon'];
    $pozisyon = $_POST['pozisyon'];

    $sql = "INSERT INTO calisanlar (adsoyad, eposta, telefon, pozisyon) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $adsoyad, $eposta, $telefon, $pozisyon);
    $stmt->execute();

    header("Location: kullanicilar.php?ekleme=ok");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Yeni Çalışan Ekle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .content { margin-left: 250px; padding: 40px; }
  </style>
</head>
<body>

  <?php include 'sidebar.php'; ?>

  <div class="content">
    <h2>Yeni Çalışan Ekle</h2>
    <form method="post">
      <div class="mb-3">
        <label>Ad Soyad</label>
        <input type="text" name="adsoyad" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>E-posta</label>
        <input type="email" name="eposta" class="form-control">
      </div>
      <div class="mb-3">
        <label>Telefon</label>
        <input type="text" name="telefon" class="form-control">
      </div>
      <div class="mb-3">
        <label>Pozisyon</label>
        <input type="text" name="pozisyon" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Ekle</button>
    </form>
  </div>

</body>
</html>