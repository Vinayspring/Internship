<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "intdb");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Login user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password= $_POST["password"];

  // Retrieve user from database
  $query = "SELECT * FROM registration WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);

    // Start session
    session_start();
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];

    // Redirect to profile page
    header("Location: userhome.html");
    exit;
  } else {
    echo "Invalid email or password!";
  }
?>