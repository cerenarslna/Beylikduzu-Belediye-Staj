<?php
include 'db.php';
$sql = "SELECT * FROM calisanlar ORDER BY kayit_tarihi DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Çalışanlar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .content { margin-left: 250px; padding: 40px; }
  </style>
</head>
<body>

  <?php include 'sidebar.php'; ?>

  <div class="content">
    <h2>Çalışanlar</h2>
    <a href="calisan_ekle.php" class="btn btn-success mb-3">+ Yeni Çalışan</a>

    <table class="table table-bordered table-hover">
      <thead>
      <th>İşlemler</th>
        <tr>
          <th>#</th>
          <th>Ad Soyad</th>
          <th>E-posta</th>
          <th>Telefon</th>
          <th>Pozisyon</th>
          <th>Kayıt Tarihi</th>
        </tr>
      </thead>
      <tbody>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['adsoyad']) ?></td>
      <td><?= htmlspecialchars($row['eposta']) ?></td>
      <td><?= htmlspecialchars($row['telefon']) ?></td>
      <td><?= htmlspecialchars($row['pozisyon']) ?></td>
      <td><?= $row['kayit_tarihi'] ?></td>
      <td>
        <a href="calisan_duzenle.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Güncelle</a>
        <a href="calisan_sil.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bu çalışan silinsin mi?')">Sil</a>
      </td>
    </tr>
  <?php endwhile; ?>
</tbody>
    </table>
  </div>

</body>
</html>