<?php
    session_start();

    // Ensure user is logged in
    if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
        echo "Unauthorized access!";
        exit();
    }

    // Ensure only admins can access it (if needed)
    if ($_SESSION['role'] !== 'admin') {
        echo "Access denied!";
        exit();
    }
function createNotification($conn, $title, $message, $type, $user_id = null) {
    $stmt = $conn->prepare("INSERT INTO notifications (user_id, title, message, type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $message, $type);
    $stmt->execute();
    $stmt->close();
}
?>
