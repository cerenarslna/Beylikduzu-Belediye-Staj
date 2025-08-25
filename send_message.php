<?php
include 'db.php'; 

$sender_id = 1; 
$receiver_id = $_POST['receiver_id'];
$message = $_POST['message'];

if (!empty($message)) {
  $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
  $stmt->execute();

  echo "✅ Mesaj gönderildi.";
} else {
  echo "⚠️ Boş mesaj gönderilemez.";
}
?>