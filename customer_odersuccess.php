<?php
session_start();
// Assuming that you have order_id stored in session or after placing the order
$order_id = $_SESSION['order_id'];  // If you have it stored in session after order completion
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
            overflow-x: hidden;
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

        .success-container {
            margin-top: 50px;
            padding: 20px;
        }

        .success-message {
            background-color: #ffffff;
            color: #0b2438;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }

        .success-message h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .success-message p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .success-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .success-buttons a {
            text-decoration: none;
            background-color: #f56b2a;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .success-buttons a:hover {
            background-color: #d4501a;
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

    <div class="success-container">
        <div class="success-message">
            <h1>Order Successfully Placed!</h1>
            <p>Your order has been successfully processed.</p>
            <div class="success-buttons">
                <a href="customer_Shop_page.php">Continue Shopping</a>
                <!-- Link to the receipt page with the order ID -->
                <a href="customer_receipt.php?order_id=<?php echo $order_id; ?>">Click Here to View Your Receipt</a>
            </div>
        </div>
    </div>
</body>
</html>
