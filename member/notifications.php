<?php 
  $pageTitle = 'Notifications';
  include './includes/member_header.php'; 
?>

  <div class="main">
    <div class="notifications-container">
        <div class="page-header">
          <h2 class="main-header">Notifications</h2>
          <h5>Stay updated with real-time alerts on loan approvals, payment due dates, and important account activities.</h5>
        </div>

        <div class="notification unread">
          <h4>Pending Loan Approval</h4>
          <p>Your loan application for $4,000 is under review. You'll be notified once approved.</p>
          <p class="timestamp">Received: Feb 7, 2024 - 10:30 AM</p>
        </div>

        <div class="notification">
          <h4>Overdue Repayment Reminder</h4>
          <p>Your loan repayment of $500 was due on Jan 31, 2024. Please settle the amount to avoid penalties.</p>
          <p class="timestamp">Received: Feb 1, 2024 - 9:00 AM</p>
        </div>

        <div class="notification">
          <h4>Document Verification Successful</h4>
          <p>Your submitted documents for membership verification have been successfully verified.</p>
          <p class="timestamp">Received: Jan 20, 2024 - 2:15 PM</p>
        </div>

        <div class="notification">
          <h4>System Update Notification</h4>
          <p>Our loan management system will undergo maintenance on Feb 10, 2024, from 12:00 AM to 4:00 AM.</p>
          <p class="timestamp">Received: Jan 25, 2024 - 11:00 AM</p>
        </div>

       </div>
  </div>
  <?php include './includes/member_footer.php'; ?>

