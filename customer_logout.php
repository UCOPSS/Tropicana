<?php
session_start();
session_destroy(); // Destroy all session data
echo "<script>
        alert('You have successfully logged out.');
        window.location.href = 'customer_login_page.html';
      </script>";
?><?php
session_start();
include "db_connect.php";

if (isset($_SESSION['customer_Id']) && isset($_SESSION['cart'])) {
    $customer_id = $_SESSION['customer_Id'];

    // Sync session cart with database
    foreach ($_SESSION['cart'] as $product_id => $product) {
        $quantity = $product['quantity'];
        $check_sql = "SELECT * FROM cart WHERE Product_Id = '$product_id' AND customer_Id = '$customer_id'";
        $check_result = mysqli_query($connect, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Update cart quantity in database
            $update_sql = "UPDATE cart SET Cart_Quantity = $quantity 
                           WHERE Product_Id = '$product_id' AND customer_Id = '$customer_id'";
            mysqli_query($connect, $update_sql);
        } else {
            // Insert new product into the cart table
            $insert_sql = "INSERT INTO cart (Cart_Quantity, customer_Id, Product_Id) 
                           VALUES ('$quantity', '$customer_id', '$product_id')";
            mysqli_query($connect, $insert_sql);
        }
    }
}

// Destroy session
session_destroy();
echo "<script>
        alert('You have successfully logged out.');
        window.location.href = 'customer_login_page.html';
      </script>";
?>
