<?php
session_start();

// Database connection settings
$host = 'localhost'; // Update with your database host
$user = 'admin';      // Update with your database username
$password = 'admin123';      // Update with your database password
$dbname = 'first_database'; // Update with your database name

$connect = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['customer_Id'])) {
    echo "<script>
        alert('Please log in to view your profile.');
        window.location.href = 'customer_login_page.html';
    </script>";
    exit();
}

// Retrieve user details from session
$customer_name = $_SESSION['customer_name'];
$customer_email = $_SESSION['customer_email'];
$customer_address = $_SESSION['customer_address'];
$customer_phonenum = $_SESSION['customer_phonenum'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropicana Aquarium - Checkout</title>
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

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            color: #000000;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        h2, h3 {
            color: #0b2438;
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

    <div class="container">
        <h2>Checkout Page</h2>
        <form action="customer_checkout_process.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($customer_name); ?>" readonly>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($customer_address); ?>" readonly>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($customer_phonenum); ?>" readonly>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer_email); ?>" readonly>

            <h3>Payment Method</h3>
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="cod">Cash on Delivery</option>
            </select>

            <div id="credit_card_details" style="display: none;">
                <label for="credit_card_number">Credit Card Number:</label>
                <input type="text" id="credit_card_number" name="credit_card_number" placeholder="Enter Credit Card Number">
            </div>

            <button type="submit" name="place_order">Place Order</button>
        </form>
    </div>

    <script>
        const paymentMethodSelect = document.getElementById('payment_method');
        const creditCardDetails = document.getElementById('credit_card_details');

        paymentMethodSelect.addEventListener('change', () => {
            creditCardDetails.style.display = paymentMethodSelect.value === 'credit_card' ? 'block' : 'none';
        });
    </script>
</body>
</html>
