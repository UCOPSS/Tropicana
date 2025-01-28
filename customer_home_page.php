<?php
    session_start();
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

            .hero {
            text-align: center;
            background-color: #0b2438;
            color: #ffffff;
            padding: 50px 20px;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .hero button {
            padding: 10px 20px;
            background-color: #f4a51c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .hero button:hover {
            background-color: #cc8419;
        }

        .carousel {
            position: relative;
            width: 100%; /* Make the carousel span the full width */
            margin: 0 auto; /* Center the carousel */
            overflow: hidden; /* Hide overflow to ensure clean transitions */
        }

        .carousel-container {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            min-width: 100%;
            height: 10%;
        }

        .carousel img {
            width: 100%; /* Ensure the images fill the carousel width */
            height: 400px; /* Maintain the aspect ratio */
        }

        .carousel .text-overlay {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }

        .carousel .text-overlay h2 {
            margin-bottom: 10px;
        }

        .carousel .text-overlay button {
            padding: 10px 20px;
            background-color: #f56b2a;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #ffffff;
        }

        .carousel .text-overlay button:hover {
            background-color: #cc8419;
        }

        .prev-btn, .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for buttons */
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 18px;
            font-size: 2.5rem;
            z-index: 10;
        }

        .prev-btn {
            left: 20px; /* Position the "Previous" button on the left */
        }

        .next-btn {
            right: 20px; /* Position the "Next" button on the right */
        }

        .prev-btn:hover, .next-btn:hover {
            background-color: rgba(0, 0, 0, 0.8); /* Darker background on hover */
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
        <div class="hero">
            <div class="background-image"></div>
            <div class="hero-content">
                <h1>Welcome to Tropicana Aquarium</h1>
                <p>Explore our selection of premium aquatic products and accessories!</p>
                <button onclick="window.location.href='customer_shop_page.php'">Shop Now</button>
            </div>
        </div>

        <!-- Product Carousel -->
        <div class="carousel">
            <div class="carousel-container">
                <img src="image/aquarium1.jpg" alt="Product 1" class="carousel-item">
                <img src="image/aquarium2.avif" alt="Product 2" class="carousel-item">
                <img src="image/aquarium3.webp" alt="Product 3" class="carousel-item">
            </div>
            <button class="prev-btn">&#8249;</button>
            <button class="next-btn">&#8250;</button>
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

<script>
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');

    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100; // Move to the next image
        carouselContainer.style.transform = `translateX(${offset}%)`;
    }

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % carouselItems.length; // Loop to start
        updateCarousel();
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length; // Loop to end
        updateCarousel();
    });
</script>