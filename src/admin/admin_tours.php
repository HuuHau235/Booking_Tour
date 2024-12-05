<?php
// Kết nối cơ sở dữ liệu
session_start();
include('config.php');

// Kiểm tra kết nối cơ sở dữ liệu
if (!isset($conn) || $conn->connect_error) {
    die('Kết nối cơ sở dữ liệu thất bại: ' . $conn->connect_error);
}

// Tạo CSRF token nếu chưa có
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Xử lý xóa tour
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $tourId = intval($_GET['delete_id']);
    $sql = "DELETE FROM Tour WHERE tour_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tourId);
    if ($stmt->execute()) {
        header("Location: admin_tours.php");
        exit;
    } else {
        echo "<script>alert('Lỗi khi xóa tour!');</script>";
    }
}

// Xử lý thêm hoặc sửa tour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Yêu cầu không hợp lệ.');
    }

    $tourId = $_POST['tour_id'] ?? null;
    $tourName = trim($_POST['tourName']);
    $tourDescription = trim($_POST['tourDescription']);
    $tourPrice = $_POST['tourPrice'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $duration = $_POST['duration'];
    $type = $_POST['type'];

    // Kiểm tra dữ liệu hợp lệ
    if (empty($tourName) || empty($tourPrice) || !is_numeric($tourPrice) || empty($startDate) || empty($endDate) || empty($duration) || empty($type)) {
        echo "<script>alert('Vui lòng điền thông tin đầy đủ và hợp lệ!');</script>";
    } else {
        if ($tourId) {
            // Cập nhật tour
            $sql = "UPDATE Tour SET name = ?, description = ?, price = ?, start_date = ?, end_date = ?, duration = ?, type = ? WHERE tour_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsdsii", $tourName, $tourDescription, $tourPrice, $startDate, $endDate, $duration, $type, $tourId);
        } else {
            // Thêm mới tour
            $sql = "INSERT INTO Tour (name, description, price, start_date, end_date, duration, type) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsdsi", $tourName, $tourDescription, $tourPrice, $startDate, $endDate, $duration, $type);
        }

        if ($stmt->execute()) {
            header("Location: admin_tours.php");
            exit;
        } else {
            echo "<script>alert('Lỗi khi lưu tour!');</script>";
        }
    }
}

// Lấy danh sách tours
$sql = "SELECT * FROM Tour";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
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
<nav class="sidebar">
    <h4><i class="bi bi-gear-fill"></i> Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-3"><a href="admin_tours.php" class="nav-link"><i class="bi bi-card-list"></i> Quản lý Tour</a></li>
        <li class="nav-item mb-3"><a href="admin_booking.php" class="nav-link"><i class="bi bi-book"></i> Quản lý Booking</a></li>
        <li class="nav-item mb-3"><a href="admin_customers.php" class="nav-link"><i class="bi bi-person"></i> Quản lý Khách hàng</a></li>
        <li class="nav-item mb-3"><a href="admin_invoices.php" class="nav-link"><i class="bi bi-receipt"></i> Thanh toán & Hóa đơn</a></li>
        <li class="nav-item mb-3"><a href="admin_feedback.php" class="nav-link"><i class="bi bi-chat-left-text"></i> Đánh giá</a></li>
    </ul>
</nav>

<div class="main-content">
    <h1>Quản lý Tours</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tourModal">Thêm Tour</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Tour</th>
                <th>Mô tả</th>
                <th>Giá (VND)</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Thời lượng</th>
                <th>Loại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['tour_id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= number_format($row['price'], 0, ',', '.') ?></td>
                        <td><?= $row['start_date'] ?></td>
                        <td><?= $row['end_date'] ?></td>
                        <td><?= $row['duration'] ?> ngày</td>
                        <td><?= ucfirst($row['type']) ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#tourModal" 
                                data-id="<?= $row['tour_id'] ?>" data-name="<?= $row['name'] ?>" 
                                data-description="<?= $row['description'] ?>" data-price="<?= $row['price'] ?>" 
                                data-start="<?= $row['start_date'] ?>" data-end="<?= $row['end_date'] ?>" 
                                data-duration="<?= $row['duration'] ?>" data-type="<?= $row['type'] ?>">Sửa</button>
                            <a href="?delete_id=<?= $row['tour_id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">Không có tour nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Thêm/Sửa Tour -->
<div class="modal fade" id="tourModal" tabindex="-1" aria-labelledby="tourModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tourModalLabel">Thêm/Sửa Tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="tour_id" id="tour_id">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <div class="mb-3">
                        <label for="tourName" class="form-label">Tên Tour</label>
                        <input type="text" name="tourName" id="tourName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tourDescription" class="form-label">Mô tả</label>
                        <textarea name="tourDescription" id="tourDescription" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tourPrice" class="form-label">Giá</label>
                        <input type="number" name="tourPrice" id="tourPrice" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Ngày bắt đầu</label>
                        <input type="date" name="startDate" id="startDate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">Ngày kết thúc</label>
                        <input type="date" name="endDate" id="endDate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Thời gian</label>
                        <input type="number" name="duration" id="duration" class="form-control" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Loại Tour</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="adventure">Mạo hiểm</option>
                            <option value="relaxation">Thư giãn</option>
                            <option value="cultural">Văn hóa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2024 Quản lý Tours</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fill modal with data for edit
        const tourModal = document.getElementById('tourModal');
        tourModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const tourId = button.getAttribute('data-id');
            const tourName = button.getAttribute('data-name');
            const tourDescription = button.getAttribute('data-description');
            const tourPrice = button.getAttribute('data-price');
            const startDate = button.getAttribute('data-start');
            const endDate = button.getAttribute('data-end');
            const duration = button.getAttribute('data-duration');
            const type = button.getAttribute('data-type');

            const modal = tourModal.querySelector('form');
            modal.querySelector('#tour_id').value = tourId || '';
            modal.querySelector('#tourName').value = tourName || '';
            modal.querySelector('#tourDescription').value = tourDescription || '';
            modal.querySelector('#tourPrice').value = tourPrice || '';
            modal.querySelector('#startDate').value = startDate || '';
            modal.querySelector('#endDate').value = endDate || '';
            modal.querySelector('#duration').value = duration || '';
            modal.querySelector('#type').value = type || 'adventure';
        });
    }); 
</script>
</body>
</html>
