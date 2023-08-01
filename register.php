<?php
include 'connection.php';
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $mobile = validate($_POST['mobile']);
    $address = validate($_POST['address']);
    $password = validate($_POST['password']);

    if (empty($name)) {
        $errors[] = 'Name is required.';
    }

    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }

    if (empty($mobile)) {
        $errors[] = 'Mobile number is required.';
    } elseif (!preg_match('/^[0-9]{10}$/', $mobile)) {
        $errors[] = 'Invalid mobile number format.';
    }

    if (empty($address)) {
        $errors[] = 'Address is required.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO user (name, email, mobile, address, password) VALUES ('$name', '$email', '$mobile', '$address', '$hashedPassword')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'Registration successful.';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo '<script>';
        foreach ($errors as $error) {
            echo 'alert("' . $error . '");';
        }
        echo '</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form id="registrationForm" onsubmit="return validateForm()" method="post" action="">
            <h1>Quiz Registration</h1>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="mobile">Mobile</label>
                <input type="tel" id="mobile" name="mobile" required>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" name="submit">Register</button>

        </form>
        <div class="extra-links">
            <a href="login.php">Login with us or</a>
            <a href="quiz.php">Take Quiz</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
<style>

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

</style>