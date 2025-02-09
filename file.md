# ISSUES
1. Check id, should be the member id not just any
id


















# Soft Loan Application


<form>
<label>P/b No:</label>
<input type="text" name="pb_no">

<label>Savings Balance:</label>
<input type="text" name="savings_bal">

<label>Loan Balance:</label>
<input type="text" name="loan_bal">

<label>Name:</label>
<input type="text" name="name">

<label>ID No:</label>
<input type="text" name="id_no">

<label>Postal Address:</label>
<input type="text" name="postal_address">

<label>Contact Numbers:</label>
<input type="text" name="work" placeholder="Work">
<input type="text" name="cell" placeholder="Cell">
<input type="text" name="home" placeholder="Home">

<label>Number of Dependents:</label>
<input type="text" name="dependents">

<label>Gross Salary (E):</label>
<input type="text" name="gross_salary">

<label>Net Salary (E):</label>
<input type="text" name="net_salary">

<label>Loan Amount (E):</label>
<input type="text" name="loan_amount">

<label>Loan Period (months):</label>
<input type="text" name="loan_period">

<label>Installment Due Date:</label>
<input type="date" name="installment_date">

<label>Installment Amount:</label>
<input type="text" name="installment_amount">

<label>Purpose of Loan:</label>
<textarea name="purpose"></textarea>

<p class="section-title">Loan Agreement</p>
<p>I hereby certify that all the information given above is true and complete. I promise to abide by the terms of this agreement.</p>
<label>Signature of Borrower:</label>
<input type="text" name="borrower_signature">

<label>Date:</label>
<input type="date" name="borrower_date">

<p class="section-title">For Credit Committee Use</p>
<label>Loan Approved:</label>
<input type="text" name="loan_approved">

<label>Conditions:</label>
<textarea name="conditions"></textarea>

<label>Loan Rejected (Reasons):</label>
<textarea name="rejected_reasons"></textarea>

<label>Chairperson Signature:</label>
<input type="text" name="chairperson_signature">

<label>Date:</label>
<input type="date" name="chairperson_date">

<label>Secretary Signature:</label>
<input type="text" name="secretary_signature">

<label>Date:</label>
<input type="date" name="secretary_date">

<label>CC Member Signature:</label>
<input type="text" name="cc_signature">

<label>Date:</label>
<input type="date" name="cc_date">

<p class="section-title">For Office Use Only</p>
<label>CPV No:</label>
<input type="text" name="cpv_no">

<label>Cheque No:</label>
<input type="text" name="cheque_no">

<label>Processed By (Name):</label>
<input type="text" name="processed_by">

<label>Signature:</label>
<input type="text" name="processed_signature">

<label>Date:</label>
<input type="date" name="processed_date">

<button type="submit">Submit Application</button>
</form>
</body>
</html>






# Emergency Loan Application

<form>
    <!-- Personal Information Section -->
    <fieldset>
        <legend>Personal Information</legend>
        <label>P/o No_Savings Bal: <input type="text" name="savings_bal"></label>
        <label>Loan Bal: <input type="text" name="loan_bal"></label>
        <label>Name: <input type="text" name="full_name" required></label>
        <label>ID No: <input type="text" name="id_number" required></label>
        <label>Postal Address: <textarea name="address"></textarea></label>
    </fieldset>

    <!-- Contact Information -->
    <fieldset>
        <legend>Contact Information</legend>
        <label>Work Phone: <input type="tel" name="work_phone"></label>
        <label>Cell Phone: <input type="tel" name="cell_phone" required></label>
        <label>Home Phone: <input type="tel" name="home_phone"></label>
        <label>Number of dependents: <input type="number" name="dependents"></label>
    </fieldset>

    <!-- Salary Information -->
    <fieldset>
        <legend>Income Details</legend>
        <label>Gross salary (E) per month: <input type="number" name="gross_salary"></label>
        <label>Net salary per month: <input type="number" name="net_salary"></label>
    </fieldset>

    <!-- Loan Details -->
    <fieldset>
        <legend>Loan Request</legend>
        <label>Loan Amount (E): <input type="number" name="loan_amount" required></label>
        <label>Loan Period (months): <input type="number" name="loan_period" required></label>
        <label>Installment Due Date: <input type="date" name="due_date"></label>
        <label>Purpose of loan: <textarea name="loan_purpose" required></textarea></label>
    </fieldset>

    <!-- Agreement Section -->
    <fieldset>
        <legend>Agreement</legend>
        <label>
            <input type="checkbox" required> I certify that all information is true and agree to the terms
        </label>
        <label>Signature: <input type="text" name="signature" required></label>
        <label>Date: <input type="date" name="signature_date" required></label>
    </fieldset>

    <!-- Bank Details -->
    <fieldset>
        <legend>Bank Information</legend>
        <label>Bank Name: <input type="text" name="bank_name"></label>
        <label>Branch: <input type="text" name="branch"></label>
        <label>Account Number: <input type="text" name="account_number"></label>
    </fieldset>

    <!-- Credit Committee Section -->
    <fieldset>
        <legend>Credit Committee Approval</legend>
        <label>
            <input type="radio" name="approval" value="approved"> Approved as submitted
        </label>
        <label>
            <input type="radio" name="approval" value="conditional"> Approved with conditions:
            <textarea name="conditions"></textarea>
        </label>
        <label>
            <input type="radio" name="approval" value="rejected"> Rejected:
            <textarea name="rejection_reason"></textarea>
        </label>
        
        <div class="signatures">
            <label>Chairperson Signature: <input type="text" name="chair_sign"></label>
            <label>Date: <input type="date" name="chair_date"></label>
            <label>Secretary Signature: <input type="text" name="sec_sign"></label>
            <label>Date: <input type="date" name="sec_date"></label>
        </div>
    </fieldset>

    <!-- Office Use -->
    <fieldset>
        <legend>Office Use Only</legend>
        <label>CPV No: <input type="text" name="cpv"></label>
        <label>Cheque No: <input type="text" name="cheque"></label>
        <label>Processed By: <input type="text" name="processor"></label>
        <label>Signature: <input type="text" name="processor_sign"></label>
        <label>Date: <input type="date" name="process_date"></label>
    </fieldset>
