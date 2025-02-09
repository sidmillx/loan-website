<?php 
  $pageTitle = 'My loans';
  include './includes/member_header.php'; 
?>

    <div class="main">
        <div class="page-header">
            <h2 class="main-header">My Loans</h2>
            <h5>View details of your active, pending, and completed loan applications.</h5>
        </div>
    <div class="myloanscontainer">
        <!-- Loan Summary Section -->
        <div class="section summary">
            <div>
                <h3>Total Active Loans</h3>
                <p>3</p>
            </div>
            <div>
                <h3>Outstanding Balance</h3>
                <p>$12,500</p>
            </div>
            <div>
                <h3>Next Payment Due</h3>
                <p>15 Feb 2025</p>
            </div>
            <button class="myloansbtn">Apply for New Loan</button>
        </div>

        <!-- Loan Details Section -->
        <div class="section">
            <h2>My Loans</h2>
            <table id="loanTable" class="display">
                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Loan Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Disbursement Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>LN12345</td>
                        <td>Short-Term</td>
                        <td>$5,000</td>
                        <td>Active</td>
                        <td>01 Jan 2024</td>
                        <td><button class="myloansbtn">View Details</button></td>
                    </tr>
                    <tr>
                        <td>LN67890</td>
                        <td>Medium-Term</td>
                        <td>$7,500</td>
                        <td>Pending</td>
                        <td>--</td>
                        <td><button class="myloansbtn">View Details</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Repayment History Section -->
        <div class="section">
            <h2>Repayment History</h2>
            <table id="repaymentTable" class="display">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Amount Paid</th>
                        <th>Remaining Balance</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01 Feb 2024</td>
                        <td>$500</td>
                        <td>$12,000</td>
                        <td>Bank Transfer</td>
                        <td>Successful</td>
                    </tr>
                    <tr>
                        <td>01 Jan 2024</td>
                        <td>$500</td>
                        <td>$12,500</td>
                        <td>Mobile Money</td>
                        <td>Successful</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>

<?php include './includes/member_footer.php'; ?>
