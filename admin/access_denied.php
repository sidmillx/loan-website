<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8d7da;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            max-width: 500px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="card shadow-lg p-4 border-danger">
        <div class="card-body">
            <h1 class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Access Denied</h1>
            <p class="lead">You do not have permission to view this page.</p>
            <a href="index.php" class="btn btn-primary">Return to Home</a>
            <a href="login.php" class="btn btn-danger">Login</a>
        </div>
    </div>
</body>
</html>