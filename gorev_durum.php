<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Görev Durumu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    
    .content {
      margin-left: 250px; 
      padding: 40px 20px;
    }

    .table-container {
      overflow-x: auto;
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th {
      background-color: #007bff;
      color: white;
      white-space: nowrap;
    }

    td {
      white-space: nowrap;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

  <?php include 'sidebar.php'; ?>

  <div class="content">
    <h2>Görev Durumu</h2>

    <div class="table-container">
      <?php
      include 'db.php';
      $sql = "SELECT * FROM gorevler ORDER BY tarih DESC, saat DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Kişi</th>
              <th>Başlık</th>
              <th>Açıklama</th>
              <th>Tarih</th>
              <th>Saat</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['kisi_adi']) ?></td>
                <td><?= htmlspecialchars($row['baslik']) ?></td>
                <td><?= htmlspecialchars($row['aciklama']) ?></td>
                <td><?= htmlspecialchars($row['tarih']) ?></td>
                <td><?= htmlspecialchars($row['saat']) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else: ?>
        <div class="alert alert-warning text-center">Henüz görev eklenmemiş.</div>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>