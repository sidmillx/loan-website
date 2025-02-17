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
// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the id from the URL

    // Database Connection
    require_once '../config/db.php';

    // SQL query to delete the member
    $sql = "DELETE FROM members WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Success message or log here if needed
        // Redirect to member management page after successful delete
        header('Location: ./member_management.php');
        exit;
    } else {
        // Error handling if delete fails
        echo "Error deleting record: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // If no ID is provided in the URL
    echo "No ID provided.";
}
?>
