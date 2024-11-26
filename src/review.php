<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý form khi người dùng gửi đánh giá
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tour_id = 22; // Thay thế bằng ID của tour hiện tại
    $user_id = 1; // Thay thế bằng ID người dùng đã đăng nhập (nếu có hệ thống đăng nhập)
    $rating = intval($_POST['rating']);
    $comment = $conn->real_escape_string($_POST['comment']);

    $sql = "INSERT INTO Review (tour_id, user_id, rating, comment) VALUES ($tour_id, $user_id, $rating, '$comment')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đánh giá đã được lưu thành công!');</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Truy vấn danh sách đánh giá
$sql = "SELECT * FROM Review WHERE tour_id = 1"; // Lấy đánh giá cho tour hiện tại
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/detail.css">
    <title>Review</title>
</head>
<body>
<div class="container my-5">
    <section id="nhan-xet">
        <div class="mt-5">
            <h2>Review</h2>
            <ul class="list-group mb-3" id="reviewList">
                <!-- Hiển thị đánh giá từ cơ sở dữ liệu -->
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <li class="list-group-item">
                            <strong>Xếp hạng: </strong><?php echo str_repeat('⭐', $row['rating']); ?><br>
                            <strong>Nội dung: </strong><?php echo htmlspecialchars($row['comment']); ?><br>
                        </li>
                    <?php endwhile; ?>
                <?php else: ?>
                    <li class="list-group-item">Chưa có đánh giá nào!</li>
                <?php endif; ?>
            </ul>
            <!-- Form gửi đánh giá -->
            <form id="reviewForm" method="POST" action="">
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
    </section><br><br>
    <script>
document.getElementById("reviewForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Ngăn form tải lại trang

    // Lấy dữ liệu từ form
    const tourId = <?= $tour_id ?>; // ID tour hiện tại
    const rating = document.getElementById("reviewRating").value;
    const comment = document.getElementById("reviewContent").value;

    // Gửi AJAX đến server
    fetch("save_review.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `tour_id=${tourId}&rating=${rating}&comment=${encodeURIComponent(comment)}`
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert("Có lỗi xảy ra: " + data.error);
            } else {
                // Thêm đánh giá mới vào danh sách
                const reviewList = document.getElementById("reviewList");
                const newReview = document.createElement("li");
                newReview.classList.add("list-group-item");
                newReview.innerHTML = `
                    <strong>Xếp hạng: </strong>${'⭐'.repeat(data.rating)}<br>
                    <strong>Nội dung: </strong>${data.comment}<br>
                `;
                reviewList.appendChild(newReview);

                // Reset form
                document.getElementById("reviewForm").reset();
                alert("Đánh giá đã được lưu thành công!");
            }
        })
        .catch(error => console.error("Lỗi:", error));
});
</script>

</div>
</body>
</html>
