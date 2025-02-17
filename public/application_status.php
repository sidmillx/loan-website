<?php
$successMessage = isset($_GET['success']) ? $_GET['success'] : '';
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgba(248, 249, 250, 0.75);
        }
        .status-container {
            max-width: 500px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="status-container bg-white p-4">
            <?php if ($successMessage): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($successMessage); ?>
                </div>
                <a href="./index.html" class="btn btn-primary">Go Back</a>
            <?php elseif ($errorMessage): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
                <a href="./membership-apply.php" class="btn btn-danger">Try Again</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
