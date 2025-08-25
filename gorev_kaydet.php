<?php
include 'db.php'; 

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $kisi     = $_POST['kisi_adi'] ?? '';
    $baslik   = $_POST['baslik'] ?? '';
    $aciklama = $_POST['aciklama'] ?? '';
    $tarih    = $_POST['tarih'] ?? '';
    $saat     = $_POST['saat'] ?? '';

    if ($kisi && $baslik && $tarih && $saat) {
       
        $stmt = $conn->prepare("INSERT INTO gorevler (kisi_adi, baslik, aciklama, tarih, saat) VALUES (?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("sssss", $kisi, $baslik, $aciklama, $tarih, $saat);
            if ($stmt->execute()) {
                header("Location: takvim.php"); // başarılıysa yönlendir
                exit;
            } else {
                echo "Veri eklenemedi: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorgu hazırlanamadı: " . $conn->error;
        }
    } else {
        echo "Lütfen tüm zorunlu alanları doldurun.";
    }
} else {
    echo "Form gönderilmedi.";
}
?>