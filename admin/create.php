
<!-- We need to read the submitted data -->
 <?php 

    $name = " ";
    $email = " ";
    // Database Connection
    include ('../config/db.php');

    // Check if data has been transmitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];

        //check if no empty data
        do {
            if (empty($name) || empty($email)) {
            $errorMessage =  "All fields are required.";
            break;
            }

            // add new client to database
            $sql = "INSERT INTO members (full_name, email)" . "VALUES ('$name', '$email')";
            $result= $conn->query($sql);

            if(!$result) {
                $errorMessage = "Failed to add client" . $conn->error;
                break;
            }

            // Process the data (e.g., save to database)

            // add new client to database
            $name = "";
            $email = "";
          

            $successMessage = "Client added successfully";
            
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
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"/>
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