<?php
session_start();

// Admin protection
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    die("Access denied");
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "try");
if (!$conn) {
    die("Database connection failed");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Validate inputs
    if (empty($_POST['title']) || empty($_POST['author'])) {
        die("All fields are required");
    }

    if (!isset($_FILES['book_file']) || $_FILES['book_file']['error'] !== 0) {
        die("File upload error");
    }

    $title  = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    // File handling
    $fileTmp  = $_FILES['book_file']['tmp_name'];
    $fileName = $_FILES['book_file']['name'];
    $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if ($fileExt !== 'pdf') {
        die("Only PDF files allowed");
    }

  // PRIVATE folder (outside public)
$uploadDir = "../private_books/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$newFileName = uniqid("book_", true) . ".pdf";
$privatePath = $uploadDir . $newFileName;

// Move file
if (!move_uploaded_file($fileTmp, $privatePath)) {
    die("Failed to upload file");
}

// Save ONLY filename to DB
$sql = "INSERT INTO books (title, author, file_path)
        VALUES ('$title', '$author', '$newFileName')";

    // Save PUBLIC path in database
    $sql = "INSERT INTO books (title, author, file_path)
            VALUES ('$title', '$author', '$publicPath')";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php?success=1");
        exit();
    } else {
        die("Database error: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>
