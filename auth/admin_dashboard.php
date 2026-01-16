<?php
require "admin_guard.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>🔐 Admin Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user_name']; ?>!</p>

<ul>
    <li><a href="add_books.php">Add Books</a></li>
    <li><a href="add_users.php">Add Users / Roles</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
