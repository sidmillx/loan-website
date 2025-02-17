<?php 
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
        header("Location: login.php"); // Redirect to login if session is not set
        exit();
    }

    // Check if the user has admin privileges
    if ($_SESSION['role'] !== 'admin') {
        echo "Access Denied: You do not have permission to view this page.";
        exit();
    }
    $pageTitle = "Notifications";
    include './includes/admin_header.php';
    require_once '../config/db.php'; // Database connection

    // Ensure the user is logged in
    // if (!isset($_SESSION['member_id'])) {
    //     header("Location: login.php");
    //     exit();
    // }

    // $member_id = $_SESSION['member_id'];

    // Mark notification as read if requested
    if (isset($_POST['mark_read'])) {
        $notification_id = $_POST['id'];
        $update_sql = "UPDATE notifications SET is_read = '1' WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
        $stmt->close();
    }

    // Delete notification if requested
    if (isset($_POST['delete_notification'])) {
        $notification_id = $_POST['id'];
        $delete_sql = "DELETE FROM notifications WHERE id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
        $stmt->close();
    }

    // Fetch notifications
    $sql = "SELECT * FROM notifications ORDER BY is_read ASC, created_at DESC";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
?>
<div class="main p-3">
    <h2>Notifications</h2>
    <p>View system notifications and alerts, such as pending approvals, overdue repayments, and other important updates.</p>
  
    <div class="container notification-container">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="notification <?php echo ($row['is_read'] == '0') ? 'unread' : 'read'; ?>">
            <span><?php echo $row['message']; ?></span>
            
            <!-- Mark as Read Button -->
            <?php if ($row['is_read'] == '0'): ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="mark_read" class="mark-read-btn">Mark as Read</button>
                </form>
            <?php endif; ?>
            
            <!-- Delete Notification Button -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete_notification" class="delete-btn" onclick="return confirm('Are you sure you want to delete this notification?');">
                    <i class="fas fa-trash-alt"></i> <!-- FontAwesome Delete Icon -->
                </button>
            </form>
        </div>
    <?php endwhile; ?>
    </div>

</div>
<?php include './includes/admin_footer.php'; ?>
