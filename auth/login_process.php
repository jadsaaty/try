<?php
// Start session at the very top
session_start();

// --- Database connection ---
$host = "localhost";
$user = "root";
$db_password = "";
$dbname = "try";

$conn = mysqli_connect($host, $user, $db_password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// --- Check if form submitted ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // --- Validate input ---
    if (empty($_POST['email']) || empty($_POST['password'])) {
        die("All fields are required");
    }

    // --- Escape input to prevent SQL injection ---
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // --- Get user from database ---
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    // Check query success
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // --- Check if user exists ---
    if (mysqli_num_rows($result) === 1) {
        $userData = mysqli_fetch_assoc($result);

        // --- Verify password ---
        if (password_verify($password, $userData['PASSWORD'])) {

            // --- Login success ---
            $_SESSION['user_id']   = $userData['id'];
            $_SESSION['user_name'] = $userData['full_name'];
            $_SESSION['user_role'] = $userData['role']; // Store role for admin

            // --- Redirect based on role ---
            if ($_SESSION['user_role'] === 'admin') {
                header("Location: admin_dashboard.php"); // Admin page
            } else {
                header("Location: dashboard.php");       // Normal user page
            }
            exit();

        } else {
            // Wrong password
            die("Invalid email or password");
        }

    } else {
        // Email not found
        die("Invalid email or password");
    }
}

// --- Close connection ---
mysqli_close($conn);
?>
