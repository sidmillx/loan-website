<?php 
    include('../config/db.php');
    function getUnreadNotificationsCount($conn) {
        // Query to get the count of unread notifications for the admin (or specific user)
        $query = "SELECT COUNT(*) AS unread_count FROM notifications WHERE is_read = '0'";
        
        // Prepare the statement
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        // Return the unread notification count
        return $row['unread_count'];
    }
?>