<?php 
    $pageTitle = "Member Management";
    include './includes/admin_header.php';
?>

<div class="main p-3">
    <h2>Member Management</h2>
    <p>Review and manage member sign-up applications. Approve or reject applications, view member details, and update member records.</p>
    <a class="btn btn-primary" href="./create.php" role="button">New Client</a>
    <br>

    <table class="display" id="">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <!-- Read from database -->
                <?php 
                    include('../config/db.php');

                    // read all rows from database file
                    $sql = "SELECT * FROM members";
                    $result = $conn->query($sql);

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
                                <td>$row[email]</td>
                                <td>$row[email]</td>
                                <td>$row[email]</td>
                                <td>$row[submitted_at]</td>
                                <td>
                                    <a href='./edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
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

