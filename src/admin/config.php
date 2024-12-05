<?php
session_start();
$host = 'localhost'; 
$username = 'root';  
$password = '';      
$database = 'HappyTrips';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Kết nối thất bại: ' . $conn->connect_error);
}

$conn->set_charset("utf8");

// Tạo CSRF token nếu chưa có
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
