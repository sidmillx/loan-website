<?php 
    $pageTitle = "Loan Products";
    include './includes/admin_header.php';
    include '../config/db.php';

// Handle form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $interest_rate = $_POST['interest_rate'];
    $max_amount = $_POST['max_amount'];
    $repayment_schedule = $_POST['repayment_schedule'];
    $eligibility_criteria = $_POST['eligibility_criteria'];

    $sql = "INSERT INTO loan_products (name, interest_rate, max_amount, repayment_schedule, eligibility_criteria) 
            VALUES ('$name', '$interest_rate', '$max_amount', '$repayment_schedule', '$eligibility_criteria')";

    if ($conn->query($sql) === TRUE) {
        echo "Loan product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

    // Fetch loan products
    $result = $conn->query("SELECT * FROM loan_products");
?>
<div class="main p-3">
    <h2>Loan Products</h2>
    <p>Configure the available loan products. Set parameters like interest rates, maximum loan amounts, repayment schedules, and eligibility criteria.</p>
    <!-- Add forms or settings panels for managing loan products -->

    <div>
            
    <div class="form-container">
        <form method="POST" action="">
            <label>Loan Name:</label><br>
            <input type="text" name="name" required><br><br>

            <label>Interest Rate (%):</label><br>
            <input type="number" step="0.01" name="interest_rate" required><br><br>

            <label>Maximum Loan Amount:</label><br>
            <input type="number" name="max_amount" required><br><br>

            <label>Repayment Schedule:</label><br>
            <input type="text" name="repayment_schedule" required><br><br>

            <label>Eligibility Criteria:</label><br>
            <textarea name="eligibility_criteria" required></textarea><br><br>

            <button type="submit" name="submit">Add Loan Product</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Interest Rate (%)</th>
            <th>Max Amount</th>
            <th>Repayment Schedule</th>
            <th>Eligibility Criteria</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['interest_rate']; ?></td>
                <td><?php echo $row['max_amount']; ?></td>
                <td><?php echo $row['repayment_schedule']; ?></td>
                <td><?php echo $row['eligibility_criteria']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


    </div>
</div>
<?php include './includes/admin_footer.php'; ?>




