<?php
    session_start() ;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tropicana Aquarium</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #0b2438; /* Dark blue background */
                color: #ffffff; /* Default text color - white */
                text-align: center;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #0b2438;
                padding: 15px 30px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }

            .logo img {
                height: 60px;
                width: auto;
            }

            .navi-link {
                display: flex;
                gap: 20px;
            }

            .navbar a {
                text-decoration: none;
                color: #f0f0f0; /* Light gray text for navbar links */
                font-weight: bold;
                font-size: 1rem;
            }

            .navbar a:hover {
                color: #f56b2a; /* Highlight orange on hover */
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

    </body>
</html>