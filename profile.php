<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
  header("Location: user login.html");
  exit;
}

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "intdb");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user data
$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM registration WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="styling.css">
</head>
<body>
  <div class="container">
    <h1>Profile</h1>
    <h2>Welcome <?php echo $_SESSION["username"]; ?>!</h2>
    <p>Email: <?php echo $user["email"]; ?></p>
    <p>Phone: <?php echo $user["phone"]; ?></p>
    <img src="<?php echo $user["photo"]; ?>">
    <ul>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="editprofile.php">Edit Profile</a></li>
      <li><a href="changepassword.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</body>
</html>