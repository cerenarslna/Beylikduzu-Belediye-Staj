<?php
include 'db.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT id, baslik, tarih, saat FROM gorevler";
$result = $conn->query($sql);

$etkinlikler = [];

while ($row = $result->fetch_assoc()) {
    $etkinlikler[] = [
        'id'    => $row['id'],
        'title' => $row['baslik'],
        'start' => $row['tarih'] . 'T' . $row['saat']  
    ];
}

header('Content-Type: application/json');
echo json_encode($etkinlikler);
?>