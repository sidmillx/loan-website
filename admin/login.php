<?php
session_start();
require_once '../config/db.php';// Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); // "s" specifies the variable type as string
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $password === $user['password']) { 
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        session_regenerate_id(true); // Prevent session fixation

        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-control:focus {
            border-color: #1e3c72;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <h3 class="mb-3">Admin Login</h3>
        <!-- <//?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?> -->
        <?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
        </div>
    <?php endif; ?>
        <form action="#" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>

