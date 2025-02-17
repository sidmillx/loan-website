<?php 
    $pageTitle = "Settings";
    include './includes/admin_header.php';
?>

<div class="main p-3">
    <h2>Settings &amp; Administration</h2>
    <p>Manage system-wide settings, user roles, security configurations, and other administrative preferences.</p>
    <!-- Insert forms or options for changing system settings -->
    <div class="settings-container">
        <div class="settings-title">Admin Settings</div>

        <?php
            include('../config/db.php'); // Include your database connection file

            // Assuming the logged-in admin's username is stored in session
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username']; // Get the logged-in admin's username from session

                // Fetch admin details from the users table
                $sql = "SELECT id, username, password, role FROM users WHERE username = ? AND role = 'admin'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);  // Using 's' because username is a string
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                } else {
                    die("Admin not found or unauthorized access.");
                }
                $stmt->close();
            }

            // Handle password change
            if (isset($_POST['change_password'])) {
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                // Verify the current password
                if ($current_password !== $user['password']) {
                    $error = "The current password is incorrect.";
                } elseif ($new_password !== $confirm_password) {
                    $error = "The new password and confirmation do not match.";
                } else {
                    // Update password in the database (no hashing here)
                    $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                    $stmt = $conn->prepare($update_sql);
                    $stmt->bind_param("si", $new_password, $user['id']);
                    if ($stmt->execute()) {
                        $success = "Password updated successfully.";
                    } else {
                        $error = "Failed to update the password.";
                    }
                    $stmt->close();
                }
            }
        ?>

        <form action="#" method="POST">
            <div class="form-group">
                <label for="adminUsername">Admin Username</label>
                <input type="text" id="adminUsername" name="adminUsername" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
            </div>

            <!-- Current password and new password fields -->
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" id="currentPassword" name="current_password" placeholder="Enter your current password" required>
            </div>

            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="new_password" placeholder="Enter a new password" required>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm your new password" required>
            </div>

            <!-- Display error or success messages -->
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="success-message"><?php echo $success; ?></div>
            <?php endif; ?>

            <!-- Other settings -->
            <div class="form-group">
                <label for="themePreference">Theme Preference</label>
                <select id="themePreference" name="themePreference">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="notifications"> Enable Email Notifications
                </label>
            </div>

            <button type="submit" name="change_password" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>

<?php include './includes/admin_footer.php'; ?>
