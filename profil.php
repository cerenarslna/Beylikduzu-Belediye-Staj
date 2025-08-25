<?php
include "db.php";

// Süperadmin varsayılan ID = 1
$sql = "SELECT * FROM users WHERE id = 1";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profilim</title>
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
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <nav class="col-md-2 sidebar p-3">
      <h4 class="mb-4">Admin Panel</h4>
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
      </div>
      <a href="ayarlar.php">Ayarlar</a>
      <a href="cikis.php">Çıkış</a>
    </nav>

    <!-- İçerik -->
    <main class="col-md-10 px-4 py-4">
      <h2>Profilim</h2>
      <div class="card p-4">
        <form method="POST" action="profil_guncelle.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($user['username']) ?>" required />
          </div>

          <div class="mb-3">
            <label class="form-label">Rol</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['role']) ?>" readonly />
          </div>

          <div class="mb-3">
            <label class="form-label">Yeni Şifre <small class="text-muted">(Boş bırakılırsa değişmez)</small></label>
            <input type="password" class="form-control" name="password" />
          </div>

          <div class="mb-3">
            <label class="form-label">Profil Fotoğrafı</label><br>
            <?php if (!empty($user['profil_foto'])): ?>
              <img src="uploads/<?= htmlspecialchars($user['profil_foto']) ?>" class="profile-img mb-2" />
            <?php else: ?>
              <p><em>Henüz bir fotoğraf yüklenmemiş</em></p>
            <?php endif; ?>
            <input type="file" class="form-control" name="profil_foto" accept="image/*" />
          </div>

          <input type="hidden" name="id" value="<?= $user['id'] ?>" />
          <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
      </div>
    </main>
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