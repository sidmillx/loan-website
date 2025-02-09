<?php 
    $pageTitle = "Member Applications";
    include './includes/admin_header.php';
?>

<div class="main container mt-5">
    <h2 class="mb-4">Membership Applications Review</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <!-- READ FROM DATABASE -->
            <?php 
                    include('../config/db.php');

                    // read all rows from database file
                    $sql = "SELECT * FROM membership_applications";
                    $result = $conn->query($sql);

                    // check if query executed
                    if (!$result){
                        die("Invalid query: " . $connection->error);
                    }
                ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form method="post" action="update_status.php" class="d-inline">
                            <input type="hidden" name="application_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $row['id']; ?>">View Details</button>
                        <div class="modal fade" id="detailsModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="detailsModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailsModalLabel<?php echo $row['id']; ?>">Member Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p>
                                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                        <p><strong>ID Number:</strong> <?php echo $row['id_number']; ?></p>
                                        <p><strong>Residential Address:</strong> <?php echo $row['residential_address']; ?></p>
                                        <p><strong>Phone Number:</strong> <?php echo $row['contact_details']; ?></p>
                                        <p><strong>Application Date:</strong> <?php echo $row['applied_at']; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include './includes/admin_footer.php'; ?>



<!-- SEND THE REJECTION EMAIL WHEN THE APPLICATION IS APPROVED OR IF IT IS REJECTED -->