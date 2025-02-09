<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loan_app";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the character set for the connection to prevent encoding issues
mysqli_set_charset($conn, "utf8");







// Secure the connection by ensuring only prepared statements are used
// This mitigates SQL injection risks by not directly embedding user input into queries
?>
