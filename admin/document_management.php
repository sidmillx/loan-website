<?php 
    $pageTitle = "Document Management";
    include './includes/admin_header.php';
    include '../config/db.php';
?>

<div class="main p-3">
    <h2>Document Management</h2>
    <p>Review and verify submitted documents (such as identity proofs and income verification) from member applications and loan requests.</p>
    <!-- Insert document lists with options to view/download or verify documents -->
    <div>
        <?php 
            $sql = "SELECT id, file_path FROM uploaded_files"; // replace id with dynamic id
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    
                    echo '<a href="view_image.php?id=' . $row["id"] . '">
                    <img src="' . $row["file_path"] . '" alt="Uploaded File" style="width:200px;height:auto; margin: 10px;">
                    </a>';
                }
        } else {
            echo "No files uploaded";
        }
        
        $conn->close();
        ?>
    </div>
</div>
<?php include './includes/admin_footer.php'; ?>
