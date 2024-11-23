<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Booking</title>
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
            <h4><i class="bi bi-gear-fill"></i> Admin Panel</h4>
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
            <h1>Quản lý Booking</h1>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <i class="bi bi-plus-circle"></i> Thêm Booking mới
            </button>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khách hàng</th>
                            <th>Tour</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>Nguyễn Văn A</td>
                            <td>Hà Nội - Hạ Long</td>
                            <td>2024-11-20</td>
                            <td><span class="badge bg-success">Đã xác nhận</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <footer>
            </footer>
        </div>
    </div>

    <!-- Modal Thêm Booking -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Thêm Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Tên Khách hàng</label>
                            <input type="text" class="form-control" id="customerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="tourSelect" class="form-label">Chọn Tour</label>
                            <select class="form-select" id="tourSelect" required>
                                <option value="">Chọn Tour</option>
                                <option value="Hà Nội - Sapa">Hà Nội - Sapa</option>
                                <option value="Hà Nội - Hạ Long">Hà Nội - Hạ Long</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bookingDate" class="form-label">Ngày đặt</label>
                            <input type="date" class="form-control" id="bookingDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button> -->
                    <!-- <button type="button" class="btn btn-primary" onclick="saveBooking()">Lưu</button> -->
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="#bookingModal">Đóng</button>
                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#savebookingModal">Lưu</button>
                </div>
            </div>
        </div>

        <!-- Modal Xác nhận Khóa Khách hàng -->
        <div class="modal fade" id="savebookingModal" tabindex="-1" aria-labelledby="savebookingModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="savebookingModal">Xác nhận khóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn khóa khách hàng này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                        <button type="button" class="btn btn-danger">Khóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>