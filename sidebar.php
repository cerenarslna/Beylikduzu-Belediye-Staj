<?php
session_start();
include "db.php";

// Kullanıcı bilgisi
$userId = $_SESSION['user_id'] ?? 1;
$query = mysqli_query($conn, "SELECT profil_foto FROM users WHERE id = $userId");
$user = mysqli_fetch_assoc($query);
$foto = !empty($user['profil_foto']) ? $user['profil_foto'] : 'default.png';
?>

<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
  }

  .sidebar {
    height: 100vh;
    background-color: #FBC02D;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    width: 220px;
    padding: 20px 10px;
    overflow-y: auto;
  }

  .sidebar a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
    border-radius: 5px;
  }

  .sidebar a:hover {
    background-color: #5E35B1;
    color: white;
  }

  .submenu {
    display: none;
    padding-left: 15px;
  }

  .submenu a {
    font-size: 0.95rem;
    padding: 8px 15px;
  }

  @media (max-width: 768px) {
    .sidebar {
      position: relative;
      width: 100%;
      height: auto;
    }
    .content {
      margin-left: 0;
    }
  }

  .profile-icon {
    position: fixed;
    top: 15px;
    right: 20px;
    z-index: 999;
  }

  .profile-icon img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
    box-shadow: 0 0 4px rgba(0,0,0,0.2);
    cursor: pointer;
  }
</style>

<!-- Sağ üst köşe profil ikonu -->
<div class="profile-icon">
  <a href="profil.php" title="Profilim">
    <img src="uploads/<?= htmlspecialchars($foto) ?>" alt="Profil Fotoğrafı" />
  </a>
</div>

<!-- Sidebar -->
<div class="sidebar">
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
    <a href="adminler.php">Adminler</a>
    <a href="superadminler.php">Süperadminler</a>
  </div>

  <a href="ayarlar.php">Ayarlar</a>
  <a href="cikis.php">Çıkış</a>
</div>

<script>
  function toggleSubMenu(id) {
    var menu = document.getElementById(id);
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  }
</script>