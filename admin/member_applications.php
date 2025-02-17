<?php 
    $pageTitle = "Member Applications";
    include './includes/admin_header.php';
?>

<?php
// Define paths to two documents
$imagePath1 = './uploads/8fobg592f.png'; // Replace with your first image path
$imagePath2 = './uploads/AUDUSD_2023-06-23_20-48-23.png'; // Replace with your second image path
?>

<div class="main membership-application-container">
    <h2 class="mb-4">Membership Applications Review</h2>
    <table class="table table-bordered display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <!-- <th>Email</th> -->
                <!-- <th>Status</th> -->
                <th>Actions</th>
                <th>Details</th>
                <th>Documents</th>
            </tr>
        </thead>
        <tbody>
            <!-- READ FROM DATABASE -->
            <?php 
                    include('../config/db.php');

                    // read all rows from database file
                    $sql = "SELECT * FROM membership_applications WHERE status != 'approved'";
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
                    <!-- <td><//?php echo $row['email']; ?></td> -->
                    <!-- <td><//?php echo $row['status']; ?></td> -->
                    <td>
                        <form method="post" action="update_status.php" class="d-inline">
                            <input type="hidden" name="application_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="action" value="add_to_members" class="btn btn-success btn-sm">Add to Members</button>
                            <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td>
                        <!-- <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal<//?php echo $row['id']; ?>">View Details</button> -->
                        <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View Details</a>
                    </td>
                    <td>
                        <a href="./document_management.php?search_id=<?php echo $row['id']; ?>" class="btn btn-secondary">View Documents</a>

                       
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<script>
    function showDocumentModal(filePath) {
        const imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const pdfExtensions = ['pdf'];
        
        let fileExtension = filePath.split('.').pop().toLowerCase();
        let documentPreview = document.getElementById('documentPreview');
        let pdfPreview = document.getElementById('pdfPreview');
        let viewFullDocument = document.getElementById('viewFullDocument');
        let downloadDocument = document.getElementById('downloadDocument');
        
        if (imageExtensions.includes(fileExtension)) {
            documentPreview.src = filePath;
            documentPreview.classList.remove('d-none');
            pdfPreview.classList.add('d-none');
        } else if (pdfExtensions.includes(fileExtension)) {
            pdfPreview.src = filePath;
            pdfPreview.classList.remove('d-none');
            documentPreview.classList.add('d-none');
        }
        
        viewFullDocument.href = filePath;
        downloadDocument.href = filePath;
        
        var modal = new bootstrap.Modal(document.getElementById('documentModal'));
        modal.show();
    }
</script>


<?php include './includes/admin_footer.php'; ?>



<!-- SEND THE REJECTION EMAIL WHEN THE APPLICATION IS APPROVED OR IF IT IS REJECTED -->