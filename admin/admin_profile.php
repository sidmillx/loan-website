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
    $pageTitle = "Admin Profile";
    include './includes/admin_header.php';
?>

<div class="main p-3">
    <h2>Admin Profile</h2>
    <p>Update your profile information, change your password, and review your login history.</p>
    <!-- Insert profile details and forms to update information -->
</div>
<?php include './includes/admin_footer.php'; ?>
