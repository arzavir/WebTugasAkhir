<?php
include 'db.php';
include 'auth.php';

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
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
                <?php if (is_logged_in()): ?>
                    <li><a href="manage.php">Manage Articles</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Quotes</h1>
        <?php while($row = $result->fetch_assoc()): ?>
            <h2><?php echo $row['title']; ?></h2>
            <?php if (!empty($row['image'])): ?>
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            <?php endif; ?>
            <p><?php echo $row['content']; ?></p>
            <hr>
        <?php endwhile; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
