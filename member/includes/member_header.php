<?php
// Start session and check if admin is logged in.
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
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

</head>
<body>
    <div class="wrapper">
      <aside id="sidebar">
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

          <li class="sidebar-item">
            <a href="./loan-application.php" class="sidebar-link" onclick="showContent('members')">
              <i class="fa-solid fa-file-pen"></i>
              <span>Loan Application</span>
            </a>
          </li>


          <li class="sidebar-item">
            <a href="./myloans.php" class="sidebar-link">
              <i class="fa-solid fa-money-bill"></i>
              <span>My loans</span>
            </a>
          </li>

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
          <!-- <li class="sidebar-item">
            <a href="" class="sidebar-link" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
              <i class="fa-solid fa-play-circle"></i>
              <span>Multilevel</span>
            </a>
          </li> -->
          
  
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
      
      </aside>

      <!-- <div class="main p-3">
        <div>
          <h1>Sidebar Bootstrap</h1>
        </div>
      </div>
    </div> -->

  
