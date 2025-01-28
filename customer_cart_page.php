<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropicana Aquarium - Cart</title>
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
            color: #f0f0f0;
            font-weight: bold;
            font-size: 1rem;
        }

        .navbar a:hover {
            color: #f56b2a;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            color: #333333;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #0b2438;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #333333;
        }

        table thead {
            background-color: #007bff;
            color: white;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table td input[type="number"] {
            width: 60px;
            text-align: center;
        }

        .actions button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #0056b3;
        }

        .total-summary {
            text-align: right;
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #333333;
        }

        .checkout-btn {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #28a745;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .checkout-btn:hover {
            background-color: #218838;
        }

        p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
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
        <h1>Shopping Cart</h1>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price (RM)</th>
                        <th>Subtotal (RM)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $shipping_fee = 8; // Example shipping fee
                    foreach ($_SESSION['cart'] as $product_id => $product):
                        $subtotal = $product['price'] * $product['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product_id); ?></td>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>
                                <form action="customer_update_cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                    <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="1">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                            <td>RM <?php echo number_format($product['price'], 2); ?></td>
                            <td>RM <?php echo number_format($subtotal, 2); ?></td>
                            <td class="actions">
                                <form action="customer_remove_from_cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total-summary">
                Shipping Fee: RM <?php echo number_format($shipping_fee, 2); ?><br>
                Total Cost: RM <?php echo number_format($total + $shipping_fee, 2); ?>
            </div>

            <form action="customer_checkout_page.php" method="post">
                <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
                <button type="submit" class="checkout-btn">Proceed to Checkout</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty. <a href="customer_Shop_page.php">Go back to shopping</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>
