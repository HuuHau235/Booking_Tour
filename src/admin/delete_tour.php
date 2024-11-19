<?php
// Kết nối cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=TravelAgency', 'root', '');

// Nhận ID của tour từ URL
$tourId = $_GET['id'] ?? 0;

// Kiểm tra nếu ID hợp lệ
if ($tourId) {
    // Xóa tour khỏi cơ sở dữ liệu
    $query = $pdo->prepare('DELETE FROM Tour WHERE id = :id');
    $query->execute(['id' => $tourId]);

    echo "Đã xóa tour thành công!";
} else {
    echo "Tour không hợp lệ!";
}
?>
