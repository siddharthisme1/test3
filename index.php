<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header('Location: login.php'); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <div class="extra-links">
            <a href="add.php">Add Quiz</a>
            <a href="quiz.php">Take Quiz</a>
        </div>
    <!-- <a href="logout.php">Logout</a> -->
</body>
</html>
<style>
    
</style>
