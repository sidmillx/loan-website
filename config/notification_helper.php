<?php
function createNotification($conn, $title, $message, $type, $user_id = null) {
    $stmt = $conn->prepare("INSERT INTO notifications (user_id, title, message, type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $message, $type);
    $stmt->execute();
    $stmt->close();
}
?>
