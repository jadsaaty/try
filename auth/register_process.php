<?php
$host = "localhost";
$user = "root";
$db_password = "";
$dbname = "try";

$conn = mysqli_connect($host, $user, $db_password, $dbname);
if (!$conn) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST['full_name']) || empty($_POST['email']) || empty($_POST['password'])) {
        die("All fields are required");
    }

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prevent duplicate email
    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        die("Email already registered");
    }

    $sql = "INSERT INTO users (full_name, email, password)
            VALUES ('$full_name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error occurred";
    }
}

mysqli_close($conn);
?>
