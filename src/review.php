<?php
$servername = "localhost"; // Thay đổi nếu cần
$username = "root";        // Tài khoản database
$password = "";            // Mật khẩu database
$dbname = "TravelAgency"; // Tên database của bạn

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xác định hành động (lấy danh sách đánh giá hoặc thêm đánh giá mới)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lấy danh sách đánh giá theo tour_id
    $tour_id = isset($_GET['tour_id']) ? intval($_GET['tour_id']) : 0;
    $query = "SELECT r.rating, r.comment, u.username 
              FROM Review r
              JOIN User u ON r.user_id = u.user_id
              WHERE r.tour_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $tour_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    // Trả về JSON
    header('Content-Type: application/json');
    echo json_encode($reviews);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Thêm một đánh giá mới
    $tour_id = intval($_POST['tour_id']);
    $user_id = intval($_POST['user_id']);
    $rating = intval($_POST['rating']);
    $comment = trim($_POST['comment']);

    if ($rating < 1 || $rating > 5 || empty($comment)) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid input"]);
        exit;
    }

    $query = "INSERT INTO Review (tour_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiis", $tour_id, $user_id, $rating, $comment);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "Failed to submit review"]);
    }
}

$conn->close();
?>
