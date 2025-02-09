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

            <form>
                <div class="form-group">
                    <label for="adminName">Admin Name</label>
                    <input type="text" id="adminName" name="adminName" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="adminEmail">Email Address</label>
                    <input type="email" id="adminEmail" name="adminEmail" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="adminPassword">Password</label>
                    <input type="password" id="adminPassword" name="adminPassword" placeholder="Enter a new password">
                </div>

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

                <button type="submit" class="btn">Save Changes</button>
            </form>
        </div>
    </div>
</div>
<?php include './includes/admin_footer.php'; ?>

