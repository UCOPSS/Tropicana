<?php
session_start();

// Database connection
$host = 'localhost'; // Replace with your database host
$user = 'admin';      // Replace with your database username
$password = 'admin123'; // Replace with your database password
$dbname = 'first_database'; // Replace with your database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $payment_method = $_POST['payment_method'];

    // Get customer ID from session
    $customer_Id = $_SESSION['customer_Id'];

    // Calculate total cost from cart and add the fixed fee
    $cart_query = "SELECT SUM(p.Product_Price * c.Cart_Quantity) AS total_cost 
                   FROM cart c
                   JOIN product p ON c.Product_Id = p.Product_Id
                   WHERE c.customer_Id = '$customer_Id'";
    $cart_result = $conn->query($cart_query);
    $cart_data = $cart_result->fetch_assoc();
    $cart_total = $cart_data['total_cost'];
    $fee = 8.00; // Fixed fee
    $total_cost = $cart_total + $fee;

    // Insert the order into the `order_detail` table
    $order_query = "INSERT INTO order_detail (customer_Id, name, email, address, phone, payment_method, total_cost) 
                    VALUES ('$customer_Id', '$name', '$email', '$address', '$phone', '$payment_method', '$total_cost')";
    $conn->query($order_query);

    // Get the newly created order ID
    $order_id = $conn->insert_id;

    // Store the order_id in the session
    $_SESSION['order_id'] = $order_id;  // Store order_id in session

    // Retrieve cart items for the customer
    $cart_items_query = "SELECT c.Product_Id, c.Cart_Quantity, p.Product_Name, p.Product_Price 
                         FROM cart c
                         JOIN product p ON c.Product_Id = p.Product_Id
                         WHERE c.customer_Id = '$customer_Id'";
    $cart_items_result = $conn->query($cart_items_query);

    // Insert each cart item into the `order_details` table and update product stock
    while ($cart_item = $cart_items_result->fetch_assoc()) {
        $product_id = $cart_item['Product_Id'];
        $product_name = $cart_item['Product_Name'];
        $product_price = $cart_item['Product_Price'];
        $quantity = $cart_item['Cart_Quantity'];

        // Insert into `order_details` table
        $details_query = "INSERT INTO order_details (customer_Id, order_id, Product_Id, Product_Name, Product_Price, Product_Quantity) 
                          VALUES ('$customer_Id', '$order_id', '$product_id', '$product_name', '$product_price', '$quantity')";
        $conn->query($details_query);

        // Update product stock
        $stock_query = "SELECT Product_Quantity FROM product WHERE Product_Id = '$product_id'";
        $stock_result = $conn->query($stock_query);
        $stock_data = $stock_result->fetch_assoc();
        $new_stock = $stock_data['Product_Quantity'] - $quantity;

        $update_stock_query = "UPDATE product SET Product_Quantity = '$new_stock' WHERE Product_Id = '$product_id'";
        $conn->query($update_stock_query);
    }

    // Clear the cart for the customer
    $clear_cart_query = "DELETE FROM cart WHERE customer_Id = '$customer_Id'";
    $conn->query($clear_cart_query);

    // Clear the cart session after the order is placed
    unset($_SESSION['cart']);  // Clear the cart session

    // Success message and redirection
    echo "<script>
        alert('Order placed successfully! Total Cost: RM$total_cost (including RM8.00 fee)');
        window.location.href = 'customer_odersuccess.php';
    </script>";

    // Close the connection
    $conn->close();
    exit();
} else {
    echo "<script>
        alert('Invalid request.');
        window.location.href = 'customer_checkout_page.php';
    </script>";
    exit();
}
?>
