<?php 
    $pageTitle = "Dashboard";
    include './includes/admin_header.php';
?>
<div class="main p-3">
    <h1>Hello, <?= htmlspecialchars($_SESSION['role']) ?></h1>

    <h2>Overview</h2>
    <p>Welcome to the Admin Dashboard. Here you can see key performance indicators (KPIs) such as total members, loan applications, pending approvals, etc.</p>
    <!-- Add KPI cards, charts, and summaries as needed -->

    <div class="dashboard">
        <div class="kpi-card">
            <i class="fas fa-users icon"></i>
            <div class="content">
                <div class="kpi-value">1,200</div>
                <div class="kpi-label">Total Members</div>
            </div>
        </div>

        <div class="kpi-card">
            <i class="fas fa-hourglass-half icon"></i>
            <div class="content">
                <div class="kpi-value">150</div>
                <div class="kpi-label">Pending Applications</div>
            </div>
        </div>

        <div class="kpi-card">
            <i class="fas fa-check-circle icon"></i>
            <div class="content">
                <div class="kpi-value">980</div>
                <div class="kpi-label">Approved Loans</div>
            </div>
        </div>

        <div class="kpi-card">
            <i class="fas fa-wallet icon"></i>
            <div class="content">
                <div class="kpi-value">$85,000</div>
                <div class="kpi-label">Outstanding Loans</div>
            </div>
        </div>
    </div>

    <div class="charts">
        <canvas id="loanApplicationsChart"></canvas>
        <canvas id="loanStatusChart"></canvas>
        <canvas id="membershipGrowthChart"></canvas>
    </div>

            
</div>
<?php include './includes/admin_footer.php'; ?>

