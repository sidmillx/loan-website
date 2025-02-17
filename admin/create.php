<?php
    // Database Connection
    include ('../config/db.php');

    // Check if data has been transmitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Assign submitted values to variables with validation and sanitization
        $full_name = isset($_POST['full_name']) ? htmlspecialchars(trim($_POST['full_name'])) : '';
        $id_number = isset($_POST['id_number']) ? htmlspecialchars(trim($_POST['id_number'])) : '';
        $postal_address = isset($_POST['postal_address']) ? htmlspecialchars(trim($_POST['postal_address'])) : ''; 
        $residential_address = isset($_POST['residential_address']) ? htmlspecialchars(trim($_POST['residential_address'])) : ''; 
        $gender = isset($_POST['gender']) ? htmlspecialchars(trim($_POST['gender'])) : '';
        $chief = isset($_POST['chief']) ? htmlspecialchars(trim($_POST['chief'])) : '';
        $contact_details_work = isset($_POST['contact_details_work']) ? htmlspecialchars(trim($_POST['contact_details_work'])) : '';
        $contact_details_cell = isset($_POST['contact_details_cell']) ? htmlspecialchars(trim($_POST['contact_details_cell'])) : '';
        $marital_status = isset($_POST['marital_status']) ? htmlspecialchars(trim($_POST['marital_status'])) : ''; 
        $dob = isset($_POST['dob']) ? htmlspecialchars(trim($_POST['dob'])) : '';
        $occupation = isset($_POST['occupation']) ? htmlspecialchars(trim($_POST['occupation'])) : '';
        $employment_number = isset($_POST['employment_number']) ? htmlspecialchars(trim($_POST['employment_number'])) : '';
        $name_of_employer = isset($_POST['name_of_employer']) ? htmlspecialchars(trim($_POST['name_of_employer'])) : '';
        $address_of_employer = isset($_POST['address_of_employer']) ? htmlspecialchars(trim($_POST['address_of_employer'])) : '';
        $savings = isset($_POST['savings']) ? htmlspecialchars(trim($_POST['savings'])) : '';
        $entrance_fee = isset($_POST['entrance_fee']) ? htmlspecialchars(trim($_POST['entrance_fee'])) : '';
        $shares_capital = isset($_POST['shares_capital']) ? htmlspecialchars(trim($_POST['shares_capital'])) : '';
        $laws = isset($_POST['laws']) ? 1 : 0; // If checkbox is checked, set to 1, else 0
        $nominee = isset($_POST['nominee']) ? htmlspecialchars(trim($_POST['nominee'])) : '';
        $date = isset($_POST['date']) ? htmlspecialchars(trim($_POST['date'])) : '';
        $signature = isset($_POST['signature']) ? htmlspecialchars(trim($_POST['signature'])) : '';
        $contact = isset($_POST['contact']) ? htmlspecialchars(trim($_POST['contact'])) : '';

        // Check if all required fields are filled
        do {
            if (empty($full_name) || empty($id_number) || empty($postal_address) || empty($residential_address) || 
                empty($gender) || empty($dob) || empty($occupation) || empty($employment_number) ||
                empty($savings) || empty($entrance_fee) || empty($shares_capital) || empty($nominee) || empty($contact)) {
                $errorMessage =  "All fields are required.";
                break;
            }

            // Add new client to the members table
            $sql = "INSERT INTO members (
                full_name, 
                id_number, 
                postal_address, 
                residential_address, 
                gender, 
                chief, 
                contact_details_work, 
                contact_details_cell, 
                marital_status, 
                dob, 
                occupation, 
                employment_number, 
                name_of_employer, 
                address_of_employer, 
                savings, 
                entrance_fee, 
                shares_capital, 
                laws, 
                nominee, 
                signature, 
                contact
            ) VALUES (
                '$full_name', 
                '$id_number', 
                '$postal_address', 
                '$residential_address', 
                '$gender', 
                '$chief', 
                '$contact_details_work', 
                '$contact_details_cell', 
                '$marital_status', 
                '$dob', 
                '$occupation', 
                '$employment_number', 
                '$name_of_employer', 
                '$address_of_employer', 
                '$savings', 
                '$entrance_fee', 
                '$shares_capital', 
                '$laws', 
                '$nominee', 
                '$signature', 
                '$contact'
            )";
            
            // Execute query
            $result = $conn->query($sql);

            if(!$result) {
                $errorMessage = "Failed to add client: " . $conn->error;
                break;
            }

            // Get the last inserted member_id to use as the username
            $member_id = $conn->insert_id;

            // Generate username and default password
            $username = $member_id; // Use member_id as username
            $password = 'default123'; // Default password

            // Insert into users table
            $sql_user = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            $user_result = $conn->query($sql_user);

            if (!$user_result) {
                $errorMessage = "Failed to create user: " . $conn->error;
                break;
            }

            // Success message
            $successMessage = "Client and user account created successfully.";

            // Redirect to member management page
            header('location: ./member_management.php');
            exit;

        } while (false);
    }

    $errorMessage = "";
    $successMessage = "";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../admin.css">
</head>
<body>

    <div class="container my-5">
        <h2>New client</h2>
        <!-- Display error message here -->
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
            </div>";
        }
        ?>
        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-6">
                    <input type="text" name="full_name" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID Number</label>
                <div class="col-sm-6">
                    <input type="text" name="id_number" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Postal Address</label>
                <div class="col-sm-6">
                    <input type="text" name="postal_address" class="form-control"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Chief</label>
                <div class="col-sm-6">
                    <input type="text" name="chief" class="form-control"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Details</label>
                <div class="col-sm-6">
                    <input type="text" name="contact_details_work" class="form-control"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Marital Status</label>
                <div class="col-sm-6">
                    <input type="text" name="marital_status" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Residential Address</label>
                <div class="col-sm-6">
                    <input type="text" name="residential_address" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <select name="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            
     
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Birth</label>
                <div class="col-sm-6">
                    <input type="date" name="dob" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Occupation</label>
                <div class="col-sm-6">
                    <input type="text" name="occupation" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Employment Number</label>
                <div class="col-sm-6">
                    <input type="text" name="employment_number" class="form-control"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name of Employer</label>
                <div class="col-sm-6">
                    <input type="text" name="name_of_employer" class="form-control"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address of Employer</label>
                <div class="col-sm-6">
                    <input type="text" name="address_of_employer" class="form-control"/>
                </div>
            </div>
            <div class="laws-container">
                        <input type="checkbox" id="laws" name="laws" required>
                        <label for="laws">I agree to abide by all the laws of the society:</label>
                     </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Savings</label>
                <div class="col-sm-6">
                    <input type="number" step="0.01" name="savings" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Entrance Fee</label>
                <div class="col-sm-6">
                    <input type="number" step="0.01" name="entrance_fee" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Shares Capital</label>
                <div class="col-sm-6">
                    <input type="number" step="0.01" name="shares_capital" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nominee</label>
                <div class="col-sm-6">
                    <input type="text" name="nominee" class="form-control"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Signature</label>
                <div class="col-sm-6">
                    <input type="text" name="signature" class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" name="contact" class="form-control"/>
                </div>
            </div>
            
          
    

            <!-- DISPLAY SUCCESS MESSAGE -->
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                </div>";
            }
            ?>

            

            <!-- Buttons -->
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="./member_management.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
</body>
</html>