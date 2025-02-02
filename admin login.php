<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "intdb");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Login admin
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loginame = $_POST["loginame"];
  $password = $_POST["password"];

  // Retrieve admin from database
  $query = "SELECT * FROM admin WHERE loginame = '$loginame' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  // Check if admin exists
  if (mysqli_num_rows($result) > 0) {
    // Start session
    session_start();
    $_SESSION["admin login"] = true;
    header("Location: admin home.html");
    exit;
  } else {
    echo "Invalid login name or password!";
  }
}
?>
