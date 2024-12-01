<?php
$servername = "localhost";
$username = "root";
$password = "kimhien123";
$dbname = "HappyTrips";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

function getTours($conn, $filters) {
    $sql = "SELECT t.tour_id, t.name, t.description, t.price, t.start_date, t.end_date, t.duration, t.type, ti.image_url, ti.caption 
            FROM Tour t 
            LEFT JOIN TourImage ti ON t.tour_id = ti.tour_id";
    $paramTypes = '';
    $paramValues = [];
    if (!empty($filters)) {
        $sql .= " WHERE " . implode(" AND ", $filters['conditions']);
        $paramTypes = $filters['paramTypes'];
        $paramValues = $filters['paramValues'];
    }
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Lỗi chuẩn bị truy vấn: " . $conn->error);
    }
    if (!empty($filters)) {
        $stmt->bind_param($paramTypes, ...$paramValues);
    }
    $stmt->execute();
    return $stmt->get_result();
}

function buildFilters($postData) {
    $filters = ['conditions' => [], 'paramTypes' => '', 'paramValues' => []];
    if (!empty($postData['tour']) && $postData['tour'] != 'all') {
        $filters['conditions'][] = "t.name LIKE ?";
        $filters['paramTypes'] .= 's';
        $filters['paramValues'][] = '%' . $postData['tour'] . '%';
    }
    if (!empty($postData['price'])) {
        $priceRange = explode('-', $postData['price']);
        if (count($priceRange) === 2) {
            $filters['conditions'][] = "t.price BETWEEN ? AND ?";
            $filters['paramTypes'] .= 'ii';
            $filters['paramValues'][] = (int)$priceRange[0];
            $filters['paramValues'][] = (int)$priceRange[1];
        }
    }
    if (!empty($postData['type']) && $postData['type'] != 'all') {
        $filters['conditions'][] = "t.type = ?";
        $filters['paramTypes'] .= 's';
        $filters['paramValues'][] = $postData['type'];
    }
    if (!empty($postData['search'])) {
        $filters['conditions'][] = "(t.name LIKE ? OR t.description LIKE ?)";
        $filters['paramTypes'] .= 'ss';
        $filters['paramValues'][] = '%' . $postData['search'] . '%';
        $filters['paramValues'][] = '%' . $postData['search'] . '%';
    }
    return $filters;
}

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
</head>
<body>
    <?php include 'hea.php'; ?>
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <form method="POST" action="">
                    <div class="mb-3 d-flex">
                        <input type="search" name="search" class="form-control me-2" placeholder="Search...">
                        <button class="btn btn-primary text-white">Search</button>
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
                        <input type="text" id="price" name="price" class="form-control" placeholder="e.g. 100-500">
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
                    <div>
                        <button type="submit" class="btn btn-success w-100">Filter</button>
                    </div>
                </form>
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
                                        <p class="card-text"><?= htmlspecialchars(substr($row['description'], 0, 100)) . '...'; ?></p>
                                        <p><strong>Price:</strong> <?= number_format($row['price'], 0, '.', ','); ?>₫</p>
                                        <p><strong>Type:</strong> <?= htmlspecialchars($row['type']); ?></p>
                                        <a href="detail.php?tour_id=<?= htmlspecialchars($row['tour_id']); ?>" 
                                           class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center">Không có tour nào phù hợp.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>