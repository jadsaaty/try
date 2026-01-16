<?php
// Book data
$book = [
    "title" => "Atomic Habits",
    "author" => "James Clear",
    "image" => "https://covers.openlibrary.org/b/isbn/9780735211292-L.jpg",
    "description" => "An easy & proven way to build good habits and break bad ones."
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
   
<header>
  <h1 class="wel-msg">Welcome to Your Digital Library!</h1>

  <nav class="navbar">
    <a href="/auth/dashboard.php">Home</a>
    <a href="/auth/uploads/books/books1.php">Books</a>
    <a href="/auth/authors.php">Authors</a>
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
    .hero {
      background-color: #f4f4f4;
      padding: 20px;
      text-align: center;
      margin: 10px; 
        border-radius: 8px solid #ccc;
    }
    .log-out {
      text-align: center;
      margin-top: 30px;
    }
    .log-out p {
      font-size: 20px;
      font-weight: bold;
      height: 40px;
    }
    .log-out button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .log-out button:hover {
      background-color: #45a049;
      transform: translateY(2px);
    }

    .log-out button:active{
        transform: translateY(2px);
        color:black;
    }
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .book-card {
            width: 300px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin: 50px auto;
            text-align: center;
        }
        .book-card img {
            width: 100%;
            border-radius: 8px;
        }
        h2 {
            margin: 10px 0;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>

<div class="book-card">
    <img src="<?php echo $book['image']; ?>" alt="Atomic Habits">
    <h2><?php echo $book['title']; ?></h2>
    <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
    <p><?php echo $book['description']; ?></p>
</div>

<div class="book-card">
    <img src="<?php echo $book['image']; ?>" alt="Atomic Habits">
    <h2><?php echo $book['title']; ?></h2>
    <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
    <p><?php echo $book['description']; ?></p>

</div>



</body>
</html>
