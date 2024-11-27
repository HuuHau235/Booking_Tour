<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem form có được gửi đi hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $tour_id = 1; // Bạn có thể thay bằng ID tour thực tế (ví dụ lấy từ URL hoặc session)
    $user_id = 1; // Bạn có thể thay bằng ID người dùng thực tế (ví dụ lấy từ session)
    $name = $_POST['reviewName'];
    $content = $_POST['reviewContent'];
    $rating = $_POST['reviewRating'];

    // Chuẩn bị câu lệnh SQL để thêm đánh giá vào cơ sở dữ liệu
    $sql = "INSERT INTO Review (tour_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";

    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $tour_id, $user_id, $rating, $content);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "Đánh giá đã được gửi thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>
