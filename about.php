<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Ahmed Zagral</title>
    <link rel="stylesheet" href="aboutmestyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
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
    
    <div class="container">
        <!-- Left panel with profile picture -->
        <div class="left-panel">
            <div class="circle-outer">
                <div class="circle">
                    <img src="Profile.png" alt="Profile Picture" class="profile-pic">
                </div>
            </div>
        </div>

        <!-- Right panel with about info and skills -->
        <div class="right-panel">
            <h1 class="section-title">My Personal Information</h1>
            <h2 class="about-name">Ahmed Zagral</h2>
            <h3 class="about-title">Computer Science Student</h3>
            <p class="about-description">
                Driven by curiosity and a passion for innovation, I am constantly seeking out new challenges that push me to think outside the box. 
                My goal is to create solutions that not only solve technical problems but also enhance user experience. With a sharp eye for design 
                and a strong grasp of backend technologies, I strive to contribute meaningfully to the ever-evolving world of technology.
            </p>
            <a href="contact.php" class="contact-me-button">Contact Me</a>

            <!-- Skills section -->
            <h3 class="skills-title">My Skills Are</h3>
            <div class="skills-icons">
                <div class="skill">
                    <i class="fab fa-html5"></i>
                    <span class="tooltip">HTML5</span>
                </div>
                <div class="skill">
                    <i class="fab fa-css3-alt"></i>
                    <span class="tooltip">CSS3</span>
                </div>
                <div class="skill">
                    <i class="fab fa-js-square"></i>
                    <span class="tooltip">JavaScript</span>
                </div>
                <div class="skill">
                    <i class="fab fa-python"></i>
                    <span class="tooltip">Python</span>
                </div>
                <div class="skill">
                    <i class="fab fa-java"></i>
                    <span class="tooltip">Java</span>
                </div>
                <div class="skill">
                    <i class="fab fa-linux"></i>
                    <span class="tooltip">Linux</span>
                </div>
                <div class="skill">
                    <i class="fab fa-react"></i>
                    <span class="tooltip">React</span>
                </div>
                <div class="skill">
                    <i class="fab fa-node-js"></i>
                    <span class="tooltip">Node.js</span>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Ahmed Zagral. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
