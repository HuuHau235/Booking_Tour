<?php
session_start();

// Kết nối cơ sở dữ liệu
$mysqli = new mysqli("localhost", "root", "", "HappyTrips");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Kiểm tra và lấy dữ liệu từ POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

if (!isset($_POST['paymentMethod']) || empty($_POST['paymentMethod'])) {
    die("Payment method is missing.");
}

$payment_method = $_POST['paymentMethod'];
// echo $payment_method;
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    die("User is not logged in.");
}

// Truy vấn để lấy booking_id
$query_booking = "SELECT booking_id FROM Booking WHERE user_id = ? ORDER BY booking_id DESC LIMIT 1";
$stmt_booking = $mysqli->prepare($query_booking);
$stmt_booking->bind_param("i", $user_id);

if (!$stmt_booking->execute()) {
    die("Booking query failed: " . $stmt_booking->error);
}

$result_booking = $stmt_booking->get_result();

if ($result_booking->num_rows > 0) {
    $booking = $result_booking->fetch_assoc();
    $booking_id = $booking['booking_id'];

    // Chèn dữ liệu vào bảng payment
    $query_payment = "INSERT INTO Payment (user_id, booking_id, payment_method) VALUES (?, ?, ?)";
    $stmt_payment = $mysqli->prepare($query_payment);

    if (!$stmt_payment) {
        die("Prepare statement failed: " . $mysqli->error);
    }

    $stmt_payment->bind_param("iis", $user_id, $booking_id, $payment_method);

    if ($stmt_payment->execute()) {
        
        header('location: index.php');
    } else {
        die("Insert payment failed: " . $stmt_payment->error);
    }
} else {
    die("No booking found for user_id: " . $user_id);
}
?>
