<?php
session_start();
include "db_connect.php"; // Ensure you include your database connection

if (isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $customer_id = $_SESSION['customer_Id']; // Ensure the customer is logged in and their ID is in the session

    // Update the quantity in the session cart if it exists
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    }

    // Update the quantity in the database cart table
    $update_sql = "UPDATE cart SET Cart_Quantity = '$quantity' WHERE Product_Id = '$product_id' AND customer_Id = '$customer_id'";
    $update_result = mysqli_query($connect, $update_sql);

    if ($update_result) {
        echo "<script>
                alert('Successfully updated cart!');
                window.location.href = 'customer_cart_page.php';
            </script>";
    } else {
        echo "<script>
                alert('Failed to update cart. Please try again.');
                window.location.href = 'customer_cart_page.php';
            </script>";
    }
}

exit();
?>
