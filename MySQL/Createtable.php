<?php
    $mysqli = new mysqli("localhost", "root", "", "TravelAgency");

    if($mysqli == FALSE){
        die ("ERROR: Could not connect.". $mysqli -> connect_error);
    }

    $sql = "CREATE TABLE PRODUCT
    (
    id int not null primary key AUTO_INCREMENT,
    image varchar(300) not null,
    name varchar(50) not null,
    price varchar(50) not null
    )";

    if($mysqli-> query($sql)=== true){
        echo "Table created successfully!";
    }
    else{
        echo "ERROR: Could not be able to excute $sql.". $mysqli->error;
    }
?>