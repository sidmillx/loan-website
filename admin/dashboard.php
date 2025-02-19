<?php 
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
        header("Location: login.php"); // Redirect to login if session is not set
        exit();
    }

    // Check if the user has admin privileges
    if ($_SESSION['role'] !== 'admin') {
        header("Location: access_denied.php");
        exit();
    }

    $pageTitle = "Dashboard";
    include './includes/admin_header.php';
    require_once '../config/db.php';

    $totalMembers = $conn->query("SELECT COUNT(*) AS count FROM members")->fetch_assoc()['count'];
    $pendingApplications = $conn->query("SELECT COUNT(*) AS count FROM membership_applications WHERE status = 'Pending'")->fetch_assoc()['count'];
    // $approvedLoans = $conn->query("SELECT COUNT(*) AS count FROM loans WHERE status = 'Approved'")->fetch_assoc()['count'];
    $pendingLoans = $conn->query("SELECT COUNT(*) AS count FROM loans")->fetch_assoc()['count'];
    // $totalLoanAmount = $conn->query("SELECT SUM(amount) AS total FROM loans WHERE status = 'Approved'")->fetch_assoc()['total'];
    // $totalDocuments = $conn->query("SELECT COUNT(*) AS count FROM documents")->fetch_assoc()['count'];
    ?>
<div class="main p-3">

    <h2>Overview</h2>
    <p>Welcome to the Admin Dashboard. Here you can see key performance indicators (KPIs) such as total members, loan applications, pending approvals, etc.</p>
    <!-- Add KPI cards, charts, and summaries as needed -->

    <!-- <div class="dashboard container mt-4"> -->
        
        <div class="container mt-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="kpi-card">
                        <i class="fa-solid fa-users"></i>
                        <div>
                            <div class="kpi-label">Total Members</div>
                            <div class="kpi-value"><?= $totalMembers; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="kpi-card">
                        <i class="fa-solid fa-user-plus"></i>
                        <div>
                            <div class="kpi-label">Pending Member Applications</div>
                            <div class="kpi-value"><?= $pendingApplications; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="kpi-card">
                        <i class="fa-solid fa-clock"></i>
                        <div>
                            <div class="kpi-label">Total Loan Applications</div>
                            <div class="kpi-value"><?= $pendingLoans; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- </div> -->

    <!-- <div class="charts"> -->
        <!-- <canvas id="loanApplicationsChart"></canvas> -->
        <!-- <canvas id="loanStatusChart"></canvas>
        <canvas id="membershipGrowthChart"></canvas> -->
    <!-- </div> -->

    
    <?php
    // Fetch Loan Data
    $loanQuery = "SELECT loan_type, COUNT(*) as count FROM loans GROUP BY loan_type";
    $loanResult = mysqli_query($conn, $loanQuery);
    
    $loanTypes = [];
    $loanCounts = [];
    while ($row = mysqli_fetch_assoc($loanResult)) {
        $loanTypes[] = $row['loan_type'];
        $loanCounts[] = $row['count'];
    }
    ?>
    
    <!-- <script>
        var ctx = document.getElementById('loanChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <//?php echo json_encode($loanTypes); ?>,
                datasets: [{
                    label: 'Loan Applications',
                    data: <//?php echo json_encode($loanCounts); ?>,
                    backgroundColor: ['blue', 'red', 'green'],
                }]
            }
        });
    </script> -->
    



    
    <!-- Real-Time Alerts -->
    <div id="alerts" class="container mt-4" style="margin-bottom: 100px">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fa-solid fa-bell"></i> Notifications</h4>
            <a href="notifications.php" class="btn btn-secondary btn-sm">View All</a>
        </div>
        <div class="card-body">
            <?php
            // Fetch the most recent unread notifications
            $recentNotifications = "SELECT message, created_at FROM notifications 
                                    WHERE is_read = '0' 
                                    ORDER BY created_at DESC 
                                    LIMIT 5";

            $result = mysqli_query($conn, $recentNotifications);

            if (mysqli_num_rows($result) > 0) {
                echo "<p class='text-danger fw-bold'>You have unread notifications:</p>";
                echo "<ul class='list-group'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                            <span>{$row['message']}</span>
                            <small class='text-muted'>" . date("M d, Y h:i A", strtotime($row['created_at'])) . "</small>
                          </li>";
                }
                echo "</ul>";
            } else {
                echo "<p class='text-center text-muted'>No unread notifications.</p>";
            }
            ?>
        </div>
    </div>

    
<div class="container mt-4">
    <h4 class="mb-3">Recent Loan Applications</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Member Name</th>
                    <th>Loan Type</th>
                    <th>Date Applied</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $recentLoans = "SELECT members.full_name, loans.loan_type, loans.created_at 
                                FROM loans 
                                JOIN members ON loans.member_id = members.id 
                                ORDER BY loans.created_at DESC 
                                LIMIT 5";
                $result = mysqli_query($conn, $recentLoans);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['loan_type']}</td>
                                <td>{$row['created_at']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No recent loans found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="loan_management.php"><button class="btn btn-primary">View More Applications</button></a>
</div>
</div>

            
</div>
<?php include './includes/admin_footer.php'; ?>

