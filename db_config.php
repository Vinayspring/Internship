<?php
// Database configuration
$servername = "localhost";  // Database host
$username = "root";         // Database username
$password = "";             // Database password (leave empty for local development)
$dbname = "intdb";      // Database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