</form>




###   Long term application form:
<form>
    <!-- Loan Header -->
    <fieldset>
        <legend>Loan Application Header</legend>
        <label>P/b No: <input type="text" name="pb_number"></label>
        <label>Savings Balance: <input type="number" name="savings_bal"></label>
        <label>Loan Balance: <input type="number" name="loan_bal"></label>
    </fieldset>

    <!-- Personal Details -->
    <fieldset>
        <legend>Personal Particulars</legend>
        <label>Full Name: <input type="text" name="full_name" required></label>
        <label>ID Number: <input type="text" name="id_number" required></label>
        <label>Postal Address: <textarea name="postal_address"></textarea></label>
        <label>Residential Address: <textarea name="residential_address"></textarea></label>
        <label>Contact Numbers - Work: <input type="tel" name="work_phone"></label>
        <label>Cell: <input type="tel" name="cell_phone" required></label>
        <label>Home: <input type="tel" name="home_phone"></label>
        <label>Employer: <input type="text" name="employer"></label>
        <label>Number of Dependents: <input type="number" name="dependents"></label>
    </fieldset>

    <!-- Income Details -->
    <fieldset>
        <legend>Income Information</legend>
        <label>Gross Salary (E): <input type="number" name="gross_salary"></label>
        <label>Net Salary: <input type="number" name="net_salary"></label>
        <label>Other Income: <input type="number" name="other_income"></label>
        <label>Source of Other Income: <input type="text" name="income_source"></label>
    </fieldset>

    <!-- Loan Request -->
    <fieldset>
        <legend>Loan Details</legend>
        <label>Loan Amount (E): <input type="number" name="loan_amount" required></label>
        <label>Loan Period: <input type="text" name="loan_period" placeholder="month/years" required></label>
        <label>Existing Loan Installment: <input type="number" name="existing_loan"></label>
        <label>Monthly Repayment Amount: <input type="number" name="repayment_amount"></label>
        <label>Installment Due Date: <input type="date" name="due_date"></label>
        <label>Purpose of Loan: <textarea name="loan_purpose" required></textarea></label>
        <label>Surity/Co-maker: <input type="text" name="surity_name"></label>
        <label>Surity Value (E): <input type="number" name="surity_value"></label>
    </fieldset>

    <!-- Existing Loans -->
    <fieldset>
        <legend>Existing Loans</legend>
        <label>
            Existing loans elsewhere? 
            <select name="existing_loans">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
        </label>
        <label>If yes, details: <textarea name="loan_details"></textarea></label>
    </fieldset>

    <!-- Agreement Section -->
    <fieldset>
        <legend>Loan Agreement & Deduction Authority</legend>
        <label>
            <input type="checkbox" required> I certify all information is true and authorize salary/savings deductions
        </label>
        <label>Signature: <input type="text" name="signature" required></label>
        <label>Date: <input type="date" name="signature_date" required></label>
    </fieldset>

    <!-- Bank Details -->
    <fieldset>
        <legend>Bank Information</legend>
        <label>Bank Name: <input type="text" name="bank_name"></label>
        <label>Branch: <input type="text" name="branch"></label>
        <label>Account Number: <input type="text" name="account_number"></label>
    </fieldset>
