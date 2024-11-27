<?php
$servername = "localhost";
$username = "root";  // hoặc tên người dùng của bạn
$password = "";  // hoặc mật khẩu của bạn
$dbname = "HappyTrips";  // thay thế bằng tên cơ sở dữ liệu của bạn

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy danh sách tour và hình ảnh liên quan
$sql = "SELECT t.tour_id, t.name, t.description, t.price, t.start_date, t.end_date, t.duration, t.type, ti.image_url, ti.caption 
        FROM Tour t 
        LEFT JOIN TourImage ti ON t.tour_id = ti.tour_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABQxSgENRwyqTlhWgfu6g9g6A6PqaPeXz8Hd8gE5n5Yl7j1o5T6/eVAd" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/list_tour.css">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Danh Sách Tour</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Duyệt qua các tour
                while($row = $result->fetch_assoc()) {
                    // Kiểm tra nếu có hình ảnh cho tour này
                    $imageHtml = '';
                    if ($row['image_url']) {
                        $imageHtml = '<img src="' . $row['image_url'] . '" alt="' . $row['caption'] . '" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">';
                    }
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            ' . $imageHtml . '
                            <div class="card-body">
                                <h5 class="card-title">' . $row['name'] . '</h5>
                                <p class="card-text">' . substr($row['description'], 0, 100) . '...</p>
                                <p><strong>Giá:</strong> ' . number_format($row['price'], 2) . '₫</p>
                                <p><strong>Loại tour:</strong> ' . $row['type'] . '</p>
                                <a href="detail.php?tour_id=' . $row['tour_id'] . '" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "<p class='text-center'>Không có tour nào.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Thêm Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
