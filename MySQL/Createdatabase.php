<?php
    $mysqli = new mysqli("localhost", "root", "");

    if($mysqli == FALSE){
        die ("ERROR: Could not connect.". $mysqli -> connect_error);
    }

    $sql = "CREATE DATABASE TravelAgency";
    if ($mysqli -> query($sql)=== true){
        echo "Database created successfully";
    }
    else{
        echo "ERROR: Could not able to excute $sql.". $mysqli -> error;
    }
?>