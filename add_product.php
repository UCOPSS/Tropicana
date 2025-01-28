<?php
    include "db_connect.php" ;

    $name = $_POST["name"] ;
    $description = $_POST["description"] ;
    $price = $_POST["price"] ;
    $quantity = $_POST["quantity"] ;
    $image = $_FILES["image"]["name"] ;

    $sql = "INSERT INTO product(Product_Name,Product_Description,Product_Price,Product_Quantity,product_Image)
            VALUE ('$name','$description','$price','$quantity','$image')" ;
    
    $sendsql = mysqli_query($connect,$sql) ;

    if($sendsql){
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"]);
        echo "<script>
                alert('Successful added product! Redirecting...');
                window.location.href = 'staff_manage_product.php';
            </script>";
        
    }

    else{
        echo "query failed" ;
    }
?>