<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$money = $_POST['money'];
$duration = $_POST['duration'];

$sql = "SELECT * FROM Tour WHERE price <= ? AND duration = ? ORDER BY RAND() LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $money, $duration);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $tour = $result->fetch_assoc();
    header("Location: detail.php?tour_id=" . $tour['tour_id']);
    exit();
} else {
    echo"<script>
            confirm('Không tìm thấy Tour phù hợp!');
            window.location.href = 'list_tour.php';
        </script>";
}

$conn->close();
?>