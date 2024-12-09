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

// Xử lý phân trang
$items_per_page = 10; // Số hóa đơn trên mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Đảm bảo giá trị trang không nhỏ hơn 1
$offset = ($page - 1) * $items_per_page;

// Xử lý tìm kiếm
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$search_query = $search ? "WHERE customer_name LIKE '%$search%' OR tour_name LIKE '%$search%'" : '';

// Truy vấn tổng số hóa đơn
$total_sql = "SELECT COUNT(*) AS total FROM Invoices $search_query";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $items_per_page);

// Truy vấn lấy thông tin hóa đơn
$sql = "SELECT id, customer_name, tour_name, payment_date, amount 
        FROM Invoices 
        $search_query 
        ORDER BY payment_date DESC 
        LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($sql);

// Đóng kết nối sau khi xử lý xong
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán & Hóa đơn</title>
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
            <h1>Thanh toán & Hóa đơn</h1>

            <!-- Tìm kiếm -->
            <form method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm khách hàng hoặc tour" value="<?php echo htmlspecialchars($search); ?>">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khách hàng</th>
                            <th>Tour</th>
                            <th>Ngày thanh toán</th>
                            <th>Số tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tour_name']); ?></td>
                                    <td><?php echo $row['payment_date']; ?></td>
                                    <td><?php echo number_format($row['amount'], 0, ',', '.') . ' VNĐ'; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5">Không có hóa đơn nào.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Phân trang -->
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>

        </div>
    </div>
</body>
</html>
