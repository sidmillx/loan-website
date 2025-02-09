<?php 
    $pageTitle = "Loan Management";
    include './includes/admin_header.php';
?>


<?php
// Database Connection
include('../config/db.php');

// Approve or Reject Loan
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    if ($action == 'approve' || $action == 'reject') {
        $status = ($action == 'approve') ? 'Approved' : 'Rejected';
        
        $stmt = $conn->prepare("UPDATE loans SET status = ? WHERE loan_id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
        
        header('Location: loan_management.php');
        exit;
    }
}

// Fetch Loan Applications
$result = $conn->query("SELECT * FROM loans ORDER BY loan_id DESC");
?>

<div class="main p-3">
    <h2>Loan Management</h2>
    <p>View all loan applications (short term, medium term, long term), and handle the approval or rejection of loans where necessary.</p>
    <!-- Insert table or list for loan applications with options to filter by type and status -->
    <h1>Loan Applications</h1>

    <table id="" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Applicant Name</th>
                <th>Loan Type</th>
                <th>Amount</th>
                <th>Application Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($loan = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($loan['loan_id']); ?></td>
                    <td><?php echo htmlspecialchars($loan['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($loan['loan_type']); ?></td>
                    <td><?php echo htmlspecialchars($loan['loan_balance']); ?></td>
                    <td><?php echo htmlspecialchars($loan['date']); ?></td>
                    <td><?php echo htmlspecialchars($loan['status']); ?></td>
                    <td>
                        <?php if ($loan['status'] == 'Pending'): ?>
                            <a href="?action=approve&id=<?php echo $loan['loan_id']; ?>" class="btn approve" onclick="return confirm('Are you sure you want to approve this loan?');">Approve</a>
                            <a href="?action=reject&id=<?php echo $loan['loan_id']; ?>" class="btn reject" onclick="return confirm('Are you sure you want to reject this loan?');">Reject</a>
                        <?php else: ?>
                            <?php echo htmlspecialchars($loan['status']); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include './includes/admin_footer.php'; ?>

