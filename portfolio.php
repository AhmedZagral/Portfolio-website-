<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahmed Zagral - Portfolio</title>
    <link rel="stylesheet" href="portfolio.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Great+Vibes&family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="name-corner">
            <a href="main.php">&lt; Ahmed Zagral &gt;</a>
        </div>
        <div class="menu">
            <a href="main.php" class="nav-button">Home</a>
            <a href="about.php" class="nav-button">About Me</a>
            <a href="portfolio.php" class="nav-button">Portfolio</a>
            <a href="contact.php" class="nav-button">Contact</a>
            <a href="logout.php" class="nav-button">Logout</a> <!-- Logout Link -->
        </div>
    </nav>
    
    <!-- Portfolio Section -->
    <div class="portfolio-container">
        <!-- Left Side: Project Information -->
        <div class="left-panel">
            <h1>Portfolio</h1>
            <h2>Projects</h2>
            <div class="project-details">
                <h3>Student Profile Management</h3>
                <p>A Python GUI application using SQLite3 for streamlined student profile management. It allows performing CRUD operations and visualizing student data. This project showcases my skills in Python, database management, and user interface design.</p>
                <button class="view-project-btn" onclick="window.open('https://github.com/AhmedZagral/Student-managment-system-using-gui', '_blank')">View Project</button>
            </div>
        </div>
        
        <!-- Right Side: Project Image -->
        <div class="right-panel">
            <div class="project-image-card">
                <img src="project.jpg" alt="Student Profile Management Project" class="project-image">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Ahmed Zagral</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
