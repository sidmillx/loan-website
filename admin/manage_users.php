<!-- <//?php
//session_start();
//require '../config/db.php'; // Database connection -->

<!-- // Check if admin is logged in
// if (!isset($_SESSION['admin_logged_in'])) {
//     header("Location: login.php");
//     exit();
// }

// Fetch all users
// $sql = "SELECT username, password FROM users";
// $result = $conn->query($sql);
// ?> -->



<?php
include '../config/db.php';

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Users</h2>

    <!-- Add New User Form -->
    <div class="card p-4 mb-4">
        <h4>Add New User</h4>
        <form action="add_user.php" method="POST" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="col-md-2">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-2">
                <select name="role" class="form-select">
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Add User</button>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Member ID</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo ucfirst($row['role']); ?></td>
                       
                        <td>
                            <div class="d-flex gap-2">
    
                                <!-- Update Password Button (Redirects to update_password.php) -->
                                <a href="update_password.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                    Update Password
                                </a>


                                <!-- Delete Form -->
                                <form action="delete_user.php?id=<?php echo $row['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <!-- Block/Unblock Form -->
                                
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function setUserId(id) {
        document.getElementById('userId').value = id;
    }
</script>

</body>
</html>
