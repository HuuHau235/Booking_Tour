<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tours</title>
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
            <h1>Quản lý Tours</h1>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addTourModal">
                <i class="bi bi-plus-circle"></i> Thêm Tour mới
            </button>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Tour</th>
                            <th>Lịch trình</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hà Nội - Hạ Long</td>
                            <td>3 ngày 2 đêm</td>
                            <td>3,500,000 VND</td>
                            <td><span class="badge bg-success">Đang hoạt động</span></td>
                            <td>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Sửa</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete(1)"><i class="bi bi-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hà Nội - Sapa</td>
                            <td>4 ngày 3 đêm</td>
                            <td>5,200,000 VND</td>
                            <td><span class="badge bg-danger">Ngừng hoạt động</span></td>
                            <td>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Sửa</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete(2)"><i class="bi bi-trash"></i> Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Thêm Tour -->
    <div class="modal fade" id="addTourModal" tabindex="-1" aria-labelledby="addTourModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTourModalLabel">Thêm Tour Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTourForm">
                        <div class="mb-3">
                            <label for="tourName" class="form-label">Tên Tour</label>
                            <input type="text" class="form-control" id="tourName" required>
                        </div>
                        <div class="mb-3">
                            <label for="tourSchedule" class="form-label">Lịch trình</label>
                            <input type="text" class="form-control" id="tourSchedule" placeholder="VD: 3 ngày 2 đêm" required>
                        </div>
                        <div class="mb-3">
                            <label for="tourPrice" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="tourPrice" placeholder="VD: 3500000" required>
                        </div>
                        <div class="mb-3">
                            <label for="tourStatus" class="form-label">Trạng thái</label>
                            <select class="form-select" id="tourStatus" required>
                                <option value="active">Đang hoạt động</option>
                                <option value="inactive">Ngừng hoạt động</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" onclick="saveTour()">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function confirmDelete(tourId) {
            const confirmed = confirm(`Bạn có chắc chắn muốn xóa tour có ID ${tourId} không?`);
            if (confirmed) {
                alert(`Tour có ID ${tourId} đã được xóa thành công!`);
                // Thêm logic xóa khỏi cơ sở dữ liệu hoặc DOM
            }
        }

        function saveTour() {
            alert("Chức năng thêm tour đang được phát triển!");
            // Thêm logic lưu tour mới
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
