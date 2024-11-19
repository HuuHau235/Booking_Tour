<?php
// Kết nối cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=TravelAgency', 'root', '');

// Truy vấn danh sách các tour đã đặt
$query = $pdo->query('
    SELECT Booking.id, User.name AS user_name, Tour.name AS tour_name, Booking.booking_date, Booking.status 
    FROM Booking
    JOIN User ON Booking.user_id = User.id
    JOIN Tour ON Booking.tour_id = Tour.id
');
$bookings = $query->fetchAll(PDO::FETCH_ASSOC);

// Hiển thị danh sách booking
echo "<h2>Danh sách Tour đã đặt</h2>";
echo "<table border='1'><tr><th>Tên khách hàng</th><th>Tên Tour</th><th>Ngày đặt</th><th>Trạng thái</th><th>Hành động</th></tr>";

foreach ($bookings as $booking) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($booking['user_name']) . "</td>";
    echo "<td>" . htmlspecialchars($booking['tour_name']) . "</td>";
    echo "<td>" . htmlspecialchars($booking['booking_date']) . "</td>";
    echo "<td>" . htmlspecialchars($booking['status']) . "</td>";
    echo "<td><a href='cancel_booking.php?id=" . $booking['id'] . "'>Hủy đặt tour</a></td>";
    echo "</tr>";
}

echo "</table>";
?>
