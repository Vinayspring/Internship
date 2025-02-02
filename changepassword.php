<?php
// Assuming you have already started the session
session_start();
require_once 'db_connection.php'; // Include your database connection file

// Fetch the user's current data
$username = $_SESSION["username"];
$query = "SELECT * FROM registration WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the current password matches the stored password (using password_verify)
    if (password_verify($current_password, $user['password'])) {
        if ($new_password === $confirm_password) {
            
            // Hash the new password before storing it
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Update the password in the database
            $updateQuery = "UPDATE registration SET password = '$hashed_new_password' WHERE username = '$username'";
            
            if (mysqli_query($conn, $updateQuery)) {
                echo "Password updated successfully!";
            } else {
                echo "Error updating password!";
            }
        } else {
            echo "New passwords do not match!";
        }
    } else {
        echo "Current password is incorrect!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="styling.css">
</head>
<body>
  <div class="container">
    <h1>Change Password</h1>
    <form method="POST" action="changepassword.php">
      <label for="current_password">Current Password:</label>
      <input type="password" name="current_password" id="current_password" required><br><br>
      
      <label for="new_password">New Password:</label>
      <input type="password" name="new_password" id="new_password" required><br><br>
      
      <label for="confirm_password">Confirm New Password:</label>
      <input type="password" name="confirm_password" id="confirm_password" required><br><br>
      
      <input type="submit" value="Change Password">
    </form>
    <a href="profile.php">Back to Profile</a>
  </div>
</body>
</html>
