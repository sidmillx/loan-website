<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
    header('Location: ./login.php');
    exit(); 
    }
$member_id = isset($_SESSION['username']) ? $_SESSION['username'] : '';


  $pageTitle = 'Long Term Loan Application';
  include './includes/member_header.php'; 
?>
<?php 
    include('../config/db.php');

    // Declare variables to store form data
    $pb_number = $savings_balance = $loan_balance = $full_name = $id_number = $postal_address = $contact_details_work = $contact_details_cell = $contact_details_home = "";
    $number_of_dependents = $gross_salary = $net_salary = $loan_amount = $loan_period = $installment_date = $installment = $loan_purpose = "";
    $signature = $name_of_bank = $account_number = $branch = $surety_offered = $surety_value = $existing_loan = $existing_loan_details = "";
    

// Define error array for form validation
$errors = [];

// Function to sanitize form input and avoid XSS (Cross-Site Scripting) attacks
function sanitize_input($data) {
    return htmlspecialchars(trim($data)); // Remove unwanted spaces and encode special characters
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $pb_number = isset($_POST['pb_number']) ? htmlspecialchars(trim($_POST['pb_number'])) : '';
    $savings_balance = isset($_POST['savings_balance']) ? htmlspecialchars(trim($_POST['savings_balance'])) : '';
    $loan_balance = isset($_POST['loan_balance']) ? htmlspecialchars(trim($_POST['loan_balance'])) : ''; // Fixed here
    $full_name = isset($_POST['full_name']) ? htmlspecialchars(trim($_POST['full_name'])) : '';
    $id_number = isset($_POST['id_number']) ? htmlspecialchars(trim($_POST['id_number'])) : '';
    $postal_address = isset($_POST['postal_address']) ? htmlspecialchars(trim($_POST['postal_address'])) : '';
    $contact_details_work = isset($_POST['contact_details_work']) ? htmlspecialchars(trim($_POST['contact_details_work'])) : '';
    $contact_details_cell = isset($_POST['contact_details_cell']) ? htmlspecialchars(trim($_POST['contact_details_cell'])) : '';
    $contact_details_home = isset($_POST['contact_details_home']) ? htmlspecialchars(trim($_POST['contact_details_home'])) : '';
    $number_of_dependents = isset($_POST['number_of_dependents']) ? htmlspecialchars(trim($_POST['number_of_dependents'])) : '';
    $gross_salary = isset($_POST['gross_salary']) ? htmlspecialchars(trim($_POST['gross_salary'])) : '';
    $net_salary = isset($_POST['net_salary']) ? htmlspecialchars(trim($_POST['net_salary'])) : '';
    $loan_amount = isset($_POST['loan_amount']) ? htmlspecialchars(trim($_POST['loan_amount'])) : '';
    $loan_period = isset($_POST['loan_period']) ? htmlspecialchars(trim($_POST['loan_period'])) : '';
    $installment_date = isset($_POST['installment_date']) ? htmlspecialchars(trim($_POST['installment_date'])) : '';
    $installment = isset($_POST['installment']) ? htmlspecialchars(trim($_POST['installment'])) : '';
    $loan_purpose = isset($_POST['loan_purpose']) ? htmlspecialchars(trim($_POST['loan_purpose'])) : '';
    $signature = isset($_POST['signature']) ? htmlspecialchars(trim($_POST['signature'])) : '';
    // $date = isset($_POST['borrower_date']) ? htmlspecialchars(trim($_POST['borrower_date'])) : '';
    $name_of_bank = isset($_POST['name_of_bank']) ? htmlspecialchars(trim($_POST['name_of_bank'])) : '';
    $account_number = isset($_POST['account_number']) ? htmlspecialchars(trim($_POST['account_number'])) : '';
    $branch = isset($_POST['branch']) ? htmlspecialchars(trim($_POST['branch'])) : '';
    $surety_offered = isset($_POST['surety_offered']) ? htmlspecialchars(trim($_POST['surety_offered'])) : '';
    $surety_value = isset($_POST['surety_value']) ? htmlspecialchars(trim($_POST['surety_value'])) : '';
    $existing_loan = isset($_POST['existing_loan']) ? htmlspecialchars(trim($_POST['existing_loan'])) : '';
    $existing_loan_details = isset($_POST['existing_loan_details']) ? htmlspecialchars(trim($_POST['existing_loan_details'])) : '';
    

    // LOAN TYPE WITH DEFAULT SHORT-TERM
    $loan_type = isset($_POST['loan_type']) ? htmlspecialchars(trim($_POST['loan_type'])) : 'Long Term';
    // $status = isset($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : 'Pending';


    $member_id = $_SESSION['username'];
    
   

    // Further validation, e.g., checking if fields are not empty or email format
    if (empty($full_name) || empty($loan_amount)) {
        // Handle validation errors
        $error_message = "Please fill in all required fields correctly.";
    } else {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO loans (
            member_id, pb_number, savings_balance, loan_balance, full_name, id_number, postal_address,
            contact_details_work, contact_details_cell, contact_details_home, number_of_dependents, gross_salary, net_salary,
            loan_amount, loan_period, installment_date, installment, loan_purpose, signature,
            name_of_bank, account_number, branch, surety_offered, surety_value, existing_loan, existing_loan_details, loan_type
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);

        // Check if the statement was prepared successfully
        if ($stmt === false) {
        die('Error preparing the query: ' . mysqli_error($conn));
        }

        // Bind the parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssss",
        $member_id, $pb_number, $savings_balance, $loan_balance, $full_name, $id_number, $postal_address,
        $contact_details_work, $contact_details_cell, $contact_details_home, $number_of_dependents, $gross_salary, $net_salary,
        $loan_amount, $loan_period, $installment_date, $installment, $loan_purpose, $signature,
        $name_of_bank, $account_number, $branch, $surety_offered, $surety_value, $existing_loan, $existing_loan_details, $loan_type
    );
        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
        // Successfully inserted data, now send email or notification

        // Get the loan_id
        $loan_id = $conn->insert_id;

        $success_message = "Your membership application has been submitted successfully!";
        echo "<p>Thank you for applying! Your application has been submitted and is under review.</p>";

        // Optionally send an email to the user
        // mail($email, "Membership Application", "Your application has been received.");
        } else {
        // Handle database error
        $error_message = "There was an issue submitting your application.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);

    }

    // PHP FILE UPLOADS
    $target_dir = "../uploads/";
    $newFileName = uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]); // ADDED NOW NOW
    $target_file = $target_dir . $newFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . "."; //comment this
            $uploadOk = 1;
        } else {
            echo "File is not an image."; // see what to do with this
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    
    // Check file size
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    if ($_FILES["fileToUpload"]["size"] > $maxFileSize) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "pdf" ) {
        echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
        $uploadOk = 0;
    }

    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $applicant_id = NULL;


            // Save the file path to the database
            // $applicant_id = $POST['applicant_id'];
            $sql = "INSERT INTO uploads (loan_id, file_path) VALUES ('$loan_id', '$target_file')";
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            if($conn->query($sql) === TRUE) {
                echo "File uploaded successfully";
            } else {
                echo "Error saving file to database: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<section class="loan-application main">
<button class="open-btn" onclick="toggleSidebar()">&#9776;</button>

    <div class="page-header">
        <h2 class="main-header">Long Term Loan</h2>
    </div>
    <div class="container-loan">
        <div class="loan-form-container">
            <div class="form-header">
                <h2>Long Term Loan Application Form</h2>
                <p class="sub-text">Please fill out all the required information below.</p>
            </div>
            <form id="soft-loan" class="loan-form" method="POST" enctype="multipart/form-data">
                <h3>Personal Information</h3>

                <div class="form-group-two">

                    <div class="form-group-two-item">
                        <label>P/b No:</label>
                        <input type="text" name="pb_number" placeholder="P/b No">
                    </div>
                    
                    <div class="form-group-two-item">
                    <label>Name:</label>
                    <input type="text" name="full_name" placeholder="Enter Full Name">
                    </div>


                    <div class="form-group-two-item">
                    <label>ID No:</label>
                    <input type="text" name="id_number" placeholder="Enter ID Number">
                    </div>

                    
                    <div class="form-group-two-item">
                    <label>Postal Address:</label>
                    <input type="text" name="postal_address" placeholder="Enter Postal Address">
                    </div>


                    <div class="form-group-two-item">
                    <label>Number of Dependents:</label>
                    <input type="text" name="number_of_dependents" placeholder="Enter Number of Dependents">
                    </div>

                    
                </div>
                <br>
                <h3>Contact Information</h3>
                <div class="form-group-three">
                    <div class="form-group-three-item">
                        <label for="">Work Contact Number</label>
                        <input type="text" name="contact_details_work" placeholder="Work" placeholder="Work">
                    </div>
                    <div class="form-group-three-item">
                        <label for="">Cell Contact Number</label>
                        <input type="text" name="contact_details_cell" placeholder="Cell" placeholder="Cell">
                    </div>
                    <div class="form-group-three-item">
                        <label for="">Home Contact Number</label>
                        <input type="text" name="contact_details_home" placeholder="Home" placeholder="Home">
                    </div>
                </div>
                <br>
                
                <h3>Financial Information</h3>

                <div class="form-group-two">
                    <div class="form-group-two-item">
                        <label>Savings Balance:</label>
                        <input type="text" name="savings_balance" placeholder="Enter Savings Balance">
                    </div>
                    
                    <div class="form-group-two-item">
                        <label>Loan Balance:</label>
                        <input type="text" name="loan_balance" placeholder="Enter Loan Balance">
                    </div>
                    
                    <div class="form-group-two-item">
                        <label>Gross Salary (E):</label>
                        <input type="text" name="gross_salary" placeholder="Enter Gross Salary">
                    </div>
                    
                    <div class="form-group-two-item">
                        <label>Net Salary (E):</label>
                        <input type="text" name="net_salary" placeholder="Enter Net Salary">
                    </div>
                </div>
                <br>

                <h3>Loan Details</h3>
                <div class="form-group-two">
                    <div class="form-group-two-item">
                        <label>Loan Amount (E):</label>
                        <input type="text" name="loan_amount" placeholder="Enter Loan Amount">
                    </div>
                    
                    <div class="form-group-two-item">
                        <label>Loan Period (months):</label>
                        <input type="text" name="loan_period" placeholder="Enter Loan Period">
                    </div>
                    
                    <div class="form-group-two-item">
                        <label>Installment Due Date:</label>
                        <input type="date" name="installment_date">
                    </div>
                    
                    <div class="form-group-two-item">
                        <label>Installment Amount:</label>
                        <input type="text" name="installment" placeholder="Enter Installment Amount">
                    </div>
                    
                </div>
                <label class="label-heading">Purpose of Loan:</label>
                <textarea name="loan_purpose" placeholder="Enter the purpose of the loan"></textarea>
                
                <br>
                <h3>Loan Agreement</h3>
                <div class="checkbox-group">
                    <input type="checkbox" name="loan-agreement-check" id="loan-agreement-check">
                    <label for="loan-agreemen-check">I hereby certify that all the information given above is true and complete. I promise to abide by the terms of this agreement.</label>
                </div>
                    <div class="form-group-two">
                    <div class="form-group-two-item">
                        <label>Signature of Borrower:</label>
                        <input type="text" name="signature" placeholder="Enter Signature">
                    </div>
                    
                </div>
                
                <br>
                <h3>Banking Details (For Loan Credit)</h3>
                <div class="form-group-two">
                    <div class="form-group-two-item">
                        <label>Name of Bank:</label>
                        <input type="text" name="name_of_bank">
                    </div>
                    <div class="form-group-two-item">
                        <label>Branch:</label>
                        <input type="text" name="branch">
                    </div>
                    <div class="form-group-two-item">
                        <label>Account Number:</label>
                        <input type="account_number" name="account_number">
                    </div>
                </div>

                <br>

                <h3>Surety Information</h3>
                <div class="form-group-two">
                    <div class="form-group-two-item">
                        <label>Surety:</label>
                        <input type="account_number" name="surety_offered">
                    </div>
                    <div class="form-group-two-item">
                        <label>Surety Value:</label>
                        <input type="surety value" name="surety_value">
                    </div>
                </div>
                <br>

                <h3>Existing Loans Information</h3>

                <label class="label-heading">Existing Loan:</label>
                <input type="existing_loan" name="existing_loan">

                <label class="label-heading">Existing Loan Details:</label>
                <textarea id="existing_loan_details" name="existing_loan_details" placeholder="Enter existing Loan Details"></textarea>
                
                <!-- DOCUMENTS -->
                <label for="id_card">Identity Document</label>
                Select an image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload"> 

                
                <button type="submit" id="submit-loan-application">Submit Application</button>

            </form>

        </div>                    
    </div>
</section>

<?php include './includes/member_footer.php'; ?>
