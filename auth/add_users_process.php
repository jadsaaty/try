<?php
require "admin_guard.php";

$host = "localhost";
$user = "root";
$db_password = "";
$dbname = "try";

$conn = mysqli_connect($host, $user, $db_password, $dbname);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$role  = mysqli_real_escape_string($conn, $_POST['role']);

// Check if user exists
$result = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
if (mysqli_num_rows($result) === 1) {
    // Update role
    mysqli_query($conn, "UPDATE users SET role='$role' WHERE email='$email'");
    echo "User role updated ✅";
} else {
    echo "User not found!";
}

mysqli_close($conn);
?>
