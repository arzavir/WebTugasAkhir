<?php
include 'db.php';
include 'auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Articles</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage.php">Manage Articles</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Manage Articles</h1>
        <div class="manage-articles">
            <ul>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li>
                        <a href="edit_article.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                        <a class="delete" href="delete_article.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <a href="add_article.php"><button class="add-article">Add New Article</button></a>
        </div>
    </div>
</body>
</html>
