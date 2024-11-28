<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
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
        .btn-warning, .btn-danger {
            margin-left: 5px;
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
            <h1>Quản lý Booking</h1>

            <!-- Tìm kiếm và Lọc -->
            <div class="d-flex mb-3">
                <input type="text" id="searchBooking" class="form-control me-2" placeholder="Tìm kiếm theo tên khách hàng...">
                <select id="filterStatus" class="form-select me-2">
                    <option value="">Tất cả trạng thái</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                    <option value="Chưa xác nhận">Chưa xác nhận</option>
                    <option value="Đã hủy">Đã hủy</option>
                </select>
            </div>

            <!-- Bảng danh sách booking -->
            <div class="table-responsive">
                <table class="table table-striped" id="bookingTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khách hàng</th>
                            <th>Tour</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>Nguyễn Văn A</td>
                            <td>Hà Nội - Hạ Long</td>
                            <td>2024-11-20</td>
                            <td>
                                <select class="form-select" onchange="updateBookingStatus(this, 101)">
                                    <option value="Đã xác nhận" selected>Đã xác nhận</option>
                                    <option value="Chưa xác nhận">Chưa xác nhận</option>
                                    <option value="Đã hủy">Đã hủy</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(101)">
                                    <i class="bi bi-info-circle"></i> Chi tiết
                                </button>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil"></i> Sửa
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Chi tiết Booking -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Chi tiết Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailsContent">
                    <!-- Nội dung chi tiết sẽ được hiển thị ở đây -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tìm kiếm và lọc dữ liệu
        document.getElementById('searchBooking').addEventListener('input', filterBookings);
        document.getElementById('filterStatus').addEventListener('change', filterBookings);

        function filterBookings() {
            const searchValue = document.getElementById('searchBooking').value.toLowerCase();
            const statusValue = document.getElementById('filterStatus').value;
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const name = row.children[1].innerText.toLowerCase();
                const status = row.children[4].querySelector('select').value;

                if (
                    (name.includes(searchValue) || searchValue === '') &&
                    (status === statusValue || statusValue === '')
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function updateBookingStatus(selectElement, bookingId) {
            const newStatus = selectElement.value;
            alert(`Trạng thái Booking ${bookingId} đã được cập nhật thành "${newStatus}"`);
        }

        function viewDetails(bookingId) {
            const bookingDetails = {
                101: { customer: 'Nguyễn Văn A', tour: 'Hà Nội - Hạ Long', date: '2024-11-20', status: 'Đã xác nhận' },
            };

            const details = bookingDetails[bookingId];
            const detailsHTML = `
                <p><strong>Tên khách hàng:</strong> ${details.customer}</p>
                <p><strong>Tour:</strong> ${details.tour}</p>
                <p><strong>Ngày đặt:</strong> ${details.date}</p>
                <p><strong>Trạng thái:</strong> ${details.status}</p>
            `;

            document.getElementById('detailsContent').innerHTML = detailsHTML;
            const detailsModal = new bootstrap.Modal(document.getElementById('detailsModal'));
            detailsModal.show();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
