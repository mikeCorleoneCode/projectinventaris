<?php
    $server     ="localhost";
    $user       ="root";
    $password   ="";
    $database   ="eling";

    $conn=new mysqli($server,$user,$password,$database);

    if ($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }else{
        //echo "berhasil";
    }

?>