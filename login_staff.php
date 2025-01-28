<?php
    include "db_connect.php" ;

    $username = $_POST["username"] ;
    $password = $_POST["password"] ;

    session_start();

    $sql = "SELECT*
            FROM staff
            WHERE staff_id = '$username' AND staff_password = '$password'" ;

    $sendsql = mysqli_query($connect, $sql) ;

    if(mysqli_num_rows($sendsql)>0){

        $user = mysqli_fetch_assoc($sendsql);

        $_SESSION['Staff_Id'] = $user['Staff_Id'];
        $_SESSION['Staff_Name'] = $user['Staff_Name'];
        $_SESSION['Staff_Role'] = $user['Staff_Role'];

        echo "<script>
                alert('Login Successful! Redirecting...');
                window.location.href = 'staff_page.html';
            </script>";
    }
    else{
        echo "<script>
                alert('Ivalid username or password...');
                window.location.href = 'login_staff.html';
            </script>";
    }
?>