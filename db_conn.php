<?php
$servername = "localhost";
$username = "user"; // WAMP default username
$password = "root"; // Your database password
$dbname = "user"; // Name of the database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
