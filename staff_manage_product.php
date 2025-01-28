<?php
include "db_connect.php"; // Ensure you have the correct database connection here

// Fetch products from the database
$sql = "SELECT Product_Id, Product_Name, Product_Description, Product_Price, Product_Quantity, product_Image FROM product";
$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #0b2438;
                color: #ffffff;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center; /* Keeps everything vertically aligned */
                background-color: #0b2438;
                padding: 15px 30px; /* Added more padding for better spacing */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow for visual separation */
            }

            .logo img {
                height: 60px; /* Adjust the logo size */
                width: auto; /* Maintain aspect ratio */
            }

            .navi-link {
                display: flex;
                gap: 20px; /* Spacing between navigation links */
            }

            .navbar a {
                text-decoration: none;
                color: #ffffff;
                font-weight: bold;
                font-size: 1rem;
                
            }

            .navbar a:hover {
                color: #f56b2a; /* Highlight background on hover */ 
            }

        h1 {
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            color: #333;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 100px;
            height: auto;
        }

        .actions button {
            margin: 5px;
            padding: 5px 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #45a049;
        }

        a.add-product {
            display: block;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 20px auto;
            width: 150px;
        }

        a.add-product:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="image/aquariumlogo.png" alt="Tropicana Aquarium Logo">
        </div>
        <div class="navi-link">
            <a href="staff_page.html">Dashboard</a>
            <a href="staff_logout">Logout</a>
        </div>
    </div>

    <h1>Products</h1>
    <a href="add_product.html" class="add-product">Add Product</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Product_Id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Product_Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Product_Description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Product_Price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Product_Quantity']) . "</td>";
                    echo "<td><img src='uploads/" . htmlspecialchars($row['product_Image']) . "' alt='Product Image'></td>";
                    echo "<td class='actions'>
                            <br><button onclick=\"window.location.href='staff_update_stock.php?id=" . $row['Product_Id'] . "'\">Update Stock</button>
                            <br><button onclick=\"window.location.href='staff_update_price.php?id=" . $row['Product_Id'] . "'\">Update Price</button>
                            <br><button onclick=\"window.location.href='staff_remove_product.php?id=" . $row['Product_Id'] . "'\">Remove</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No products found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
