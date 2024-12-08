<?php
require_once('../../MySQL/Createdatabase.php'); // Kết nối cơ sở dữ liệu

// Truy vấn dữ liệu khách hàng
$sql = "SELECT * FROM User";
$res = mysqli_query($conn, $sql);

if (!$res) {
    echo "Lỗi khi truy vấn cơ sở dữ liệu.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Khách hàng</title>
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
            <h1>Quản lý Khách hàng</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày tham gia</th>
                            <th>Quyền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td>{$row['user_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['created_at']}</td>
                                <td>" . ($row['role'] == 1 ? "User" : "Admin") . "</td>
                                <td>
                                    <button class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#viewCustomerModal' 
                                    data-customer-name='{$row['name']}' 
                                    data-customer-email='{$row['email']}' 
                                    data-customer-phone='{$row['phone']}'
                                    data-customer-address='{$row['address']}' 
                                    data-customer-date='{$row['created_at']}'>Xem</button>
                                    <button class='btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#confirmLockModal' 
                                    data-customer-id='{$row['user_id']}'>Khóa/Mở</button>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Xem thông tin Khách hàng -->
    <div class="modal fade" id="viewCustomerModal" tabindex="-1" aria-labelledby="viewCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewCustomerModalLabel">Thông tin khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Tên:</strong> <span id="customerName"></span></p>
                    <p><strong>Email:</strong> <span id="customerEmail"></span></p>
                    <p><strong>Số điện thoại:</strong> <span id="customerPhone"></span></p>
                    <p><strong>Địa chỉ:</strong> <span id="customerAddress"></span></p>
                    <p><strong>Ngày tham gia:</strong> <span id="customerDate"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Khóa/Mở tài khoản khách hàng -->
    <div class="modal fade" id="confirmLockModal" tabindex="-1" aria-labelledby="confirmLockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmLockModalLabel">Xác nhận khóa/mở tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn thay đổi trạng thái tài khoản khách hàng này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a id="confirmLockBtn" class="btn btn-warning">Thực hiện</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Xử lý modal Xem thông tin khách hàng
        const viewCustomerModal = document.getElementById('viewCustomerModal');
        viewCustomerModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const customerName = button.getAttribute('data-customer-name');
            const customerEmail = button.getAttribute('data-customer-email');
            const customerPhone = button.getAttribute('data-customer-phone');
            const customerAddress = button.getAttribute('data-customer-address');  // Thêm địa chỉ
            const customerDate = button.getAttribute('data-customer-date');  // Thêm ngày tham gia

            viewCustomerModal.querySelector('#customerName').textContent = customerName;
            viewCustomerModal.querySelector('#customerEmail').textContent = customerEmail;
            viewCustomerModal.querySelector('#customerPhone').textContent = customerPhone;
            viewCustomerModal.querySelector('#customerAddress').textContent = customerAddress;  // Cập nhật địa chỉ
            viewCustomerModal.querySelector('#customerDate').textContent = customerDate;  // Cập nhật ngày tham gia
        });


        // Xử lý modal Khóa/Mở tài khoản
        const confirmLockModal = document.getElementById('confirmLockModal');
        confirmLockModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-customer-id');
            const lockBtn = confirmLockModal.querySelector('#confirmLockBtn');
            lockBtn.href = `lock_unlock_customer.php?id=${userId}`; // Tạo trang xử lý khóa/mở
        });
    </script>
</body>
</html>
