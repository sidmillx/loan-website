<?php
require '../../config/db.php';

$id = $_POST['id'];
$sql = "UPDATE notifications SET is_read = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(['success' => true]);
?>
