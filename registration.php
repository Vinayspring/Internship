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
  $password =$_POST["password"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];

  // Upload photo
  $photo_name = $_FILES["photo"]["name"];
  $photo_tmp_name = $_FILES["photo"]["tmp_name"];
  $photo_size = $_FILES["photo"]["size"];
  $photo_error = $_FILES["photo"]["error"];
  $photo_type = $_FILES["photo"]["type"];

  // Insert user into database
  $query = "INSERT INTO registration (username, password,phone, email, photo) VALUES ('$username', '$password','$phone', '$email', '$photo_name')";
  mysqli_query($conn, $query);
  
   // Redirect to profile page
   header("Location: register.html");
   exit;
}
?>