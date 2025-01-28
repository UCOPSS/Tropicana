<?php
    include "db_connect.php" ;

    $sql = "SELECT customer_name,customer_Id,customer_email,customer_address,customer_phonenum
            FROM customer" ;

    
    $sendsql = mysqli_query($connect,$sql) ;
    
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            .table-container {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            width: 90%;
            max-width: 1200px;
            overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                text-align: left;
                padding: 12px;
                border: 1px solid #ddd;
                color: #000;
            }

            th {
                background-color: #007bff;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
            }
            
            h1 {
                text-align: center;
                margin: 20px 0;
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
                <a href="staff_logout.php">Logout</a>
            </div>
        </div>
        <h1>Customer Detail</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Check if there are any rows in the result
                if (mysqli_num_rows($sendsql) > 0) {
                    // Loop through and display each row
                    while ($row = mysqli_fetch_assoc($sendsql)) {
                        echo "<tr>
                                <td>{$row['customer_name']}</td>
                                <td>{$row['customer_Id']}</td>
                                <td>{$row['customer_email']}</td>
                                <td>{$row['customer_address']}</td>
                                <td>{$row['customer_phonenum']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No customer details found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>