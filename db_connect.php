<?php
    $hostname = "localhost" ;
    $username = "admin" ;
    $password = "admin123";
    $dbname = "first_database" ;

    $connect = mysqli_connect($hostname,$username,$password)
                OR DIE ("Connection failed!");

    $selectdb = mysqli_select_db($connect,$dbname)
                OR DIE("connection failed") ;
?>