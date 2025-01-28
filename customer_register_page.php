<?php
    include "db_connect.php" ;

    $fullName = $_POST["fullname"] ;
    $username = $_POST["username"] ;
    $email = $_POST["email"] ;
    $password = $_POST["password"] ;
    $address = $_POST["address"] ;
    $phoneNum = $_POST["phoneNum"] ;

    $sql = "INSERT INTO customer(customer_Id,customer_email,customer_name,customer_phoneNum,customer_password,customer_address)
            VALUE('$username','$email','$fullName','$phoneNum','$password','$address')" ;

    
    $sendsql = mysqli_query($connect,$sql) ;

    if($sendsql){
        include "customer_register_success.js" ;
        
    }

    else{
        echo "query failed" ;
    }
?>

