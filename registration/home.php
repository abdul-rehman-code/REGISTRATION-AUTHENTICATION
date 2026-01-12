<?php
session_start();

// Check if the user is NOT logged in
if (!isset($_SESSION['id'])) {
    // If no session exists, send them back to the login page
    header("Location: signin.php");
    exit();
}
?>

<h2>Welcome, Mr. <?php echo $_SESSION['fname']; ?></h2>
<a href="logout.php">Logout</a>
