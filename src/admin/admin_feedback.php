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
                    <a href="admin_feedback.php" class="nav-link"><i class="bi bi-chat-left-text"></i> Đánh giá & Phản hồi</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Đánh giá & Phản hồi</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khách hàng</th>
                            <th>Tour</th>
                            <th>Đánh giá</th>
                            <th>Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nguyễn Văn A</td>
                            <td>Hà Nội - Sapa</td>
                            <td>⭐⭐⭐⭐⭐</td>
                            <td>2024-01-20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <footer>
            </footer>
        </div>
    </div>
</body>
</html>