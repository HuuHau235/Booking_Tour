<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
if (!isset($_SESSION['user_id'])) {
    echo "<div class='alert alert-warning'>Bạn cần đăng nhập để đánh giá.</div>";
    exit();
}
$user_id = $_SESSION['user_id'];

if (isset($_GET['tour_id']) && is_numeric($_GET['tour_id'])) {
    $tour_id = intval($_GET['tour_id']);
    
    $checkTourSQL = "SELECT tour_id FROM Tour WHERE tour_id = $tour_id";
    $checkTourResult = $conn->query($checkTourSQL);
    if (!$checkTourResult || $checkTourResult->num_rows === 0) {
        die("Tour ID không tồn tại.");
    }
} else {
    die("Không tìm thấy tour ID hợp lệ.");
}
$successMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = intval($_POST['rating']);
    $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');

    $stmt = $conn->prepare("INSERT INTO Review (tour_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $tour_id, $user_id, $rating, $comment);

    if ($stmt->execute()) {
        $successMessage = "Đánh giá đã được lưu thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}
$sql = "SELECT r.rating, r.comment, u.name FROM Review r JOIN User u ON r.user_id = u.user_id";
$result = $conn->query($sql);
if (!$result) {
    die("Lỗi truy vấn lấy đánh giá: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HappyTrips</title>
</head>
<body>
<div class="container my-5">
    <h2>Đánh giá Tour</h2>
    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>
    <ul class="list-group mb-3">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li class="list-group-item">
                    <strong>Name: </strong><?php echo htmlspecialchars($row['name']); ?><br>
                    <strong>Xếp hạng: </strong><?php echo str_repeat('⭐', $row['rating']); ?><br>
                    <strong>Nội dung: </strong><?php echo htmlspecialchars($row['comment']); ?><br>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <li class="list-group-item">Chưa có đánh giá nào!</li>
        <?php endif; ?>
    </ul>
    <form method="POST">
        <div class="mb-3">
            <label for="reviewRating" class="form-label">Xếp hạng:</label>
            <select class="form-select" id="reviewRating" name="rating" required>
                <option value="" disabled selected>Chọn đánh giá</option>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="reviewContent" class="form-label">Nội dung đánh giá:</label>
            <textarea class="form-control" id="reviewContent" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Gửi đánh giá</button>
    </form>
</div>
</body>
</html>
