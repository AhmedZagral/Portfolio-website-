<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahmed Zagral Portfolio</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Great+Vibes&family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <a href="main.php">Home</a> 
        <a href="about.php">About Me</a> 
        <a href="portfolio.php">Portfolio</a> 
        <a href="contact.php" class="contact-button">Contact</a> 
        <a href="logout.php">Logout</a> 
    </nav>

    <!-- Top left corner with your name in cursive enclosed in <> -->
    <div class="name-corner">
        &lt; Ahmed Zagral &gt;
    </div>

    <div class="container">
        <div class="left-panel">
            <div class="circle-outermost">
                <div class="circle-outer">
                    <div class="circle-inner">
                        <div class="circle">
                            <img src="Profile.png" alt="Profile Picture" class="profile-pic">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-panel">
            <h1 class="fade-in">Ahmed Zagral</h1>
            <p id="typewriter-text" class="fade-in">Computer Science Enthusiast</p>
            <button class="download-btn fade-in" onclick="window.open('CV.pdf', '_blank')">Download CV</button>
            <div class="social-icons fade-in">
                <a href="https://github.com/AhmedZagral" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/in/AhmedZagral" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="mailto:ahmedzagral@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </div>

    <!-- Link the external JavaScript file -->
    <script src="script.js"></script>
</body>
</html>
