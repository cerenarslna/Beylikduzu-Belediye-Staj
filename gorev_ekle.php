<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Görev Ekle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
    }
    .content {
      margin-left: 220px; 
      padding: 30px;
    }
    .card {
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <?php include 'sidebar.php'; ?>

  <div class="content">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h4>Görev Ekle</h4>
      </div>
      <div class="card-body">
        <form action="gorev_kaydet.php" method="POST">
          <div class="mb-3">
            <label for="kisi_adi" class="form-label">Kime Atandı?</label>
            <input type="text" name="kisi_adi" id="kisi_adi" class="form-control" required />
          </div>

          <div class="mb-3">
            <label for="baslik" class="form-label">Görev Başlığı</label>
            <input type="text" name="baslik" id="baslik" class="form-control" required />
          </div>

          <div class="mb-3">
            <label for="aciklama" class="form-label">Görev Detayı</label>
            <textarea name="aciklama" id="aciklama" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label for="tarih" class="form-label">Tarih</label>
            <input type="date" name="tarih" id="tarih" class="form-control" required />
          </div>

          <div class="mb-3">
            <label for="saat" class="form-label">Saat</label>
            <input type="time" name="saat" id="saat" class="form-control" required />
          </div>

          <button type="submit" class="btn btn-success">Görevi Kaydet</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function toggleSubMenu(id) {
      var menu = document.getElementById(id);
      menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }
  </script>

</body>
</html>