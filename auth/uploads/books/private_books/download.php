<?php
session_start();

// Only logged-in users allowed
if (!isset($_SESSION['user_id'])) {
    die("Access denied");
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "try");
if (!$conn) {
    die("Database error");
}

// Validate request
if (!isset($_GET['id'])) {
    die("Invalid request");
}

$bookId = (int)$_GET['id'];

// Get book
$result = mysqli_query($conn, "SELECT * FROM books WHERE id=$bookId");
$book = mysqli_fetch_assoc($result);

if (!$book) {
    die("Book not found");
}

// File location
$filePath = __DIR__ . "/private_books/" . $book['file_path'];

if (!file_exists($filePath)) {
    die("File missing");
}

// Force download
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
header("Content-Length: " . filesize($filePath));
readfile($filePath);
exit();
