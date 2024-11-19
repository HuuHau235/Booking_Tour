<?php
// Kết nối cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=TravelAgency', 'root', '');

// Nhận ID của booking từ URL
$bookingId = $_GET['id'] ?? 0;

// Kiểm tra nếu ID hợp lệ
if ($bookingId) {
    // Cập nhật trạng thái booking thành 'canceled'
    $query = $pdo->prepare('UPDATE Booking SET status = "canceled" WHERE id = :id');
    $query->execute(['id' => $bookingId]);

    echo "Đã hủy đặt tour thành công!";
} else {
    echo "Booking không hợp lệ!";
}
?>
