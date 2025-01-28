<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['customer_Id'])) {
        echo "<script>
            alert('Please log in to view your profile.');
            window.location.href = 'customer_login_page.html';
        </script>";
        exit();
    }
    // retrive user detail from session.
    $customer_name = $_SESSION['customer_name'];
    $customer_id = $_SESSION['customer_Id'];
    $customer_email = $_SESSION['customer_email'];
    $customer_address = $_SESSION['customer_address'];
    $customer_phonenum = $_SESSION['customer_phonenum'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #0b2438;
                color: #ffffff;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center; /* Keeps everything vertically aligned */
                background-color: #0b2438;
                padding: 15px 30px; /* Added more padding for better spacing */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow for visual separation */
            }

            .logo img {
                height: 60px; /* Adjust the logo size */
                width: auto; /* Maintain aspect ratio */
            }

            .navi-link {
                display: flex;
                gap: 20px; /* Spacing between navigation links */
            }

            .navbar a {
                text-decoration: none;
                color: #ffffff;
                font-weight: bold;
                font-size: 1rem;
                
            }

            .navbar a:hover {
                color: #f56b2a; /* Highlight background on hover */ 
            }

            .profile-container {
                max-width: 600px;
                margin: 50px auto;
                background-color: #ffffff;
                color: #333;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            }

            .profile-header {
                text-align: center;
                background-color: #007bff;
                color: #ffffff;
                padding: 10px;
                border-radius: 10px 10px 0 0;
            }

            .profile-field {
                margin: 15px 0;
                padding: 10px;
                background-color: #f1f1f1;
                border-radius: 5px;
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
                <?php else: ?>
                    <a href="customer_login_page.html">Account</a>
                <?php endif; ?>
                <a href="customer_cart_page.php">Cart</a>
                <a href="customer_logout.php">Logout</a>
            </div>
        </div>

        <div class="profile-container">
            <div class="profile-header">
                <h2>Profile</h2>
            </div>
            <div class="profile-field"><strong>Full Name:</strong> <?php echo $customer_name; ?></div>
            <div class="profile-field"><strong>Username:</strong> <?php echo $customer_id; ?></div>
            <div class="profile-field"><strong>Email:</strong> <?php echo $customer_email; ?></div>
            <div class="profile-field"><strong>Address:</strong> <?php echo $customer_address; ?></div>
            <div class="profile-field"><strong>Phone:</strong> <?php echo $customer_phonenum; ?></div>
        </div>
    </body>
</html>
