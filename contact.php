<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Ahmed Zagral</title>
    <link rel="stylesheet" href="contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
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
            <a href="contact.php" class="nav-button active">Contact</a>
            <a href="logout.php" class="nav-button">Logout</a> <!-- Logout Link -->
        </div>
    </nav>

    <!-- Contact Section -->
    <div class="contact-section">
        <div class="left-panel">
            <h1>Let's Chat. <br> Tell me about your project!</h1>
            <p>Let's create something awesome together 🚀</p>
            <p>Reach me via:</p>
            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> <a href="mailto:ahmedzagral@gmail.com">ahmedzagral@gmail.com</a></p>
            </div>
        </div>
        <div class="right-panel">
            <h2>Send me a message <i class="fas fa-rocket"></i></h2>
            <form action="https://formsubmit.co/zagralahmed@gmail.com" method="POST">
                <input type="text" name="name" placeholder="Full name" required>
                <input type="email" name="email" placeholder="Email address" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" placeholder="Tell me more about your project" required></textarea>
                <button type="submit" class="send-btn">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Ahmed Zagral | All rights reserved</p>
    </footer>
</body>
</html>
