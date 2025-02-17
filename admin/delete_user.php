<?php
include '../config/db.php';

$message = "";
$message_type = "";
$username = ""; // Default empty username
$id = isset($_GET['id']) ? $_GET['id'] : ''; // Do not force it to be an integer

if (!empty($id)) { // Only process if a valid ID is provided
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Proceed with deletion
        $sql_delete = "DELETE FROM users WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("s", $id); // Changed to 's' to handle non-integer ID

        if ($stmt_delete->execute()) {
            $message = "User deleted successfully!";
            $message_type = "success";
        } else {
            $message = "Error deleting user: " . $stmt_delete->error;
            $message_type = "danger";
        }

        $stmt_delete->close();
        // After deletion, redirect to manage users page
        header("Location: manage_users.php");
        exit(); // Make sure to stop further execution
    } else {
        // Fetch user details for confirmation message
        $sql_check = "SELECT username FROM users WHERE id = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $id); // Changed to 's' to handle non-integer ID
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $stmt_check->bind_result($username);
            $stmt_check->fetch();
        } else {
            $message = "Error: User not found.";
            $message_type = "danger";
        }

        $stmt_check->close();
    }
} else {
    $message = "Invalid request. No user ID provided.";
    $message_type = "danger";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-danger text-white text-center">
                    <h4>Delete User</h4>
                </div>
                <div class="card-body text-center">
                    <?php if (!empty($message)) : ?>
                        <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
                            <?php echo $message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (!empty($username)) : ?>
                        <p>Are you sure you want to delete user <strong><?php echo htmlspecialchars($username); ?></strong>?</p>
                        <a href="delete_user.php?id=<?php echo $id; ?>&confirm=yes" class="btn btn-danger">Yes, Delete</a>
                        <a href="./manage_users.php" class="btn btn-secondary">Cancel</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
