<?php
session_start(); // Start session to track user

// Connect to the database
$host = 'localhost';
$dbname = 'user'; // Your database name
$username = 'root'; // Database username
$password = 'root'; // Database password

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // Hash the password
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            header("Location: login.php"); // Redirect to login page after successful registration
            exit();
        } else {
            echo "Error registering user.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1C1C1C; /* Same background color as login page */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-frame {
            background-color: #000; /* Background for the form */
            padding: 30px 20px;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 350px; /* Set a fixed width for the form */
            color: #fff;
        }
        .login-frame h1 {overflow-x: ;
            margin-bottom: 20px;
            color: #0ef; /* Bright color for registration heading */
        }
        .login-frame form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-frame input {
            width: 90%; /* Reduce width for better alignment */
            max-width: 300px; /* Ensure it doesn't exceed the box width */
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        .login-frame button {
            width: 90%;
            max-width: 300px; /* Ensure button width is in sync with input fields */
            padding: 12px;
            margin-top: 20px;
            background-color: #2E8BC0; /* Bright color for the button */
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-frame button:hover {
            background-color: #fff;
            color: #2E8BC0;
        }
        .login-frame a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #0ef;
        }
        .login-frame a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-frame">
        <h1>Register</h1>
        <form action="registration.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <a href="login.php">Already have an account? Login here.</a>
    </div>
</body>
</html>
