<?php
// Kết nối cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=TravelAgency', 'root', '');

// Nhận dữ liệu từ form
$tourName = $_POST['tourName'];
$tourDescription = $_POST['tourDescription'];
$tourPrice = $_POST['tourPrice'];
$tourStartDate = $_POST['tourStartDate'];
$tourEndDate = $_POST['tourEndDate'];
$tourDuration = $_POST['tourDuration'];
$tourType = $_POST['tourType'];

// Thêm tour vào cơ sở dữ liệu
$query = $pdo->prepare('
    INSERT INTO Tour (name, description, price, start_date, end_date, duration, type)
    VALUES (?, ?, ?, ?, ?, ?, ?)
');
$query->execute([$tourName, $tourDescription, $tourPrice, $tourStartDate, $tourEndDate, $tourDuration, $tourType]);

echo "Tour đã được tạo thành công!";
?>
