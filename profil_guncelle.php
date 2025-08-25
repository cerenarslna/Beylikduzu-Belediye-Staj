<?php
include "db.php";

// Formdan gelen veriler
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$profilFoto = $_FILES['profil_foto'];

// Şifre güncellemesi
$updateQuery = "UPDATE users SET username = ?";

// Şifre varsa hashle ve ekle
$params = [$username];

if (!empty($password)) {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $updateQuery .= ", password = ?";
  $params[] = $hashedPassword;
}

// Profil fotoğrafı yükleme
if ($profilFoto && $profilFoto['error'] == 0) {
  $dosyaAdi = uniqid() . "_" . basename($profilFoto["name"]);
  $hedefKlasor = "uploads/";
  $hedefYol = $hedefKlasor . $dosyaAdi;

  // Yükleme klasörü yoksa oluştur
  if (!is_dir($hedefKlasor)) {
    mkdir($hedefKlasor, 0777, true);
  }

  move_uploaded_file($profilFoto["tmp_name"], $hedefYol);

  $updateQuery .= ", profil_foto = ?";
  $params[] = $dosyaAdi;
}

$updateQuery .= " WHERE id = ?";
$params[] = $id;

// Hazırlıklı sorgu
$stmt = mysqli_prepare($conn, $updateQuery);

$types = str_repeat("s", count($params) - 1) . "i"; // tüm stringler + son id int
mysqli_stmt_bind_param($stmt, $types, ...$params);
mysqli_stmt_execute($stmt);

header("Location: profil.php?guncelleme=ok");
exit;
?>