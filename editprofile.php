<?php
// Assuming you have already started the session
session_start();
require_once 'db_connection.php'; // Include your database connection file

// Fetch the user's information from the database using the session's username
$username = $_SESSION["username"];
$query = "SELECT * FROM registration WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the user data in the database
    $updateQuery = "UPDATE registration SET email = '$email', phone = '$phone' WHERE username = '$username'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <link rel="stylesheet" href="styling.css">
</head>
<body>
  <div class="container">
    <h1>Edit Profile</h1>
    <form method="POST" action="editprofile.php">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required><br><br>
      
      <label for="phone">Phone:</label>
      <input type="text" name="phone" id="phone" value="<?php echo $user['phone']; ?>" required><br><br>
      
      <input type="submit" value="Update Profile">
    </form>
    <a href="profile.php">Back to Profile</a>
  </div>
</body>
</html>
