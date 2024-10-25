<?php
session_start(); // Start the session

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php'); // Redirect to login if not admin
    exit();
}

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete user request
if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
}

// Handle add user request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $newRole = $_POST['new_role'];

    // Insert new user
    $insertQuery = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('ssss', $newUsername, $newEmail, $newPassword, $newRole);
    $stmt->execute();
}

// Fetch all users
$userQuery = "SELECT * FROM users";
$result = $conn->query($userQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1C1C1C; /* Matches the website theme */
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Title styling */
        .admin-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #0ef; /* Accent color for 'Admin' */
        }

        .management-title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #fff;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        nav a {
            background-color: #2E8BC0;
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #fff;
            color: #2E8BC0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            gap: 30px;
        }

        h1 {
            color: #0ef; /* Matches website accent color */
            text-align: center;
        }

        .table-container {
            width: 60%;
            display: flex;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #2E8BC0; /* Header background color matching theme */
            color: white;
        }

        td {
            background-color: #333;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .form-container {
            width: 25%; 
            background-color: #292929;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .form-container h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #444;
            color: #fff;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #2E8BC0;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        .form-container button:hover {
            background-color: #fff;
            color: #2E8BC0;
        }

        .logout-link {
            text-align: right;
            margin-top: 20px;
            color: #0ef;
        }

        /* Styling for the Ahmed Zagral top-left text */
        .name-corner {
            position: absolute;
            top: 10px;
            left: 10px;
            font-family: 'Great Vibes', cursive;
            font-size: 24px;
            color: #0ef;
        }

        /* Added spacing for yellow title */
        .yellow-title {
            text-align: center;
            font-size: 24px;
            color: yellow;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Styled name in the top-left corner -->
    <div class="name-corner">&lt; Ahmed Zagral &gt;</div>

    <!-- Title 'Admin' -->

    <div class="admin-title">Admin</div>
    <div class="management-title">User Management</div>

    <!-- Navigation Bar with an extra link to Portfolio -->
    <nav class="navbar">
        <a href="main.php">Home</a>
        <a href="about.php">About Me</a>
        <a href="portfolio.php">Portfolio</a> <!-- Admin can now view portfolio -->
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
    </nav>

    <!-- Centered User Management Section -->
    <div class="container">
        <!-- User Management Table -->
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <!-- Fetch user data from the database -->
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td>
                        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-button">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <!-- Add New User Form -->
        <div class="form-container">
            <h2>Add New User</h2>
            <form action="admin.php" method="POST">
                <input type="text" name="new_username" placeholder="Username" required>
                <input type="email" name="new_email" placeholder="Email" required>
                <input type="password" name="new_password" placeholder="Password" required>
                <select name="new_role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="add_user">Add User</button>
            </form>
            <p class="logout-link"><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
