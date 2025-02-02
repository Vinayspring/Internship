<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "intdb");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve registered users
$query = "SELECT * FROM contacts";
$result = mysqli_query($conn, $query);

// Check if query executed successfully
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reviews</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url(./user1.jpg.crdownload);
    }
    
    .container {
      width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    
    th {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Reviews</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["message"]; ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
