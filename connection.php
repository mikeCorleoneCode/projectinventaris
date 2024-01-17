<?php
    $server     ="ep-dawn-cell-76728736.eu-central-1.pg.koyeb.app";
    $user       ="koyeb-adm";
    $password   ="p2qL5NzMhWIC";
    $database   ="koyebdb";

    $conn=new mysqli($server,$user,$password,$database);

    if ($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }else{
        //echo "berhasil";
    }

?>