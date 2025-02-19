<?php 
 session_start(); 
 if (!isset($_SESSION['username'])) {
     header('Location: login.php');
     exit(); 
 }
  $pageTitle = 'Settings';
  include './includes/member_header.php'; 
?>
<?php
  // session_start();
  include('../config/db.php'); // Include your database connection file

  // Assuming the logged-in member's ID is stored in session
  // if (!isset($_SESSION['username'])) {
  //     die("Unauthorized access.");
  // }
  $member_id = $_SESSION['username'];

  // Fetch member details from the database
  $sql = "SELECT full_name, dob, gender, contact_details, residential_address, status FROM members WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $member_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $member = $result->fetch_assoc();
  } else {
      die("Member not found.");
  }
  $stmt->close();
  $conn->close();
?>

<body>
  <div class="container-settings main">
<button class="open-btn" onclick="toggleSidebar()">&#9776;</button>


    
    <div class="page-header">
      <h2 class="main-header">Account Settings</h2>
      <h5>Manage your account preferences, security settings, and notification options.</h5>
</div>

    <div class="form-container-settings container-settings-form">
    <form action="#" method="POST">
    <div class="profile-header">
        <img src="../assets/avatar.png" alt="Profile Picture">
        <div>
            <h2><?php echo htmlspecialchars($member['full_name']); ?></h2>
            <p>Member ID: <?php echo htmlspecialchars($member_id); ?></p>
        </div>
    </div>

    <div class="settings-section-member">
        <h3>Basic Information</h3>
        <div class="info-grid">
            <div class="info-item">
                <label>Full Name</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($member['full_name']); ?>" readonly>
            </div>
            <div class="info-item">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?php echo htmlspecialchars($member['dob']); ?>" readonly>
            </div>
            <div class="info-item">
                <label>Gender</label>
                <input type="text" name="gender" value="<?php echo htmlspecialchars($member['gender']); ?>" readonly>
            </div>
        </div>
    </div>

    <div class="settings-section-member">
        <h3>Contact Information</h3>
        <div class="info-grid">
            <div class="info-item">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($member['contact_details']); ?>" readonly>
            </div>
            <div class="info-item fix-address">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($member['residential_address']); ?>" readonly>
            </div>
        </div>
    </div>

    <div class="settings-section-member">
        <h3>Account Status</h3>
        <div class="info-grid">
            <div class="info-item">
                <label>Membership Status</label>
                <input type="text" name="membership_status" value="<?php echo htmlspecialchars($member['status']); ?>" readonly>
            </div>
        </div>
        <a href="./change_password.php" class="btn btn-primary" style="margin-top: 20px;">Change Password</a>
    </div>
</form>
    </div>
  </div>

  <?php include './includes/member_footer.php'; ?>
