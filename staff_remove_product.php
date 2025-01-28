<?php
include "db_connect.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Delete product from the database
    $delete_query = "DELETE FROM product WHERE Product_Id = ?";
    $stmt = mysqli_prepare($connect, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);

    header("Location: staff_manage_product.php"); // Redirect back to product management
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>
