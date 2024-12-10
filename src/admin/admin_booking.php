<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

// Kết nối cơ sở dữ liệu
$mysqli = new mysqli("localhost", "root", "", "HappyTrips");

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

// Câu truy vấn lấy thông tin booking
$query = "SELECT b.booking_id, b.user_id, b.num_people, b.special_requirements, 
                 DATE_FORMAT(b.created_at, '%Y-%m-%d') AS booking_date, 
                 u.name AS customer_name, t.name AS tour_name
          FROM Booking b
          JOIN User u ON b.user_id = u.user_id
          JOIN Tour t ON b.tour_id = t.tour_id
          ORDER BY b.booking_id DESC";

// Thực thi câu truy vấn
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
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
                    <a href="admin_tours.php" class="nav-link"><i class="bi bi-card-list"></i> Manage Tours</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_booking.php" class="nav-link"><i class="bi bi-book"></i> Manage Bookings</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_customers.php" class="nav-link"><i class="bi bi-person"></i> Manage Customers</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_invoices.php" class="nav-link"><i class="bi bi-receipt"></i> Payments & Invoices</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_feedback.php" class="nav-link"><i class="bi bi-chat-left-text"></i> Feedback</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Manage Bookings</h1>

            <!-- Search and Filter -->
            <div class="d-flex mb-3">
                <input type="text" id="searchBooking" class="form-control me-2" placeholder="Search by customer name...">
                <select id="filterStatus" class="form-select me-2">
                    <option value="">All statuses</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Booking Table -->
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered" id="bookingTable">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Customer Name</th>
                            <th>Tour Name</th>
                            <th>Booking Date</th>
                            <th>Number of People</th>
                            <th>Special Requirements</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['booking_id']; ?></td>
                                    <td><?php echo $row['customer_name']; ?></td>
                                    <td><?php echo $row['tour_name']; ?></td>
                                    <td><?php echo $row['booking_date']; ?></td>
                                    <td><?php echo $row['num_people']; ?></td>
                                    <td><?php echo $row['special_requirements']; ?></td>
                                    <td>
                                    <select class="form-select" onchange="updateBookingStatus(this, <?php echo $row['booking_id']; ?>)">
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="viewDetails(<?php echo $row['booking_id']; ?>)">Details</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No bookings found.</p>
            <?php endif; ?>

            <?php $mysqli->close(); ?>
        </div>
    </div>

    <!-- Booking Details Modal -->
    <script>
        // Search and filter bookings
        document.getElementById('searchBooking').addEventListener('input', filterBookings);
        document.getElementById('filterStatus').addEventListener('change', filterBookings);

        function filterBookings() {
            const searchValue = document.getElementById('searchBooking').value.toLowerCase();
            const statusValue = document.getElementById('filterStatus').value;
            const rows = document.querySelectorAll('#bookingTable tbody tr');

            rows.forEach(row => {
                const name = row.children[1].innerText.toLowerCase();
                const status = row.children[6].querySelector('select').value;

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
            // Gửi yêu cầu Ajax để cập nhật trạng thái
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_booking_status.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert('Booking status updated to ' + newStatus);
                }
            };
            xhr.send('booking_id=' + bookingId + '&status=' + newStatus);
        }

        function viewDetails(bookingId) {
            window.location.href = 'booking_detail.php?booking_id=' + bookingId;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
