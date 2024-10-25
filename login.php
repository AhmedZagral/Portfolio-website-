<?php
session_start();

// Connect to the database
$host = 'localhost';
$dbname = 'user'; 
$username = 'root'; 
$password = 'root'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['username'] = $user;
            $_SESSION['is_admin'] = ($row['role'] === 'admin');

            if ($_SESSION['is_admin']) {
                header("Location: admin.php");
            } else {
                header("Location: main.php");
            }
            exit();
        } else {
            echo "Invalid login credentials. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "Invalid login credentials. <a href='login.php'>Try again</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1C1C1C; /* Set background color */
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
        .login-frame h1 {
            margin-bottom: 20px;
            color: #0ef; /* Bright color for login heading */
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
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="registration.php">New user? Register here.</a>
    </div>
</body>
</html>
