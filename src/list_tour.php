<?php
$servername = "localhost";

// Kết nối cơ sở dữ liệu
$username = "root";
$password = "";
$dbname = "HappyTrips";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Hàm xử lý giá (price filter)
function buildPriceFilter($priceInput) {
    $priceFilter = ['condition' => '', 'paramTypes' => '', 'paramValues' => []];
    $priceInput = trim($priceInput); // Xóa khoảng trắng thừa

    // Kiểm tra nếu nhập khoảng giá (ví dụ: "1000000-2000000")
    if (strpos($priceInput, '-') !== false) {
        $priceRange = explode('-', $priceInput);
        if (count($priceRange) === 2 && is_numeric($priceRange[0]) && is_numeric($priceRange[1]) && (int)$priceRange[0] <= (int)$priceRange[1]) {
            $priceFilter['condition'] = "t.price BETWEEN ? AND ?";
            $priceFilter['paramTypes'] = 'ii';
            $priceFilter['paramValues'] = [(int)$priceRange[0], (int)$priceRange[1]];
        }
    }
    // Kiểm tra nếu nhập một giá duy nhất (ví dụ: "3000000")
    elseif (is_numeric($priceInput)) {
        $priceFilter['condition'] = "t.price = ?";
        $priceFilter['paramTypes'] = 'i';
        $priceFilter['paramValues'] = [(int)$priceInput];
    }

    return $priceFilter;
}

// Xây dựng bộ lọc tìm kiếm
function buildFilters($postData) {
    $filters = ['conditions' => [], 'paramTypes' => '', 'paramValues' => []];

    // Lọc theo tên tour
    if (!empty($postData['tour']) && strtolower($postData['tour']) !== 'all') {
        $filters['conditions'][] = "t.name LIKE ?";
        $filters['paramTypes'] .= 's';
        $filters['paramValues'][] = '%' . $postData['tour'] . '%';
    }

    // Lọc theo giá
    if (!empty($postData['price'])) {
        $priceFilter = buildPriceFilter($postData['price']);
        if ($priceFilter['condition']) {
            $filters['conditions'][] = $priceFilter['condition'];
            $filters['paramTypes'] .= $priceFilter['paramTypes'];
            $filters['paramValues'] = array_merge($filters['paramValues'], $priceFilter['paramValues']);
        }
    }

    // Lọc theo loại tour
    if (!empty($postData['type']) && strtolower($postData['type']) !== 'all') {
        $filters['conditions'][] = "t.type = ?";
        $filters['paramTypes'] .= 's';
        $filters['paramValues'][] = $postData['type'];
    }

    // Tìm kiếm theo từ khóa
    if (!empty($postData['search'])) {
        $filters['conditions'][] = "(t.name LIKE ? OR t.description LIKE ?)";
        $filters['paramTypes'] .= 'ss';
        $filters['paramValues'][] = '%' . $postData['search'] . '%';
        $filters['paramValues'][] = '%' . $postData['search'] . '%';
    }

    return $filters;
}

// Lấy danh sách tour từ cơ sở dữ liệu
function getTours($conn, $filters) {
    $sql = "SELECT t.tour_id, t.name, t.description, t.price, t.start_date, t.end_date, 
                   t.duration, t.type, ti.image_url, ti.caption 
            FROM Tour t 
            LEFT JOIN TourImage ti ON t.tour_id = ti.tour_id";

    if (!empty($filters['conditions'])) {
        $sql .= " WHERE " . implode(" AND ", $filters['conditions']);
    }
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Lỗi chuẩn bị truy vấn: " . $conn->error . "\nSQL: " . $sql);
    }
    if (!empty($filters['paramTypes'])) {
        $stmt->bind_param($filters['paramTypes'], ...$filters['paramValues']);
    }
    $stmt->execute();
    return $stmt->get_result();
}

// Xử lý yêu cầu POST
$filters = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filters = buildFilters($_POST);
}
$tours = getTours($conn, $filters);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/list_tour.css">
    <style>
        .sticky-filter {
            position: sticky;
            top: 100px;
            z-index: 10;
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
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
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-filter">
                    <form method="POST" action="">
                        <div class="mb-3 d-flex">
                            <input type="search" name="search" class="form-control me-2" placeholder="Search...">
                            <button type="submit" class="btn btn-primary text-white">Search</button>
                        </div>
                        <div class="mb-3">
                            <label for="tour" class="form-label">Tour</label>
                            <select id="tour" name="tour" class="form-select">
                            <option value="all">All</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Hải Phòng">Hải Phòng</option>
                            <option value="Bắc Giang">Bắc Giang</option>
                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                            <option value="Đà Lạt">Đà Lạt</option>
                            <option value="Hạ Long">Hạ Long</option>
                            <option value="Nha Trang">Nha Trang</option>
                            <option value="Quảng Bình">Quảng Bình</option>
                            <option value="Quảng Ngãi">Quảng Ngãi</option>
                            <option value="Hội An">Hội An</option>
                            <option value="Huế">Huế</option>
                            <option value="Tam Đảo">Tam Đảo</option>
                            <option value="Sài Gòn">Sài Gòn</option>
                            <option value="Lý Sơn">Lý Sơn</option>
                            <option value="Quy Nhơn">Quy Nhơn</option>
                            <option value="Sa Pa">Sa Pa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" name="price" class="form-control" placeholder="e.g. 1000000-2000000 or 3000000">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tour Type</label>
                            <select id="type" name="type" class="form-select">
                                <option value="all">All</option>
                                <option value="exploration">Exploration</option>
                                <option value="relaxation">Relaxation</option>
                                <option value="adventure">Adventure</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Filter</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php if ($tours->num_rows > 0): ?>
                        <?php while ($row = $tours->fetch_assoc()): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <?php if (!empty($row['image_url'])): ?>
                                        <img src="<?= htmlspecialchars($row['image_url']); ?>" 
                                             alt="<?= htmlspecialchars($row['caption']); ?>" 
                                             class="img-fluid">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($row['name']); ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
                                        <p><strong>Price:</strong> <?= number_format($row['price'], 0, '.', ','); ?>₫</p>
                                        <p><strong>Type:</strong> <?= htmlspecialchars($row['type']); ?></p>
                                        <a href="detail.php?tour_id=<?= $row['tour_id']; ?>" class="btn btn-primary">More details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No tours found</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>