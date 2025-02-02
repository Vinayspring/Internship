<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to login page (or homepage)
header("Location: user Login.html"); // Replace with your login page URL
exit();
?>
