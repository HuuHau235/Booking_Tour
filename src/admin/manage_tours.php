<?php
// Kết nối cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=TravelAgency', 'root', '');

// Truy vấn danh sách các tour
$query = $pdo->query('SELECT * FROM Tour');
$tours = $query->fetchAll(PDO::FETCH_ASSOC);

// Hiển thị danh sách tour
echo "<h2>Danh sách Tour</h2>";
echo "<table border='1'><tr><th>Tên Tour</th><th>Mô tả</th><th>Giá</th><th>Ngày bắt đầu</th><th>Ngày kết thúc</th><th>Hành động</th></tr>";

foreach ($tours as $tour) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($tour['name']) . "</td>";
    echo "<td>" . htmlspecialchars($tour['description']) . "</td>";
    echo "<td>" . number_format($tour['price'], 0, ',', '.') . " đ</td>";
    echo "<td>" . htmlspecialchars($tour['start_date']) . "</td>";
    echo "<td>" . htmlspecialchars($tour['end_date']) . "</td>";
    echo "<td><a href='edit_tour.php?id=" . $tour['id'] . "'>Chỉnh sửa</a> | <a href='delete_tour.php?id=" . $tour['id'] . "'>Xóa</a></td>";
    echo "</tr>";
}

echo "</table>";

// Nút bấm để tạo tour mới
echo "<a href='create_tour.php'><button>Tạo Tour Mới</button></a>";
?>
