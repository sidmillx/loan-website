<!-- member_loan_products.php (Member Page) -->
<?php
include '../config/db.php'; // Database connection
$pageTitle = 'Loan Products';
include './includes/member_header.php'; 

// Fetch loan products for members
$result = $conn->query("SELECT name, interest_rate, max_amount, repayment_schedule, eligibility_criteria FROM loan_products");

?>

<div class="main">

    
    <div class="page-header">
        <h2 class="main-header">Available Loan Products</h2>
        <h5>Explore different loan options, terms, and eligibility criteria.</h5>
    </div>

    <!-- <table>
    <tr>
        <th>Loan Name</th>
        <th>Interest Rate (%)</th>
        <th>Max Amount</th>
        <th>Repayment Schedule</th>
        <th>Eligibility Criteria</th>
    </tr>
    <//?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><//?php echo $row['name']; ?></td>
            <td><//?php echo $row['interest_rate']; ?></td>
            <td><//?php echo $row['max_amount']; ?></td>
            <td><//?php echo $row['repayment_schedule']; ?></td>
            <td><//?php echo $row['eligibility_criteria']; ?></td>
        </tr>
        <//?php endwhile; ?>
    </table> -->


    <div class="container-loan-products">
        <h1>Available Loans</h1>
        <div class="loan-grid">

            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="loan-card">
                <div class="loan-header"><?php echo $row['name']; ?></div>
                    <div class="loan-content">
                        <div class="loan-detail interest-rate">Interest Rate: <?php echo $row['interest_rate']; ?></div>
                        <div class="loan-detail max-amount">Max Amount: <?php echo $row['max_amount']; ?></div>
                        <div class="loan-detail repayment">Repayment: <?php echo $row['repayment_schedule']; ?></div>
                        <div class="loan-detail eligibility">Eligibility: <?php echo $row['eligibility_criteria']; ?></div>
                    </div>
            </div>
            <?php endwhile; ?>

        </div>
    </div>
    
</div>


<?php include './includes/member_footer.php'; ?>

