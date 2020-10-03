<?php
session_start();
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header('Location: index.php');
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Привет, <?php echo $name; ?>!</p>
    <a href="logout.php">logout</a>
</body>
</html>