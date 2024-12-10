<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

// Kết nối cơ sở dữ liệu
$mysqli = new mysqli("localhost", "root", "", "HappyTrips");

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

// Lấy booking_id từ URL
$booking_id = $_GET['booking_id'];

// Câu truy vấn lấy thông tin booking
$query = "SELECT b.booking_id, b.user_id, b.num_people, b.special_requirements, 
                 DATE_FORMAT(b.created_at, '%Y-%m-%d') AS booking_date, 
                 u.name AS customer_name, t.name AS tour_name
          FROM Booking b
          JOIN User u ON b.user_id = u.user_id
          JOIN Tour t ON b.tour_id = t.tour_id
          WHERE b.booking_id = $booking_id";

// Thực thi câu truy vấn
$result = $mysqli->query($query);
$booking = $result->fetch_assoc();

// Đóng kết nối
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Booking Details</h1>
        <?php if ($booking): ?>
            <table class="table table-bordered">
                <tr>
                    <th>Booking ID</th>
                    <td><?php echo $booking['booking_id']; ?></td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td><?php echo $booking['customer_name']; ?></td>
                </tr>
                <tr>
                    <th>Tour Name</th>
                    <td><?php echo $booking['tour_name']; ?></td>
                </tr>
                <tr>
                    <th>Booking Date</th>
                    <td><?php echo $booking['booking_date']; ?></td>
                </tr>
                <tr>
                    <th>Number of People</th>
                    <td><?php echo $booking['num_people']; ?></td>
                </tr>
                <tr>
                    <th>Special Requirements</th>
                    <td><?php echo $booking['special_requirements']; ?></td>
                </tr>
            </table>
        <?php else: ?>
            <p>No booking found with the provided ID.</p>
        <?php endif; ?>
        <a href="admin_booking.php" class="btn btn-primary mt-3">Back to Bookings</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
