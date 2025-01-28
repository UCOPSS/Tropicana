<?php
session_start();
include('db_connect.php');  // Include your database connection

// Ensure that the customer is logged in and order_id is passed as a GET parameter
if (!isset($_SESSION['customer_Id']) || !isset($_GET['order_id'])) {
    header('Location: customer_login_page.html');  // Redirect to login if not logged in or order_id is not set
    exit();
}

$order_id = $_GET['order_id'];  // Get order_id from GET parameter
$customer_id = $_SESSION['customer_Id'];  // Get customer_id from session

// Get order details from the database
$order_query = "SELECT * FROM order_detail WHERE order_id = '$order_id' AND customer_Id = '$customer_id'";
$order_result = mysqli_query($connect, $order_query);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    echo "Order not found.";
    exit();
}

// Get order items (products) from the order_details table
$order_items_query = "SELECT * FROM order_details WHERE order_id = '$order_id'";
$order_items_result = mysqli_query($connect, $order_items_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - Tropicana Aquarium</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0b2438; /* Dark blue background */
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        .receipt-details {
            margin-bottom: 30px;
        }
        .receipt-details p {
            font-size: 1.2rem;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        .total {
            text-align: right;
            font-size: 1.5rem;
            margin-top: 20px;
            font-weight: bold;
        }
        .back-btn {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 10px 20px;
            text-align: center;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Receipt</h1>

        <div class="receipt-details">
            <p><strong>Order ID:</strong> <?php echo $order['order_id']; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $order['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
            <p><strong>Shipping Address:</strong> <?php echo $order['address']; ?></p>
            <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price (RM)</th>
                    <th>Subtotal (RM)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                while ($item = mysqli_fetch_assoc($order_items_result)) {
                    $subtotal = $item['Product_Price'] * $item['Product_Quantity'];
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $item['Product_Name']; ?></td>
                        <td><?php echo $item['Product_Quantity']; ?></td>
                        <td>RM <?php echo number_format($item['Product_Price'], 2); ?></td>
                        <td>RM <?php echo number_format($subtotal, 2); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <div class="total">
            <p><strong>Total Amount (Including Shipping): RM <?php echo number_format($total + 8, 2); ?></strong></p>
        </div>

        <a href="customer_shop_page.php" class="back-btn">Back to shop page</a>
    </div>

</body>
</html>

<?php
// Close the database connection
mysqli_close($connect);
?>
