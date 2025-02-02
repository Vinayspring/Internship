<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "intdb");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $college_name=$_POST["college_name"];
  $sports = $_POST["sports"];

  // Insert user into database
  $query = "INSERT INTO register (username,phone, email, college_name,sports) VALUES ('$username','$phone', '$email', '$college_name','$sports')";
  mysqli_query($conn, $query);
  
   // Redirect to profile page
   header("Location: register1.html");
   exit;
}
?>