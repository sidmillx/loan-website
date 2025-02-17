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

    $pageTitle = "Document Management";
    include './includes/admin_header.php';
    require_once '../config/db.php';
?>

<div class="main p-3">
    <h2>Document Management</h2>
    <p>Review and verify submitted documents (such as identity proofs and income verification) from member applications and loan requests.</p>
    <!-- Insert document lists with options to view/download or verify documents -->
    <!-- Search Form -->
    <form method="GET" action="">
        <input type="text" name="search_id" placeholder="Enter ID to search" required>
        <button type="submit" class="btn btn-secondary" style="margin: 20px 0;">Search</button>

        <?php if (isset($_GET['search_id']) && !empty($_GET['search_id'])): ?>
            <a href="./document_management.php" style="margin-left: 10px;">
                <button type="button" class="btn btn-info">View All Images</button>
            </a>
        <?php endif; ?>
    </form>

    <div id="docs-management">
    <?php 
    // Check if search ID is provided
    $search_id = isset($_GET['search_id']) ? $conn->real_escape_string($_GET['search_id']) : '';

    // Refined Query to get documents without duplicates
    $sql = "
    SELECT DISTINCT
        u.applicant_id, 
        u.loan_id, 
        u.file_path, 
        ma.full_name AS applicant_full_name, 
        m.full_name AS loan_taker_full_name
    FROM uploads u
    LEFT JOIN membership_applications ma ON ma.id = u.applicant_id
    LEFT JOIN loans l ON l.loan_id = u.loan_id
    LEFT JOIN members m ON m.id = l.member_id
    WHERE ('$search_id' = '' OR u.applicant_id = '$search_id' OR u.loan_id = '$search_id')
    ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $file_path = $row["file_path"];
            $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

            echo '<div class="doc-item">';

            // Check if it's a PDF
            if ($file_extension == "pdf") {
                echo '<a href="' . $file_path . '" target="_blank">
                        <img src="../assets/pdf-icon.png" alt="PDF File">
                      </a>';
            } else {
                // Show actual image if it's not a PDF
                echo '<a href="view_image.php?id=' . $row["applicant_id"] . '">
                        <img src="' . $file_path . '" alt="Uploaded File">
                      </a>';
            }

            // Display Fullname
            if (!is_null($row["applicant_full_name"])) {
                echo '<p>Fullname: ' . $row["applicant_full_name"] . '</p>';
            } elseif (!is_null($row["loan_taker_full_name"])) {
                echo '<p>Fullname: ' . $row["loan_taker_full_name"] . '</p>';
            }

            // Display either the applicant_id or loan_id depending on which one is not null
            if ($row["applicant_id"] != NULL) {
                echo '<p>Applicant ID: ' . $row["applicant_id"] . '</p>';
            } else {
                echo '<p>Loan ID: ' . $row["loan_id"] . '</p>';
            }

            echo '</div>'; // Close doc-item div
        }
    } else {
        echo "No files found.";
    }

    $conn->close();
    ?>

</div>
<?php include './includes/admin_footer.php'; ?>
