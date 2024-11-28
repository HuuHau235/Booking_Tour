<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/list_tour.css">
    <style>
        /* Căn chỉnh ảnh trong card */
        .card img {
            max-height: 200px;
            object-fit: cover;
        }

        /* Đặt lề mặc định */
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh Sách Tour</h2>
        <div class="d-flex">
            <input type="search" class="form-control me-2" placeholder="Tìm kiếm...">
            <button class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>

    <!-- Bộ lọc -->
    <form class="row mb-4">
        <div class="col-md-3">
            <label for="tour" class="form-label">Tour</label>
            <select id="tour" class="form-select">
                <option value="">All</option>
                <option>Hà Nội</option>
                <option>Đà Nẵng</option>
                <option>TP. Hồ Chí Minh</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" id="price" class="form-control" placeholder="e.g. 100-500">
        </div>
        <div class="col-md-3">
            <label for="type" class="form-label">Loại Tour</label>
            <select id="type" class="form-select">
                <option value="">All</option>
                <option selected>Exploration</option>
                <option>Relaxation</option>
                <option>Adventure</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-success w-100">Filter</button>
        </div>
    </form>

    <!-- Danh sách tour -->
    <div class="row">
        <?php
        // Kết nối cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "kimhien123";
        $dbname = "travel";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Truy vấn danh sách tour
        $sql = "SELECT t.tour_id, t.name, t.description, t.price, t.start_date, t.end_date, t.duration, t.type, ti.image_url, ti.caption 
                FROM Tour t 
                LEFT JOIN TourImage ti ON t.tour_id = ti.tour_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imageHtml = '';
                if ($row['image_url']) {
                    $imageHtml = '<img src="' . $row['image_url'] . '" alt="' . htmlspecialchars($row['caption']) . '" class="img-fluid">';
                }
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        ' . $imageHtml . '
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>
                            <p class="card-text">' . htmlspecialchars(substr($row['description'], 0, 100)) . '...</p>
                            <p><strong>Giá:</strong> ' . number_format($row['price'], 0, '.', ',') . '₫</p>
                            <p><strong>Loại:</strong> ' . htmlspecialchars($row['type']) . '</p>
                            <a href="detail.php?tour_id=' . htmlspecialchars($row['tour_id']) . '" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "<p class='text-center'>Không có tour nào.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
