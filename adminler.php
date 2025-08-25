<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Adminler</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #FBC02D;
      color: white;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
    }
    .sidebar a:hover {
      background-color: #5E35B1;
      color: white;
    }
    .submenu {
      display: none;
      padding-left: 20px;
    }
    .submenu a {
      padding: 5px 15px;
      font-size: 0.95rem;
    }
    .card {
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .custom-badge {
      background-color: #5E35B1;
      color: white;
      padding: 0.5em 1em;
      border-radius: 0.5rem;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      
      <nav class="col-md-2 d-none d-md-block sidebar p-3">
        <h4 class="mb-4" style="color:white;">Admin Panel</h4>
        <a href="index.php">Dashboard</a>
        <a href="profil.php">Profil</a>
        <a href="javascript:void(0);" onclick="toggleSubMenu('gorevSubMenu')">Görev ▾</a>
        <div class="submenu" id="gorevSubMenu">
          <a href="gorev_ekle.php">Görev Ekle</a>
          <a href="gorev_durum.php">Görev Takibi</a>
          <a href="takvim.php">Takvim</a>
        </div>
        <a href="javascript:void(0);" onclick="toggleSubMenu('kullaniciSubMenu')">Kullanıcılar ▾</a>
        <div class="submenu" id="kullaniciSubMenu">
          <a href="calisan_ekle.php">Çalışan Ekle</a>
          <a href="kullanicilar.php">Kullanıcılar</a>
          <a href="adminler.php">Adminler</a>
          <a href="superadminler.php">Süperadminler</a>
        </div>
        <a href="ayarlar.php">Ayarlar</a>
        <a href="cikis.php">Çıkış</a>
      </nav>

      
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 py-4">
        <div class="d-flex justify-content-between flex-wrap align-items-center mb-3">
          <h2 class="h4">Adminler Sayfası</h2>
          <span class="badge custom-badge">Hoş geldin, Admin</span>
        </div>
        <div class="card p-4">
          <p>Burada admin bilgileri yer alacak.</p>
        </div>
      </main>
    </div>
  </div>

  <script>
    function toggleSubMenu(id) {
      var menu = document.getElementById(id);
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }
  </script>
</body>
</html>