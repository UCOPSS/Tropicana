<?php
    session_start() ;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tropicana Aquarium</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body{
                font-family: arial, sans-serif;
                background-color: #0b2438;
                color: #ffffff;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center; /* Keeps everything vertically aligned */
                background-color: #0b2438;
                padding: 10px 20px;
            }

            .navbar .logo {
                margin-left: 40px; /* Adds space in front of the logo */
            }

            .navbar .logo img {
                height: 100px; /* Adjust this value for a larger logo */
                width: auto; /* Maintains the aspect ratio */
            }


            .navbar .navi-link {
                display: flex;
                gap: 25px; /* Spacing between navigation links */
            }
        
            .logo img {
                height: 50px; /* Adjusts the logo size */
                vertical-align: middle; /* Ensures the logo stays vertically aligned */
            }

            .navbar a {
                text-decoration: none;
                color: #ffffff;
                font-weight: bold;
                font-size: 1rem; /* Adjust font size if needed */
            }

            .navbar a:hover {
                color: #f56b2a;
            }

            .header {
                position: relative;
                text-align: center;
                color: white;
            }

            .header img {
                width: 100%;
                height: 60%;
            }

            .header-text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(0, 0, 0, 0.6);
                padding: 20px;
                border-radius: 10px;
            }

            .header-text h1 {
                font-size: 3rem;
                margin-bottom: 10px;
            }

            .header-text p {
                font-size: 1.2rem;
            }

            .about-us-section {
                text-align: center;
            }

            .main-content {
                background-image: url('image/bg3.jpg'); /* Replace with your image path */
                background-size: cover; /* Ensures the image covers the container */
                background-repeat: no-repeat; /* Prevents the image from repeating */
                background-position: center; /* Centers the image */
                padding: 20px 20px; /* Adds padding for spacing */
            }

            .about-us-title {
                font-size: 2.5rem;
                color: #f3f3f3 ;
                margin: 5px;
                text-align: center;
            }

            .about-us-container {
                display: flex;
                justify-content: center;
                gap: 20px; /* Space between the boxes */
                padding: 20px;
            }

            .about-us {
                padding: 20px;
                background-color: #ffffff;
                text-align: center;
                max-width: 600px; /* Adjust width for side-by-side layout */
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border-left: 5px solid #0b2438; /* Adds the left border */
            }

            .about-us h1 {
                font-size: 2.5rem;
                color: #333;
                margin-bottom: 20px;
            }

            .about-us h2 {
                font-size: 1.5rem;
                color: #0056b3;
                margin-bottom: 20px;
            }

            .about-us p {
                font-size: 1rem;
                line-height: 1.6;
                margin-bottom: 20px;
                color: black;
            }

            .about-us a {
                color: #f56b2a;
                text-decoration: none;
                font-weight: bold;
            }

            .about-us a:hover {
                text-decoration: underline;
            }

            .sponsor-section {
                text-align: center;
                margin: 20px auto;
                max-width: 800px;
            }

            .sponsor-section h2 {
                font-size: 1.5rem;
                color: #f3f3f3;
                margin-bottom: 10px;
            }

            .sponsor-section img {
                max-width: 150px;
                margin: 10px 0;
            }

            .social-section {
                text-align: center;
                margin: 20px auto;
                max-width: 800px;
            }

            .social-section h2 {
                font-size: 1.5rem;
                color: #f3f3f3;
                margin-bottom: 10px;
            }

            .social-icons {
                display: flex;
                justify-content: center;
                gap: 20px;
            }

            .social-icons a {
                display: inline-block;
                text-decoration: none;
            }

            .social-icons img {
                width: 40px;
                height: 40px;
            }

            footer {
                background-color: rgba(0, 0, 0, 0.6);
                color: #ffffff;
                padding: 20px;
                text-align: center;
                margin-top: 50px;
            }

            footer a {
                color: #f4a51c;
                text-decoration: none;
            }

            footer a:hover {
                text-decoration: underline;
            }

            footer {
                background-color: rgba(0, 0, 0, 0.6); 
                color: white;
                padding: 40px 20px;
                text-align: center;
                font-family: Arial, sans-serif;
            }

            .footer-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                gap: 20px;
                max-width: 1200px;
                margin: 0 auto;
            }

            .footer-section {
                flex: 1;
                min-width: 250px;
                margin: 10px;
            }

            .footer-section h4 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .footer-section ul {
                list-style: none;
                padding: 0;
            }

            .footer-section ul li {
                margin: 5px 0;
            }

            .footer-section ul li a {
                color: white;
                text-decoration: none;
            }

            .footer-section ul li a:hover {
                text-decoration: underline;
            }

            .social-icons {
                display: flex;
                gap: 15px;
                justify-content: center;
                margin-bottom: 15px;
            }

            .social-icons li a {
                font-size: 1.5rem;
                color: white;
                text-decoration: none;
            }

            .social-icons li a:hover {
                color: #f4a51c; /* Orange hover color */
            }

            .social-icons-row {
                display: flex;
                justify-content: center; /* Center the icons */
                align-items: center; /* Vertically align icons */
                gap: 20px; /* Add spacing between icons */
                margin-bottom: 20px; /* Add spacing below the icons */
            }

            .social-icons-row img {
                width: 40px; /* Set the size of the icons */
                height: 40px; /* Maintain a square size */
                object-fit: contain; /* Ensure the images are not distorted */
            }



            .footer-section p {
                font-size: 0.9rem;
                line-height: 1.5;
                margin: 5px 0;
            }

            footer img {
                max-width: 120px;
                margin: 10px;
            }

            
        </style>

    </head>
    <body>
    <div class="navbar">
            <div class="logo">
                <img src="image/aquariumlogo.png" alt="Tropicana Aquarium Logo">
            </div>
            <div class="navi-link">
                <a href="customer_home_page.php">Home</a>
                <a href="customer_Shop_page.php">Shop</a>
                <a href="customer_aboutus_page.php">About Us</a>
                <?php if (isset($_SESSION['customer_Id'])): ?>
                    <a href="customer_profile_page.php">Profile</a>
                    <a href="customer_cart_page.php">Cart</a>
                    <a href="customer_logout.php">Logout</a>
                <?php else: ?>
                    <a href="team_page.php">Our Teams</a>
                    <a href="customer_login_page.html">Login</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="header">
            <img src="image/fish1.webp">
        </div>

        <div class="main-content">
            <div class="about-us-section">
                <h1 class="about-us-title">About Us</h1>
                <div class="about-us-container">
                    <!-- First About Us Box -->
                    <div class="about-us">
                        <h2>Vision!</h2>
                        <p>
                            To be the best place for pet and fishing fans, offering great product and service.
                            We want to make sure everyone feels welcome and find what they need to enjoy their hobbies.
                        </p>
                        <a href="#">Contact Us ></a>
                    </div>
                
                    <!-- Second About Us Box -->
                    <div class="about-us">
                        <h2>Mision!</h2>
                        <p>
                            Make customers happy by giving them the best pet and fishing stuff and helping them out whenever they need.
                            We will keep getting better and making sure we have got what our customers want.
                        </p>
                        <a href="#">Contact Us ></a>
                    </div>
                </div>
            </div>

            <!-- Sponsor Section -->
            <div class="sponsor-section">
                <h2>Tropicana Aquarium is a proud sponsor of:</h2>
                <img src="image/petriologo.png" alt="Pets in the Classroom">
            </div>

            <!-- Social Media Section -->
            <div class="social-section">
                <h2>Join the Conversation</h2>
                <div class="social-icons">
                    <a href="#"><img src="image/facebookicon.png" alt="Facebook"></a>
                    <a href="#"><img src="image/youtubeicon.png" alt="YouTube"></a>
                    <a href="#"><img src="image/instagramicon.png" alt="Instagram"></a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2025 Tropicana Aquarium. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </footer>
    
        <footer>
            <div class="footer-container">
                <div class="footer-section family-of-brands">
                    <h4>Family of Brands</h4>
                    <img src="image/company1.png" alt="Crabby Patty Logo">
                    <img src="image/company2.png" alt="Fiishh Food Logo">
                </div>
    
                <div class="footer-section resource-links">
                    <h4>Resource Links</h4>
                    <ul>
                        <li><a href="#">Care Guides</a></li>
                        <li><a href="#">Instructions & Setup</a></li>
                    </ul>
                </div>
    
                <div class="footer-section legal-links">
                    <!-- Social Icons Row -->
                    <div class="social-icons-row">
                        <img src="image/facebookicon.png" alt="Facebook">
                        <img src="image/youtubeicon.png" alt="YouTube">
                        <img src="image/instagramicon.png" alt="Instagram">
                    </div>
                    <!-- Links -->
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Warranty</a></li>
                    </ul>
                </div>
            
    
                <div class="footer-section contact-us">
                    <h4>Contact Us</h4>
                    <p>Tropicana Aquarium Products<br>Kolej Kerawang<br>21080<br>Kuala Terengganu<br>09-621-6600</p>
                    <p>&copy; 2025 Tropicana Aquarium Inc. All Rights Reserved.<br>All trademarks are either the property of Central Garden & Pet Company, its subsidiaries, divisions, affiliated, and/or related companies or the property of their respective owners.</p>
                </div>
            </div>
        </footer>

    </body>
</html>