<?php
function createNotification($conn, $title, $message, $type, $user_id = null) {
    $stmt = $conn->prepare("INSERT INTO notifications (user_id, title, message, type, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("issss", $user_id, $title, $message, $type, $role);
    $stmt->execute();
    $stmt->close();
}
?>

<!-- USER ID REMOVED, ADD IT FOR SPECIFIC ADMINISTRATOR -->