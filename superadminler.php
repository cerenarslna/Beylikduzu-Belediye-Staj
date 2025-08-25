<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mesaj Gönder</title>
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
    .dropdown-toggle::after {
      float: right;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  
  <div class="container-fluid">
    <div class="row">
      
      <nav class="col-md-2 sidebar p-3">
        <h4 class="mb-4">Admin Panel</h4>
        <a href="index.php">Dashboard</a>
        <a href="javascript:void(0);" onclick="toggleSubMenu()">Kullanıcılar ▾</a>
        <div class="submenu" id="userSubMenu">
          <a href="adminler.php">Adminler</a>
          <a href="superadminler.php">Süperadminler</a>
          <a href="kullanicilar.php">Kullanıcılar</a>
        </div>
        <a href="gorev_durum.php">Görev Takibi</a>
        <a href="ayarlar.php">Ayarlar</a>
        <a href="cikis.php">Çıkış</a>
      </nav>

     
      <main class="col-md-10 px-4 py-4">
        

      
        <div class="card p-4 my-4">
          <h3>Mesaj Gönder</h3>
          <form action="send_message.php" method="POST">
            <div class="mb-3">
              <label for="receiver_id" class="form-label">Alıcı:</label>
              <select name="receiver_id" class="form-select" id="receiver_id">
                <option value="1">superadmin1</option>
                <option value="2">admin1</option>
                <option value="3">kullanici1</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Mesaj:</label>
              <textarea name="message" class="form-control" rows="3" placeholder="Mesaj yaz..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Gönder</button>
          </form>
        </div>

        
        <div class="card p-4">
          <h3>Gelen Mesajlar</h3>
          <?php include 'get_messages.php'; ?>
        </div>
      </main>
    </div>
  </div>

  <script>
    function toggleSubMenu() {
      var submenu = document.getElementById("userSubMenu");
      submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    }
  </script>
</body>
</html>