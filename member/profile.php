<?php 
  $pageTitle = 'Profile';
  include './includes/member_header.php'; 
?>

<body>
  <div class="container-settings main">
    <div class="page-header">
      <h2 class="main-header">Profile</h2>
      <h5>Update your personal information, contact details, and account status.</h5>
    </div>


    <div class="form-container-settings container-settings-form">
    <form action="#" method="POST">
            <div class="profile-header">
                <img src="../assets/avatar.png" alt="Profile Picture">
                <div>
                    <h2>John Doe</h2>
                    <p>Member ID: 123456789</p>
                </div>
            </div>

            <div class="settings-section-member">
                <h3>Basic Information</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Full Name</label>
                        <input type="text" name="full_name" value="John Doe" readonly>
                    </div>
                    <div class="info-item">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="1990-01-01" readonly>
                    </div>
                    <div class="info-item">
                        <label>Gender</label>
                        <input type="text" name="gender" value="Male" readonly>
                    </div>
                </div>
            </div>

            <div class="settings-section-member">
                <h3>Contact Information</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Email</label>
                        <input type="email" name="email" value="john.doe@example.com">
                    </div>
                    <div class="info-item">
                        <label>Phone</label>
                        <input type="text" name="phone" value="+1 (555) 123-4567">
                    </div>
                    <div class="info-item fix-address">
                        <label>Address</label>
                        <input type="text" name="address" value="123 Main Street, Anytown, USA" readonly>
                    </div>
                </div>
            </div>

            <div class="settings-section-member">
                <h3>Account Status</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Membership Status</label>
                        <input type="text" name="membership_status" value="Active" readonly>
                    </div>
                    <div class="info-item">
                        <label>Loan Eligibility</label>
                        <input type="text" name="loan_eligibility" value="Eligible" readonly>
                    </div>
                    <div class="info-item fix-address">
                        <label>KYC Verification</label>
                        <input type="text" name="kyc_verification" value="Verified" readonly>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn">Update</button>
        </form>
    </div>
  </div>

  <?php include './includes/member_footer.php'; ?>
