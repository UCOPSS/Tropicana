<?php
    include "db_connect.php";
    session_start(); // Start session

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT *
            FROM customer
            WHERE customer_Id = '$username' AND customer_password = '$password'";

    $sendsql = mysqli_query($connect, $sql);

    if (mysqli_num_rows($sendsql) > 0) {
        $user = mysqli_fetch_assoc($sendsql);

        // Store customer data in session
        $_SESSION['customer_Id'] = $user['customer_Id'];
        $_SESSION['customer_name'] = $user['customer_name'];
        $_SESSION['customer_email'] = $user['customer_email'];
        $_SESSION['customer_address'] = $user['customer_address'];
        $_SESSION['customer_phonenum'] = $user['customer_phonenum'];

        // Fetch cart from database and populate session
        $customer_id = $user['customer_Id'];
        $fetch_cart_sql = "SELECT Product_Id, Cart_Quantity, 
                           (SELECT Product_Name FROM product WHERE product.Product_Id = cart.Product_Id) AS name, 
                           (SELECT Product_Price FROM product WHERE product.Product_Id = cart.Product_Id) AS price 
                           FROM cart WHERE customer_Id = '$customer_id'";
        $fetch_cart_result = mysqli_query($connect, $fetch_cart_sql);

        $_SESSION['cart'] = []; // Initialize cart in session
        if ($fetch_cart_result && mysqli_num_rows($fetch_cart_result) > 0) {
            while ($row = mysqli_fetch_assoc($fetch_cart_result)) {
                $product_id = $row['Product_Id'];
                $_SESSION['cart'][$product_id] = [
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'quantity' => $row['Cart_Quantity']
                ];
            }
        }

        echo "<script>
                alert('Login Successful! Redirecting...');
                window.location.href = 'customer_home_page.php';
            </script>";
    } else {
        echo "<script>
                alert('Invalid username or password...');
                window.location.href = 'customer_login_page.html';
            </script>";
    }
?>
