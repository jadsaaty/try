<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "try");
if (!$conn) {
    die("Database connection failed");
}

// Get authors and their books
$sql = "
    SELECT author, GROUP_CONCAT(title SEPARATOR '||') AS books
    FROM books
    GROUP BY author
    ORDER BY author ASC
";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="download.png">
<header>
  <h1 class="wel-msg">Welcome to Your Digital Library!</h1>

  <nav class="navbar">
    <a href="dashboard.php">Home</a>
    <a href="uploads/books/books1.php">Books</a>
    <a href="authors.php">Authors</a>
    <a href="categories.html">Categories</a>
    <a href="profile.html">My Profile</a>
  </nav>
  <style>
    *{
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #e9ecef;
      margin: 0;
      padding: 0;
    }
    .wel-msg {
      color: #4CAF50;
      text-align: center;
    }
    .navbar {
      display: flex;
      justify-content: center;
      gap:20px;
     
    }
    .navbar a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    .navbar a:hover {
      color: #4CAF50;
    }

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .authors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: auto;
        }

        .author-card {
            background: #fff;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .author-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.12);
        }

        .author-card h2 {
            margin-top: 0;
            color: #34495e;
            font-size: 1.2em;
        }

        .author-card ul {
            padding-left: 18px;
            margin: 10px 0 0;
        }

        .author-card li {
            color: #555;
            font-size: 0.95em;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

<h1>✍️ Our Authors</h1>

<div class="authors-grid">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="author-card">
            <h2><?= htmlspecialchars($row['author']) ?></h2>

            <strong>Books:</strong>
            <ul>
                <?php
                $books = explode("||", $row['books']);
                foreach ($books as $book) {
                    echo "<li>" . htmlspecialchars($book) . "</li>";
                }
                ?>
            </ul>
        </div>
    <?php } ?>
</div>

</body>
</html>
