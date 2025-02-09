<?php
// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the id from the URL

    // Database Connection
    include('../config/db.php');

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
