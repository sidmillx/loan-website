<?php
// Start session and check if admin is logged in.
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// $is_verified = $_SESSION['role'] === 'member';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Client Page'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./member.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- LOAN APPLICATION -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript" src="./app.js" defer></script>

</head>
<body>
    <!-- <div class="wrapper"> -->
      <!-- <aside id="sidebar">
        <div class="d-flex">
          <button id="toggle-btn" type="button">
            <img src="../assets/grid-icon.png" alt="grid-icon">
          </button>

          <div class="sidebar-logo">
            <a href="#">Vulindlela</a>
          </div>
        </div>

        <ul class="sidebar-nav">

            <li class="sidebar-item">
                <a href="./dashboard.php" class="sidebar-link">
                <i class="fa-solid fa-home"></i>
                <span>Dashboard</span>
            </a>
          </li>

          <//?php if ($is_verified): ?>
          <li class="sidebar-item">
            <a href="./loan-application.php" class="sidebar-link" onclick="showContent('members')">
              <i class="fa-solid fa-file-pen"></i>
              <span>Loan Application</span>
            </a>
          </li>
          <//?php endif; ?>

          <//?php if ($is_verified): ?>
          <li class="sidebar-item">
            <a href="./myloans.php" class="sidebar-link">
              <i class="fa-solid fa-money-bill"></i>
              <span>My loans</span>
            </a>
          </li>
          <//?php endif; ?>


          <li class="sidebar-item">
            <a href="./loan-products.php" class="sidebar-link">
              <i class="fa-solid fa-money-bill"></i>
              <span>Loan Products</span>
            </a>
          </li>



          <li class="sidebar-item">
            <a href="./notifications.php" class="sidebar-link">
              <i class="fa-solid fa-bell"></i>
              <span>Notifications</span>
            </a>
          </li>



          <li class="sidebar-item">
            <a href="./profile.php" class="sidebar-link">
              <i class="fa-solid fa-user"></i>
              <span>Profile</span>
            </a>
          </li>

  
          <li class="sidebar-item">
            <a class="sidebar-link" href="./settings.php">
              <i class="fa-solid fa-cog"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>
        
        <div class="sidebar-footer">
          <div class="sidebar-link">
            <a href="./logout.php">
                <i class="fa-solid fa-sign-out-alt"></i>
            </a>
            <span>Logout</span>
          </div>
        </div>
      
      </aside> -->

      
    <nav id="sidebar">
        <ul>
            <li>
                <span class="logo">Vulindlela</span>
                <button onclick="toggleSidebar()" id="toggle-btn">
                    <!-- Add icon -->
                  <!-- <img src="../assets/grid-icon.png" alt="grid-icon" style="width: 35px; height: auto;"> -->
                  <i class="fa-solid fa-bars fa-lg"></i>
                </button>
            </li>
            <li class="active">
                <a href="./dashboard.php">
                    <i class="fa-solid fa-home fa-lg" data-bs-toggle="tooltip" title="Dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            
            <li>
              <button onclick="toggleSubMenu(this)" class="dropdown-btn" >
                <i class="fa-solid fa-file-pen fa-lg"  data-bs-toggle="tooltip" title="Apply For A Loan"></i>
                <span>Apply for Loan</span>
                <i class="fa-solid fa-angle-down fa-lg"></i>
              </button>
              <ul class="sub-menu">
                <div>
                  <li><a href="./short-term-loan.php">Short Term Loan</a></li>
                  <li><a href="./emergency-loan.php">Emergency Loan</a></li>
                  <li><a href="./long-term-loan.php">Long Term Loan</a></li>
                </div>
                
              </ul>
            </li>
<!-- 
            <li>
                <a href="./myloans.php">
                    <i class="fa-solid fa-money-bill fa-lg" data-bs-toggle="tooltip" title="My Loans"></i>
                    <span>My Loans</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="./loan-products.php">
                    <i class="fa-solid fa-clipboard-list fa-xl" data-bs-toggle="tooltip" title="Loan Products"></i>
                    <span>Loan Products</span>
                </a>
            </li> -->

            <li>
                <a href="./notifications.php">
                  <i class="fa-solid fa-bell fa-lg" data-bs-toggle="tooltip" title="Notifications"></i>
                  <span>Notifications</span>
                </a>
            </li>


            <li>
                <a href="./profile.php">
                  <i class="fa-solid fa-user fa-lg" data-bs-toggle="tooltip" title="Profile"></i>
                  <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="./settings.php">
                    <i class="fa-solid fa-cog fa-lg" data-bs-toggle="tooltip" title="Settings"></i>
                    <span>Settings</span>
                </a>
            </li>

        </ul>
        <li>
                <a href="./logout.php">
                  <i class="fa-solid fa-sign-out fa-lg" data-bs-toggle="tooltip" title="Profile"></i>
                  <span>Logout</span>
                </a>
            </li>
        <!-- simple icons.io  -->
    </nav>

      <!-- <div class="main p-3">
        <div>
          <h1>Sidebar Bootstrap</h1>
        </div>
      </div>
    </div> -->

  
