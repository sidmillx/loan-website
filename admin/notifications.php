<?php 
    $pageTitle = "Notifications";
    include './includes/admin_header.php';
?>
<div class="main p-3">
    <h2>Notifications</h2>
    <p>View system notifications and alerts, such as pending approvals, overdue repayments, and other important updates.</p>
    <!-- Insert a list or table for notifications -->

    <div id="notificationIcon" onclick="toggleNotifications()">
    🔔 <span id="notificationCount">0</span>
    </div>
    <div id="notificationPanel" style="display:none;">
        <ul id="notificationList"></ul>
    </div>

</div>
<?php include './includes/admin_footer.php'; ?>

