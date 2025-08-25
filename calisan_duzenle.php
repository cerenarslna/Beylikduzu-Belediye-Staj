<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: kullanicilar.php");
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adsoyad = $_POST['adsoyad'];
    $eposta = $_POST['eposta'];
    $telefon = $_POST['telefon'];
    $pozisyon = $_POST['pozisyon'];

    $sql = "UPDATE calisanlar SET adsoyad=?, eposta=?, telefon=?, pozisyon=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $adsoyad, $eposta, $telefon, $pozisyon, $id);
    $stmt->execute();

    header("Location: kullanicilar.php?guncelle=ok");
    exit;
}

$sql = "SELECT * FROM calisanlar WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$calisan = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Çalışanı Güncelle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .content { margin-left: 250px; padding: 40px; }
  </style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content">
  <h2>Çalışanı Güncelle</h2>
  <form method="post">
    <div class="mb-3">
      <label>Ad Soyad</label>
      <input type="text" name="adsoyad" class="form-control" value="<?= htmlspecialchars($calisan['adsoyad']) ?>" required>
    </div>
    <div class="mb-3">
      <label>E-posta</label>
      <input type="email" name="eposta" class="form-control" value="<?= htmlspecialchars($calisan['eposta']) ?>">
    </div>
    <div class="mb-3">
      <label>Telefon</label>
      <input type="text" name="telefon" class="form-control" value="<?= htmlspecialchars($calisan['telefon']) ?>">
    </div>
    <div class="mb-3">
      <label>Pozisyon</label>
      <input type="text" name="pozisyon" class="form-control" value="<?= htmlspecialchars($calisan['pozisyon']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
  </form>
</div>
</body>
</html>