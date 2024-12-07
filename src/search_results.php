<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy các tham số tìm kiếm từ URL (query string)
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
$activity = isset($_GET['activity']) ? $_GET['activity'] : '';
$duration = isset($_GET['duration']) ? $_GET['duration'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';

// Xây dựng truy vấn với các điều kiện dựa trên bộ lọc
$sql = "SELECT * FROM Tour WHERE 1=1"; // Điều kiện luôn đúng


$sql = "SELECT t.*, ti.image_url 
        FROM Tour t 
        LEFT JOIN TourImage ti ON t.tour_id = ti.tour_id
        WHERE 1=1";

if (!empty($searchTerm)) {
    $searchTerm = strtolower($searchTerm); // Chuyển từ khóa tìm kiếm thành chữ thường
    $sql .= " AND LOWER(city) LIKE '$searchTerm'"; // Tìm kiếm tên thành phố không phân biệt chữ hoa chữ thường
}

if (!empty($activity)) {
    $activity = strtolower($activity); // Đảm bảo giá trị tìm kiếm ở dạng chữ thường
    $sql .= " AND type = '$activity'"; // Lọc theo loại hoạt động
}

if (!empty($duration)) {
    // Xử lý duration dạng '2-4' hoặc '1'
    if (strpos($duration, '-') !== false) {
        list($min, $max) = explode('-', $duration);
        $sql .= " AND duration BETWEEN $min AND $max"; // Sử dụng BETWEEN cho khoảng thời gian
    } else {
        $sql .= " AND duration = '$duration'"; // Lọc theo duration nếu là số đơn
    }
}

if (!empty($date)) {
    // Lọc theo ngày bắt đầu của tour
    $sql .= " AND start_date >= '$date'"; 
}

// Debugging: In ra truy vấn SQL để kiểm tra
// echo $sql;

// Thực thi truy vấn
$result = $conn->query($sql);

// Kiểm tra lỗi truy vấn
if ($conn->error) {
    echo "Lỗi truy vấn: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/list_tour.css">
    <style>
        body {
            font-family: "Tinos", serif  !important;
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            width: 500px;
            margin-left:100px;
        }
        .card-body {
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-text {
            height: 60px; 
            overflow: hidden; 
            text-overflow: ellipsis; 
            white-space: normal;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
</head>
<body>

    <?php include 'hea.php'; ?>

    <div class="container py-5">

        <div class="row mt-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-6 mb-4'>";
                    echo "<div class='card'>";
                    // Hiển thị ảnh nếu có
                    if (!empty($row['image_url'])) {
                        echo "<img src='" . htmlspecialchars($row['image_url']) . "' class='img-fluid'>";
                    }
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>";
                    echo "<p class='card-text'>" . htmlspecialchars(substr($row['description'], 0, 100)) . '...</p>';
                    echo "<p><strong>Price:</strong> " . number_format($row['price'], 0, '.', ',') . "₫</p>";
                    echo "<p><strong>Type:</strong> " . htmlspecialchars($row['type']) . "</p>";
                    echo "<a href='detail.php?tour_id=" . htmlspecialchars($row['tour_id']) . "' class='btn btn-primary'>Detail</a>";
                    echo "</div></div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No tours found for the given criteria.</p>";
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
