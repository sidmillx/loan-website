<?php 
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
        header("Location: login.php"); // Redirect to login if session is not set
        exit();
    }

    // Check if the user has admin privileges
    if ($_SESSION['role'] !== 'admin') {
        echo "Access Denied: You do not have permission to view this page.";
        exit();
    }
    $pageTitle = "Member Management";
    include './includes/admin_header.php';
?>

<div class="main p-3">
    <h2>Member Management</h2>
    <p>Review and manage member sign-up applications. Approve or reject applications, view member details, and update member records.</p>
    <a class="btn btn-primary" href="./create.php" role="button" style="margin-bottom: 20px;">New Member</a>
    <br>

    <table class="display" id="">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- <th>Email</th> -->
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <!-- Read from database -->
                <?php 
                    require_once '../config/db.php';

                    // read all rows from database file
                    $sql = "SELECT * FROM members";
                    $result = $conn->query($sql);

                    // <a href='./edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>

                    // check if query executed
                    if (!$result){
                        die("Invalid query: " . $connection->error);
                    }

                    // read data from each row
                    while($row = $result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[full_name]</td>
                                <td>$row[contact_details]</td>
                                <td>$row[residential_address]</td>
                                <td>$row[gender]</td>
            
                                <td>
                                   
                                    <a href='./delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>
                        ";
                    }


                ?>
        </tbody>
    </table>
    <!-- Insert table or list for member applications and management functions -->
</div>
<?php include './includes/admin_footer.php'; ?>

