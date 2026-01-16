<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    die("Access denied");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book (Admin)</title>
</head>
<body>

<h2>Add New Book</h2>

<form action="add_books_process.php" method="POST" enctype="multipart/form-data">
    
    <label>Book Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Author</label><br>
    <input type="text" name="author" required><br><br>

    <label>Book File (PDF)</label><br>
    <input type="file" name="book_file" accept=".pdf" required><br><br>

    <button type="submit">Add Book</button>

</form>

</body>
</html>
