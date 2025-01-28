<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['Staff_Id'])) {
        echo "<script>
            alert('Please log in to view your profile.');
            window.location.href = 'login_page.html';
        </script>";
        exit();
    }
    // retrive user detail from session.
    $staff_Name = $_SESSION['Staff_Name'];
    $staff_Id = $_SESSION['Staff_Id'];
    $staff_Role = $_SESSION['Staff_Role'];

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Staff Profile</title>
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

            .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            }

            .profile-header {
                text-align: center;
                background-color: #007bff;
                color: #ffffff;
                padding: 10px;
                border-radius: 10px 10px 0 0;
            }

            .profile-field {
                margin: 15px 0;
                padding: 10px;
                background-color: #f1f1f1;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <div class="logo">
                <img src="image/aquariumlogo.png" alt="Tropicana Aquarium Logo">
            </div>
            <div class="navi-link">
                <a href="home_staff_page.html">Home</a>
                <a href="staff_page.html">Dashboard</a>
                <a href="staff_shop_page.php">Shop</a>
                <a href="">Profile</a>
                <a href="staff_logout.php">Logout</a>
            </div>
        </div>

        <div class="profile-container">
            <div class="profile-header">
                <h2>Staff Profile</h2>
            </div>

            <div class="profile-field"><strong>Full Name:</strong> <?php echo $staff_Name; ?></div>
            <div class="profile-field"><strong>Username:</strong> <?php echo $staff_Id; ?></div>
            <div class="profile-field"><strong>Role:</strong> <?php echo $staff_Role; ?></div>
        </div>

        
    </body>
</html>
