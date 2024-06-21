<?php
include 'db.php';
include 'auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();

header('Location: manage.php');
exit();
?>
