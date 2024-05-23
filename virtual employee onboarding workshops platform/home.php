<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('images/image 11.webp');
            background-size: cover;
            background-position: center;
        }

        header {
            background-color: rgba(0, 0, 0, 0.5); /* Adding some transparency to the header */
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        .main-content {
            text-align: center;
            padding: 50px 0;
            flex: 1;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8); /* Adding some transparency to the footer */
            color: white;
            text-align: center;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-icons {
            margin-bottom: 10px;
        }

        .footer-icons a {
            margin: 0 10px;
            color: white;
            text-decoration: none;
            font-size: 24px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .footer-links a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .footer-contact {
            margin-bottom: 10px;
        }

        .footer-text {
            font-size: 14px;
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049; /* Darker Green */
        }

        .search-bar {
            padding: 8px;
            border-radius: 5px;
            border: none;
            margin-right: 20px;
        }

        .search-button {
            background-color: #555;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <form action="#" method="GET">
            <input type="text" class="search-bar" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
        </form>
    </header>

    <section class="main-content">
        <h1>Welcome to Our Website</h1>
       
        <a href="users register.php" class="button">Get Started</a>
    </section>

    <footer>
        <div class="footer-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Support</a>
        </div>
        <div class="footer-contact">
            <p>Contact us: info@yourwebsite.com | +250 781234567</p>
        </div>
        <div class="footer-text">
            <p>&copy; 2024 Your Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
