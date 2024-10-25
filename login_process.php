<?php
session_start(); // Start session to track user

// Connect to the database
$host = 'localhost';
$dbname = 'user'; // Your database name
$username = 'root'; // Database username
$password = 'root'; // Database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // Fetch user from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($pass, $row['password'])) {
                $_SESSION['username'] = $user; // Set session variable
                header("Location: main.php"); // Redirect to main.php
                exit(); // Ensure no further code is executed
            } else {
                echo "Invalid login credentials. <a href='login.php'>Try again</a>"; // Show error message if invalid credentials
            }
        } else {
            echo "Invalid login credentials. <a href='login.php'>Try again</a>"; // Show error message if user not found
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
