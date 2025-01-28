<?php
    session_start();

    include 'db_connect.php'; // Include your database connection

    // Handle the search query
    $search_query = "";
    if (isset($_GET['search'])) {
        $search_query = mysqli_real_escape_string($connect, $_GET['search']);
    }

    // SQL query to fetch products based on the search query
    $sql = "SELECT * FROM product";
    if (!empty($search_query)) {
        $sql .= " WHERE Product_Name LIKE '%$search_query%' OR Product_Description LIKE '%$search_query%'";
    }

    $result = mysqli_query($connect, $sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropicana Aquarium</title>
    <style>
        /* Styles are unchanged */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: arial, sans-serif;
            background-color:rgb(7, 25, 40);
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

        .container {
            display: flex;
            padding: 20px;
        }

        .search-bar {
            width: 100%;
            padding: 20px;
            background-color: #0b3a54; /* Matches the navbar tone */
            border-radius: 10px;
            margin-top: 20px; /* Adds gap above the search bar */
            text-align: center;
        }

        .search-bar input[type="text"] {
            width: 70%; /* Slightly smaller input box */
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 16px;
            background-color: #ffffff; /* Bright contrast */
            color: #333;
            border: 1px solid #0078b2; /* Subtle outline to match the theme */
        }

        .search-bar input[type="text"]::placeholder {
            color: #666; /* Subtle placeholder text */
        }

        .search-bar button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745; /* Green for action buttons */
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #1e7e34; /* Darker green on hover */
        }

        .sidebar {
            width: 20%;
            margin-right: 20px;
            background-color: #0a2e40; /* Darker blue to match navbar */
            padding: 20px;
            border-radius: 10px;
        }

        .sidebar .filter-button {
            margin-bottom: 15px;
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #0078b2; /* Bright blue for buttons */
            color: white;
            text-align: left;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .sidebar .filter-button:hover {
            background-color: #005f8d; /* Slightly darker blue on hover */
        }

        .products {
            width: 80%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
            background-color: #0b3a54; /* Matches the search bar */
            border-radius: 10px;
            color: #ffffff; /* White text for better contrast */
        }

        .product-card {
            background-color: #0a2e40; /* Darker blue for individual cards */
            color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            max-width: 100%;
            max-height: 180px;
            border-radius: 10px;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .product-card h3 {
            margin: 10px 0;
            font-size: 1.2em;
            color: #f0f0f0; /* Slightly lighter text */
            font-weight: bold;
        }

        .product-card p {
            font-size: 0.9em;
            color: #cfcfcf; /* Light gray for descriptions */
        }

        .product-card p.price {
            font-size: 1.1em;
            color: #f56b2a; /* Bright orange for price */
            font-weight: bold;
        }

        .product-card button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #28a745; /* Green for action buttons */
            color: white;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .product-card button:hover {
            background-color: #1e7e34; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
            <div class="logo">
                <img src="image/aquariumlogo.png" alt="Tropicana Aquarium Logo">
            </div>
            <div class="navi-link">
                <a href="home_staff_page.html">Home</a>
                <a href="staff_page.html">Dashboard</a>
                <a href="staff_shop_page.php">Shop</a>
                <a href="staff_profile.php">Profile</a>
                <a href="staff_logout.php">Logout</a>
            </div>
        </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <form action="customer_shop_page.php" method="get" style="text-align: center;">
            <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search_query); ?>" />
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <button class="filter-button">Aquarium</button>
            <button class="filter-button">Filter</button>
            <button class="filter-button">Accessories</button>
            <button class="filter-button">Decoration</button>
            <button class="filter-button">Essential</button>
        </div>

        <!-- Products -->
        <div class="products">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='product-card'>
                            <img src='uploads/" . htmlspecialchars($row['product_Image']) . "' alt='" . htmlspecialchars($row['Product_Name']) . "'>
                            <h3>" . htmlspecialchars($row['Product_Name']) . "</h3>
                            <p class='price'>RM " . htmlspecialchars($row['Product_Price']) . "</p>
                            <p>" . htmlspecialchars($row['Product_Description']) . "</p>
                            <form action='#' method='post'>
                                <input type='hidden' name='product_id' value='" . $row['Product_Id'] . "'>
                                <input type='hidden' name='product_name' value='" . htmlspecialchars($row['Product_Name']) . "'>
                                <input type='hidden' name='product_price' value='" . htmlspecialchars($row['Product_Price']) . "'>
                                <input type='hidden' name='quantity' value='1'>
                                <button type='submit'>Add to Cart</button>
                            </form>
                        </div>";
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
