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
    <style>
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
    <a href="download.php?id=<?= $book['id'] ?>">Download</a>
    

</div>

<a href="/auth/dashboard.php"><button>Back</button></a>

</body>
</html>
