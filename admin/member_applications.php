<?php 
    $pageTitle = "Member Applications";
    include './includes/admin_header.php';
?>

<?php
// Define paths to two documents
$imagePath1 = './uploads/8fobg592f.png'; // Replace with your first image path
$imagePath2 = './uploads/AUDUSD_2023-06-23_20-48-23.png'; // Replace with your second image path
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
                <th>Documents</th>
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
                        <!-- <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal<//?php echo $row['id']; ?>">View Details</button> -->
                        <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View Details</a>
                    </td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#documentModal" class="btn btn-secondary">View Documents</a>

                        <!-- Modal -->
                        <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="documentModalLabel">Document Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img id="documentPreview" src="./uploads/8fobg592f.png" alt="Document" class="img-fluid" />
                                </div>
                                <div class="modal-footer">
                                    <!-- Link to view full image with dynamic href -->
                                    <a id="viewFullImage" href="<?php echo $imagePath1; ?>" target="_blank" class="btn btn-primary">View Full Image</a>
                                    
                                    <!-- Link to download the first image with dynamic href -->
                                    <a id="downloadImage" href="<?php echo $imagePath1; ?>" download class="btn btn-success">Download</a>
                                    
                                    <!-- Button to toggle image -->
                                    <button type="button" class="btn btn-secondary" id="toggleImageBtn">Next Image</button>
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

<script>
    // JS to toggle between images and update links
    var currentImage = 1; // Track current image
    var image1 = "<?php echo $imagePath1; ?>";
    var image2 = "<?php echo $imagePath2; ?>";

    document.getElementById("toggleImageBtn").addEventListener("click", function() {
        // Toggle the image source
        if (currentImage === 1) {
            document.getElementById("documentPreview").src = image2;
            document.getElementById("viewFullImage").href = image2; // Update "View Full Image" link
            document.getElementById("downloadImage").href = image2; // Update "Download" link
            currentImage = 2;
        } else {
            document.getElementById("documentPreview").src = image1;
            document.getElementById("viewFullImage").href = image1; // Update "View Full Image" link
            document.getElementById("downloadImage").href = image1; // Update "Download" link
            currentImage = 1;
        }
    });
</script>

<?php include './includes/admin_footer.php'; ?>



<!-- SEND THE REJECTION EMAIL WHEN THE APPLICATION IS APPROVED OR IF IT IS REJECTED -->