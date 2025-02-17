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
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role === "member") {
        // Check if username exists in the members table
        $check_sql = "SELECT id FROM members WHERE id = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            // Username does not exist, redirect back to add_users.php
            header("Location: add_users.php?error=invalid_member_id");
            exit();
        }
        $stmt->close();
    }

    // Insert into users table
    $insert_sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sss", $username, $password, $role);

    if ($stmt->execute()) {
        header("Location: manage_users.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