</form>









### dashboard
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .card p {
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        canvas {
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .charts {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <h1>📊 Dashboard Overview</h1>
    <div class="dashboard">
        <div class="card">
            <h3>Total Members</h3>
            <p>1,245</p>
        </div>
        <div class="card">
            <h3>Pending Applications</h3>
            <p>32</p>
        </div>
        <div class="card">
            <h3>Approved Loans</h3>
            <p>865</p>
        </div>
        <div class="card">
            <h3>Outstanding Loans</h3>
            <p>$120,500</p>
        </div>
    </div>

    <div class="charts">
        <canvas id="loanApplicationsChart"></canvas>
        <canvas id="loanStatusChart"></canvas>
        <canvas id="membershipGrowthChart"></canvas>
    </div>

    <script>
        // Bar Chart: Monthly Loan Applications
        new Chart(document.getElementById('loanApplicationsChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Loan Applications',
                    data: [150, 200, 180, 220, 300, 250],
                    backgroundColor: '#4e73df'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Pie Chart: Loan Status Breakdown
        new Chart(document.getElementById('loanStatusChart'), {
            type: 'pie',
            data: {
                labels: ['Approved', 'Rejected', 'Pending'],
                datasets: [{
                    data: [865, 120, 32],
                    backgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e']
                }]
            }
        });

        // Line Chart: Membership Growth Over Time
        new Chart(document.getElementById('membershipGrowthChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'New Members',
                    data: [100, 150, 180, 220, 260, 300],
                    borderColor: '#36b9cc',
                    fill: false,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                }
            }
        });
    </script>
</body>
</html>






##### SETTINGS PAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .settings-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .settings-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="checkbox"] {
            margin-right: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="settings-container">
    <div class="settings-title">Admin Settings</div>

    <form>
        <div class="form-group">
            <label for="adminName">Admin Name</label>
            <input type="text" id="adminName" name="adminName" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="adminEmail">Email Address</label>
            <input type="email" id="adminEmail" name="adminEmail" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="adminPassword">Password</label>
            <input type="password" id="adminPassword" name="adminPassword" placeholder="Enter a new password">
        </div>

        <div class="form-group">
            <label for="themePreference">Theme Preference</label>
            <select id="themePreference" name="themePreference">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="notifications"> Enable Email Notifications
            </label>
        </div>

        <button type="submit" class="btn">Save Changes</button>
    </form>
</div>

</body>
</html>



#### LOAN MANAGEMENT
<?php
// Database Connection
$host = 'localhost';
$db = 'loan_app';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Approve or Reject Loan
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    if ($action == 'approve' || $action == 'reject') {
        $status = ($action == 'approve') ? 'Approved' : 'Rejected';
        
        $stmt = $conn->prepare("UPDATE loans SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
        
        header('Location: loan_management.php');
        exit;
    }
}

// Fetch Loan Applications
$result = $conn->query("SELECT * FROM loans ORDER BY application_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loan Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .approve {
            background-color: green;
        }
        .reject {
            background-color: red;
        }
    </style>
</head>
<body>

<h1>Loan Applications</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Applicant Name</th>
        <th>Loan Type</th>
        <th>Amount</th>
        <th>Application Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while ($loan = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($loan['id']); ?></td>
            <td><?php echo htmlspecialchars($loan['applicant_name']); ?></td>
            <td><?php echo htmlspecialchars($loan['loan_type']); ?></td>
            <td><?php echo htmlspecialchars($loan['amount']); ?></td>
            <td><?php echo htmlspecialchars($loan['application_date']); ?></td>
            <td><?php echo htmlspecialchars($loan['status']); ?></td>
            <td>
                <?php if ($loan['status'] == 'Pending'): ?>
                    <a href="?action=approve&id=<?php echo $loan['id']; ?>" class="btn approve" onclick="return confirm('Are you sure you want to approve this loan?');">Approve</a>
                    <a href="?action=reject&id=<?php echo $loan['id']; ?>" class="btn reject" onclick="return confirm('Are you sure you want to reject this loan?');">Reject</a>
                <?php else: ?>
                    <?php echo htmlspecialchars($loan['status']); ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>




<!-- DROP DOWN INFORMATION FOR THE SIDE NAVIGATION BAR -->
 <!-- <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="fa-solid fa-lock"></i>
                <span>Auth</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Login</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Register</a>
                </li>
            </ul>
        </li> -->

        <!-- <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="fa-solid fa-lock"></i>
                <span>Auth</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Login</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Register</a>
                </li>
            </ul>
        </li> -->