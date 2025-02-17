<?php 
  // Session
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: ./login.php');
    exit();
  }


  $pageTitle = 'Dashboard';
  include './includes/member_header.php'; 
?>

  <div class="main dashboard-main">

    <div class="page-header">
      <h2 class="main-header">Dashboard Overview</h2>
      <h5>Get an overview of your account status, recent activities, and quick access to key features.</h5>
    </div>


    <!-- <div class="dashboard-container"> -->
    <div class="dashboard-grid">
      <div class="dashboard-card">
      <div class="dashboard-card-top">  
          <h3>Active Loans</h3>
           <i class="fa-regular fa-credit-card"></i>
      </div>
        <p>3 Active Loans</p>
      </div>
      <div class="dashboard-card">
        <div class="dashboard-card-top">  
           <h3>Outstanding Balance</h3>
            <i class="fa-solid fa-money-bills"></i>
        </div>
        <p>$7,500</p>
      </div>
      <div class="dashboard-card">
      <div class="dashboard-card-top">  
        <h3>Upcoming Due Date</h3>
        <i class="fa-regular fa-credit-card"></i>
      </div>
        <p>Feb 20, 2024</p>
      </div>
    </div>

    <div class="dashboard-summary">
      <div class="overview dashboard-account-summary">
        <h3>Account Summary</h3>

        <div class="grid-dashboard-summary">
          <p><strong>Member ID:</strong> <span>987654321</span></p>
          <p><strong>Email:</strong> <span?>jane.doe@example.com</span></p>
          <p><strong>Phone:</strong> <span?>+1 (555) 987-6543</span></p>
          <p><strong>Account Status:</strong> <span id="active-span">Active</span></p>
        </div>
      </div>

      <div class="overview recent-activities-account-summary">
        <h3>Recent Activities</h3>
        <p>Loan Payment of $1,000 made on Feb 1, 2024.</p>
        <p>New Loan Application submitted on Jan 25, 2024.</p>
        <p>Profile Updated on Jan 15, 2024.</p>
      </div>
    </div>

    <a href="#" class="dashboard-btn">Apply for a New Loan</a>
  <!-- </div> -->
  </div>

<?php include './includes/member_footer.php'; ?>
