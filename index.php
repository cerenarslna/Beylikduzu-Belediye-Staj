<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
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
      padding: 6px 15px;
    }

    .content {
      margin-left: 220px;
      padding: 30px;
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
  </style>
</head>
<body>
<?php include "sidebar.php"; ?>
  <div class="container-fluid">
    <div class="row">
      
      <nav class="col-md-2 sidebar d-md-block p-3">
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

      
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 py-4 content">
        <div class="d-flex justify-content-between flex-wrap align-items-center mb-3">
          <h2 class="h4">Dashboard</h2>
         
        </div>

        
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card p-3">
              <h5>Toplam Kullanıcı</h5>
              <p class="display-6">100</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3">
              <h5>Bugünkü Giriş</h5>
              <p class="display-6">87</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3">
              <h5>Yeni Mesajlar</h5>
              <p class="display-6">12</p>
            </div>
          </div>
        </div>

        
        <div class="card p-4 mb-5">
          <h5 class="text-center">Kullanıcı Dağılımı</h5>
          <div class="d-flex justify-content-center" style="height: 300px;">
            <canvas id="donutChart" width="200" height="200"></canvas>
          </div>
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

  <script>
    const ctx = document.getElementById('donutChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Aktif', 'Pasif', 'Yeni Kayıt'],
        datasets: [{
          data: [55, 30, 15],
          backgroundColor: ['#198754', '#6c757d', '#0d6efd'],
          hoverOffset: 10
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom'
          },
          tooltip: {
            callbacks: {
              label: function (context) {
                return context.label + ': ' + context.raw + ' kişi';
              }
            }
          }
        }
      }
    });
  </script>
</body>
</html>