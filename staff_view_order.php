<?php

/*
// Database connection
$servername = "localhost"; // Change as per your configuration
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "your_database_name"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    */

include 'db_connect.php';

// Fetch orders
$sql = "SELECT order_id, name, total_cost FROM order_detail";
$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0b2438;
            color: #ffffff;
            margin: 0;
            padding: 0;
            text-align: center;
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

        .container {
            margin: 50px auto;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            margin-bottom: 20px;
        }
        .order-card {
            background: rgba(255, 255, 255, 0.1);
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-card a {
            text-decoration: none;
            color: #f56b2a;
            font-weight: bold;
        }
        .order-card a:hover {
            color: #fff;
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

    <div class="container">
        <h1>View Orders</h1>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="order-card">
                    <div>
                        <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                    </div>
                    <div>
                        Order ID: <?php echo htmlspecialchars($row['order_id']); ?> |
                        Total: RM<?php echo number_format($row['total_cost'], 2); ?>
                    </div>
                    <div>
                        <a href="staff_view_customer_receipt.php?order_id=<?php echo $row['order_id']; ?>">View Receipt</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
        <?php $connect->close(); ?>
    </div>
</body>
</html>
