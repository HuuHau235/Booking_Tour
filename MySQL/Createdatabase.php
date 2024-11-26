<?php
$servername = "localhost"; 
$username = "root";        
$password = "";          
$dbName = "HappyTrips";       

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to the database '$dbName'";

?>
