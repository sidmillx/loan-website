<?php
header('Content-Type: application/json');

include('../../config/db.php');  // Adjust the path as needed

$sql = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

echo json_encode($notifications);  // ✅ Make sure you're sending JSON
?>
