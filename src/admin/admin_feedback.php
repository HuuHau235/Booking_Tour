<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy thông tin đánh giá
$sql = "SELECT r.id, u.name AS user_name, t.name AS tour_name, r.rating, r.comment, r.created_at
        FROM Review r
        JOIN User u ON r.user_id = u.user_id
        JOIN Tour t ON r.tour_id = t.tour_id
        ORDER BY r.created_at DESC"; // Sắp xếp theo ngày gửi đánh giá mới nhất

$reviewsResult = $conn->query($sql);

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá & Phản hồi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            bottom: 0;
            padding: 20px 15px;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        footer {
            text-align: center;
            margin-top: 30px;
        }
        table th, table td {
            text-align: center;
        }
        .star-rating {
            color: gold;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h4><i class="bi bi-gear-fill"></i> Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a href="admin_tours.php" class="nav-link"><i class="bi bi-card-list"></i> Quản lý Tour</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_booking.php" class="nav-link"><i class="bi bi-book"></i> Quản lý Booking</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_customers.php" class="nav-link"><i class="bi bi-person"></i> Quản lý Khách hàng</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_invoices.php" class="nav-link"><i class="bi bi-receipt"></i> Thanh toán & Hóa đơn</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_feedback.php" class="nav-link"><i class="bi bi-chat-left-text"></i> Đánh giá</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Quản lý Đánh giá</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Khách hàng</th>
                            <th>Tour</th>
                            <th>Đánh giá</th>
                            <th>Nội dung</th>
                            <th>Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $stt = 1; // Biến đếm số thứ tự
                        if ($reviewsResult->num_rows > 0): ?>
                            <?php while ($row = $reviewsResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $stt++; ?></td>
                                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tour_name']); ?></td>
                                    <td>
                                        <?php
                                            // Hiển thị đánh giá sao
                                            for ($i = 0; $i < $row['rating']; $i++) {
                                                echo '⭐';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['comment']); ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="6">Chưa có đánh giá nào.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
