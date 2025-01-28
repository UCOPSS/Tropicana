<?php
session_start();
include "db_connect.php"; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['customer_Id'])) {
    echo "<script>
        alert('Please log in to add a product to cart.');
        window.location.href = 'customer_login_page.html';
    </script>";
    exit();
}

// Check if the cart session exists; if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Validate and sanitize POST inputs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);
$product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
$product_price = filter_input(INPUT_POST, 'product_price', FILTER_VALIDATE_FLOAT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

if (!$product_id || !$product_name || !$product_price || !$quantity || $quantity < 1) {
    echo "<script>
            alert('Invalid product details. Please try again.');
            window.location.href = 'customer_shop_page.php';
        </script>";
    exit();
}

// Check if the product already exists in the session cart
if (isset($_SESSION['cart'][$product_id])) {
    // Increment the quantity in the session if the product exists
    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
} else {
    // Add the product to the session cart if it doesn't exist
    $_SESSION['cart'][$product_id] = [
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity
    ];
}

// Insert or update the product details into the database cart table
$customer_id = $_SESSION['customer_Id']; // Ensure this is set when the user logs in

// Check if the product already exists in the database cart
$check_sql = "SELECT * FROM cart WHERE Product_Id = '$product_id' AND customer_Id = '$customer_id'";
$check_result = mysqli_query($connect, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Update the quantity if the product already exists in the cart
    $update_sql = "UPDATE cart SET Cart_Quantity = Cart_Quantity + $quantity 
                   WHERE Product_Id = '$product_id' AND customer_Id = '$customer_id'";
    mysqli_query($connect, $update_sql);
} else {
    // Insert a new product into the cart table
    $insert_sql = "INSERT INTO cart (Cart_Quantity, customer_Id, Product_Id) 
                   VALUES ('$quantity', '$customer_id', '$product_id')";
    mysqli_query($connect, $insert_sql);
}

// Redirect to the shop page with a success message
echo "<script>
        alert('Successfully added to cart!');
        window.location.href = 'customer_shop_page.php';
    </script>";
exit();
?>
