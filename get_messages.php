<?php
include 'db.php';

$receiver_id = 1;

$sql = "SELECT m.*, u.username AS sender_name
        FROM messages m
        JOIN users u ON m.sender_id = u.id
        WHERE m.receiver_id = ?
        ORDER BY m.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $receiver_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
  echo "<div style='border:1px solid #ccc; padding:8px; margin:4px 0'>
    <strong>{$row['sender_name']}:</strong> {$row['message']}<br>
    <small>{$row['created_at']}</small>
  </div>";
}
?>