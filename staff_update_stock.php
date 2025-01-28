<?php
include "db_connect.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details
    $query = "SELECT Product_Id, Product_Name, Product_Quantity FROM product WHERE Product_Id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Product not found.";
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_quantity = $_POST['quantity'];

    // Update stock in the database
    $update_query = "UPDATE product SET Product_Quantity = ? WHERE Product_Id = ?";
    $stmt = mysqli_prepare($connect, $update_query);
    mysqli_stmt_bind_param($stmt, "ii", $new_quantity, $product_id);
    mysqli_stmt_execute($stmt);

    header("Location: staff_manage_product.php"); // Redirect back to product management
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
</head>
<body>
    <h1>Update Stock for <?php echo htmlspecialchars($product['Product_Name']); ?></h1>
    <form action="" method="POST">
        <label for="quantity">New Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($product['Product_Quantity']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
