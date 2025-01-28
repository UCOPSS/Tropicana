<?php
session_start();
include "db_connect.php"; // Ensure you include your database connection

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $customer_id = $_SESSION['customer_Id']; // Ensure the customer is logged in and their ID is in the session

    // Remove the product from the session cart if it exists
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Also remove the product from the database cart table
    $delete_sql = "DELETE FROM cart WHERE Product_Id = '$product_id' AND customer_Id = '$customer_id'";
    $delete_result = mysqli_query($connect, $delete_sql);

    if ($delete_result) {
        echo "<script>
                alert('Successfully removed from cart!');
                window.location.href = 'customer_cart_page.php';
            </script>";
    } else {
        echo "<script>
                alert('Failed to remove from cart. Please try again.');
                window.location.href = 'customer_cart_page.php';
            </script>";
    }
}

exit();
?>
