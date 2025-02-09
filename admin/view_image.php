<?php
include '../config/db.php'; // Your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT file_path FROM uploaded_files WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $filePath = $row['file_path'];
    } else {
        echo "Image not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Image</title>
    <style>
        body { text-align: center; background-color: #f9f9f9; padding: 20px; }
        img { max-width: 90%; height: auto; border: 2px solid #ccc; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h2>Full Image View</h2>
<img src="<?php echo $filePath; ?>" alt="Full Image">

<br>
<a href="<?php echo $filePath; ?>" download class="btn">Download Image</a>

</body>
</html>
