<?php
require '../../config/db.php';

// $member_id = $_SESSION['member_id'];  // Ensure the member is logged in

$sql = "SELECT * FROM notifications WHERE role = 'member' AND user_id = ? AND is_read = 0 ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $member_id);
$stmt->execute();
$result = $stmt->get_result();

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

echo json_encode($notifications);
?>
