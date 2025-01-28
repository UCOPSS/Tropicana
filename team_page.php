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

            .org-chart {
            text-align: center;
            color: #fff; /* Text color for cards */
            margin-top: 200px; /* Adjust for the height of the fixed header */
            margin-bottom: 100px; /* Added margin at the bottom */
            max-width: 800px; /* Adjust as needed */
            padding: 20px;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Box shadow for depth */
            margin: auto; /* Center horizontally */
            position: absolute; /* Positioning to center */
            left: 0;
            right: 0;
            width: 50%; /* Adjust width as needed */
            bottom: 10%;
        }

        .org-chart ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .org-chart ul ul {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            padding-left: 0;
        }

        .org-chart li {
            display: inline-block;
            margin: 0 20px;
            position: relative;
            width: 250px; /* Card width increased */
            transition: transform 0.3s ease;
        }

        .org-chart li:hover {
            transform: translateY(-10px); /* Lift on hover */
        }

        /* Different hover styles for each card */
        .org-chart .card:nth-child(odd):hover {
            background-color: #ffa07a; /* Light salmon */
            transform: scale(1.05); /* Scale effect */
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .org-chart .card:nth-child(even):hover {
            background-color: #add8e6; /* Light blue */
            transform: scale(1.05); /* Scale effect */
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .org-chart .card:nth-child(3):hover {
            background-color: #90ee90; /* Light green */
            transform: scale(1.05); /* Scale effect */
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .org-chart .card:nth-child(4):hover {
            background-color: #ffb6c1; /* Light pink */
            transform: scale(1.05); /* Scale effect */
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .org-chart .card h2 {
            font-weight: bold;
            margin: 0 0 10px;
            font-size: 18px;
            color: #007bff; /* Heading color */
        }

        .org-chart .card p {
            font-size: 15px;
            color: white;
            margin: 5px 0;
        }

        .node-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px auto; /* Center images */
            display: block;
            object-fit: cover;
            border: 3px solid #007bff; /* Border around images */
            transition: transform 0.3s ease;
        }

        .node-image:hover {
            transform: scale(1.1); /* Scale image on hover */
        }

        .org-chart h3 {
            font-size: 40px;
            margin: 0 0 30px;
            color: #fff;
            text-shadow: -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000, 2px 2px 0 #000; /* Text shadow for title */
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

        <div class="org-chart">
            <h3>Our Development Team</h3>
            <ul>
                <li>
                    <div class="card">
                        <h2>Project Manager</h2>
                        <img src="image/mastura.jpg" alt="Mastura" class="node-image">
                        <p>Nur Mastura Munirah Binti Mat Yaakub</p>
                        <p>mastura@gmail.com</p>
                    </div>
                    <ul>
                        <li>
                            <div class="card">
                                <h2>UI Designer</h2>
                                <img src="image/rusyada.jpg" alt="Rusyada" class="node-image">
                                <p>Rusyada Aina Binti Rosman</p>
                                <p>rusyada@gmail.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <h2>System Analyst</h2>
                                <img src="image/yusof.jpg" alt="Usop" class="node-image">
                                <p>Wan Muhamad Yusof Bin Wan Yahya</p>
                                <p>usop@gmail.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <h2>Programmer</h2>
                                <img src="image/azran.jpg" alt="Azran" class="node-image">
                                <p>Muhammad Azran Bin Imran</p>
                                <p>azran@gmail.com</p>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </body>
</html>