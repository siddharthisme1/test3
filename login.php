<?php
include 'connection.php';
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($username) || empty($password)) {
        die('Username and password are required.');
    }

    $sql = "SELECT password FROM user WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        $name = $row['name'];
        if (password_verify($password, $hashedPassword)) {
           
            session_start();
            $_SESSION['username'] = $name;
            header('Location: index.php'); 
            exit;
        } else {
            echo 'Invalid username or password.';
        }
    } else {
        echo 'User not found.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form id="loginForm" onsubmit="return validateForm()" method="post" action="">
            <h1>Login</h1>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="extra-links">
            <a href="register.php">Register with us</a>
            <a href="quiz.php">Take Quiz</a>
        </div>
    </div>
    <script src="script_login.js"></script>
</body>
</html>

<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f2f2f2;
}

.container {
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 8px;
    width: 400px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    margin-bottom: 20px;
}

.input-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

label {
    margin-bottom: 5px;
}

input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
}

button {
    padding: 10px 20px;
    background-color: #00aaff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0077cc;
}
.extra-links {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.extra-links a {
    margin: 0 10px;
    padding: 5px 10px;
    background-color: #0077cc;
    color: #ffffff;
    text-decoration: none;
    border-radius: 4px;
}

.extra-links a:hover {
    background-color: #005faa;
}
</style>