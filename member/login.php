<?php
session_start();

require '../config/db.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); // "s" specifies the variable type as string
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify the password (unencrypted)
    if ($user && $password === $user['password']) { 
        // Store user session
        $_SESSION['username'] = $user['username']; // Set the session variable with the username
        
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
    <title>Login</title>

    <style>
      :root {
  --primary-color: #003366;
  --primary-color-light: #004488;
  --text-color: #333;
  --background-color: #f4f4f4;
  --white: #ffffff;
  --error-color: #ff3860;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Arial", sans-serif;
  background-color: var(--background-color);
  color: var(--text-color);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  min-height: 100vh;
}

.container {
  background-color: var(--white);
  padding: 3rem;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  
  width: 100%;
  max-width: 500px;
  
}

.login-form h2 {
  text-align: center;
  color: var(--primary-color);
  margin-bottom: 2rem;
  margin: 10px 0 50px 0;
}

.form-group {
  position: relative;
  margin-bottom: 1.5rem;
}

.form-group input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: var(--text-color);
  border: none;
  border-bottom: 1px solid #ddd;
  outline: none;
  background: transparent;
  transition: border-color 0.2s;
}

.form-group label {
  position: absolute;
  top: 10px;
  left: 0;
  font-size: 16px;
  color: #999;
  pointer-events: none;
  transition: 0.2s ease all;
}

.form-group input:focus ~ label,
.form-group input:valid ~ label {
  top: -20px;
  font-size: 14px;
  color: var(--primary-color);
}

.form-group input:focus {
  border-bottom: 2px solid var(--primary-color);
}

form {
    width: 90%;
}

button {
  width: 100%;
  padding: 10px;
  background-color: var(--primary-color);
  color: var(--white);
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s;
}

button:hover {
  background-color: var(--primary-color-light);
}

@media (max-width: 480px) {
  .container {
    padding: 1rem;
  }
}


.forgot-password {
  display: block;
  text-align: right;
  color: var(--primary-color);
  text-decoration: none;
  font-size: 14px;
  margin: 20px 0;
  transition: color 0.2s;
}

.forgot-password:hover {
  color: var(--primary-color-light);
  text-decoration: underline;
}

.main-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
}
.col-2 {
    max-width: 500px;
    width: 500px;
    height: 600px;
    background: #003366;

    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    height: 600px;
}

.dont-have-account {
    margin: 15px 0;
}


@media (max-width: 768px){
    .col-2 {
        display: none;
    }
    .main-container {
      display: grid;
      grid-template-columns: 1fr;
      width: 85%;
      margin: 0 auto;
    }

}


    </style>
</head>
<body>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <div class="main-container">
        <div class="container">
            <img src="../assets/profile_3135715.png" alt="" style="max-width: 150px;">
            <form id="loginForm" class="login-form" method="POST">
                <h2>Member Login</h2>
                <div class="form-group">
                    <input type="text" id="memberNumber" name="username" required>
                    <label for="memberNumber">Member Number</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="col-2">
        </div>
    </div>
    <div class="dont-have-account">Don't have an account? <a href="#">Apply</a> to be a member!</div>
</body>
</body>
</html>
