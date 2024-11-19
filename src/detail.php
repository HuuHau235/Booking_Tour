<?php
// Kết nối tới cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=eprojects', 'root', '');

// Lấy ID của tour từ URL
$id = $_GET['id'] ?? 0;

// Kiểm tra ID hợp lệ
if (!$id) {
    echo "Tour không hợp lệ!";
    exit;
}

// Truy vấn chi tiết tour từ bảng `Tour`
$query = $pdo->prepare('SELECT * FROM Tour WHERE id = :id');
$query->execute(['id' => $id]);
$tour = $query->fetch(PDO::FETCH_ASSOC);

// Kiểm tra nếu không tìm thấy tour
if (!$tour) {
    echo "Không tìm thấy thông tin tour!";
    exit;
}

// Lấy các đánh giá từ cơ sở dữ liệu
$sql = "SELECT * FROM Review WHERE tour_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tour_id);
$stmt->execute();
$result = $stmt->get_result();

// Hiển thị các đánh giá
while ($row = $result->fetch_assoc()) {
    echo "<div class='review-item'>";
    echo "<strong>" . htmlspecialchars($row['user_id']) . ":</strong> " . htmlspecialchars($row['comment']) . "<br>";
    echo "<strong>Đánh giá:</strong> " . htmlspecialchars($row['rating']) . " sao";
    echo "</div><br>";
}
// Truy vấn tất cả hình ảnh của tour từ bảng `TourImage`
$imageQuery = $pdo->prepare('SELECT * FROM TourImage WHERE tour_id = :tour_id');
$imageQuery->execute(['tour_id' => $id]);
$images = $imageQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tour</title>
    <!-- Liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <h1 class="text-center mb-4">Chi Tiết Tour Du Lịch</h1>
    <div class="container mt-5">
        
        <div class="row">
            <!-- Cột hiển thị hình ảnh -->
            <div class="col-md-6">
                <!-- Hiển thị hình ảnh chính của tour -->
                <img src="<?= htmlspecialchars($tour['image_url'] ?? 'https://via.placeholder.com/600x400') ?>" alt="<?= htmlspecialchars($tour['name']) ?>" class="img-fluid rounded shadow" style="max-width: 300px; height: 300px;">
            </div>
            
            <!-- Cột hiển thị thông tin tour -->
            <div class="col-md-6">
                <h2 class="mb-3"><?= htmlspecialchars($tour['name']) ?></h2>
                <p><strong>Mô tả:</strong> <?= htmlspecialchars($tour['description']) ?></p>
                <p><strong>Giá:</strong> <?= number_format($tour['price'], 0, ',', '.') ?>đ</p>
                <p><strong>Ngày bắt đầu:</strong> <?= htmlspecialchars($tour['start_date']) ?></p>
                <p><strong>Ngày kết thúc:</strong> <?= htmlspecialchars($tour['end_date']) ?></p>
                <p><strong>Thời lượng:</strong> <?= htmlspecialchars($tour['duration']) ?> ngày</p>
                <p><strong>Loại hình:</strong> <?= htmlspecialchars($tour['type']) ?></p>
                <a href="#" class="btn btn-danger mt-3">Đặt Tour Ngay</a>
            </div>
        </div>

        <div class="mt-5">
            <h3>Hình ảnh liên quan</h3>
            <div class="row">
                <?php foreach ($images as $image): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?= htmlspecialchars($image['image_url']) ?>" alt="<?= htmlspecialchars($image['caption']) ?>" class="card-img-top" style="max-width: 100px; height: 100px;">
                            <div class="card-body">
                                <p class="card-text"><?= htmlspecialchars($image['caption']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <div class="nav-links">
    <a href="#gioi-thieu">Giới thiệu</a>
    <a href="#lich-trinh">Lịch trình</a>
    <a href="#bang-gia">Bảng giá</a>
    <a href="#nhan-xet">Nhận xét</a>
    </div>

    <section id="gioi-thieu">
        <h2>Giới thiệu</h2>
        <p>Hà Nội, thủ đô nghìn năm văn hiến của Việt Nam,
        là một thành phố đầy quyến rũ với sự pha trộn giữa vẻ đẹp cổ kính và hiện đại.
        Những con phố cổ kính như Hàng Gai, Hàng Bạc, với các ngôi nhà thấp tầng mang đậm dấu ấn lịch sử, 
        dường như vẫn giữ lại những câu chuyện xưa cũ của thủ đô. Hồ Hoàn Kiếm, với nước xanh trong vắt và đền Ngọc Sơn nằm giữa, 
        là biểu tượng không thể thiếu của Hà Nội. Thành phố này cũng nổi bật với các công trình kiến trúc cổ điển như Chùa Một Cột, 
        Lăng Chủ tịch Hồ Chí Minh, và Nhà hát Lớn. Bên cạnh đó, sự phát triển mạnh mẽ của các khu đô thị mới cũng khiến Hà Nội trở nên năng động và hiện đại hơn bao giờ hết. 
        Hà Nội không chỉ là nơi lưu giữ di sản văn hóa, mà còn là một điểm đến lý tưởng cho những ai yêu thích sự hòa quyện giữa quá khứ và tương lai.</p>
    </section>

    <section id="lich-trinh">
        <h2>Lịch trình</h2>
        <p><strong>Ngày 1:</strong> Hà Nội - Đà nẵng</p>
        <p><strong>Ngày 2:</strong> Đà nẵng - Quảng Nam</p>
        <p><strong>Ngày 3:</strong> Quảng Nam - Quảng Ngãi</p>
        <p><strong>Ngày 4:</strong> Quảng Ngãi - Quảng Trị</p>
        <p><strong>Ngày 5:</strong> Quảng Trị - Kon Tum</p>
        <p><strong>Ngày 6:</strong> Kon Tum - Bắc Kinh</p>
        <p><strong>Ngày 7:</strong> Bắc Kinh - Hà Nội</p>
    </section>

    <section id="bang-gia">
        <h2>Bảng giá</h2>
        <table>
            <thead>
                <tr>
                    <th>Ngày khởi hành</th>
                    <th>Hạng tour</th>
                    <th>Giá tour</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["thang_khoi_hanh"] . "</td>";
                        echo "<td>" . $row["hang_tour"] . "</td>";
                        echo "<td>" . number_format($row["gia"], 0, ',', '.') . "đ</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <form id="reviewForm" action="submit_review.php" method="POST">
            <div class="mb-3">
                <label for="reviewName" class="form-label">Tên của bạn:</label>
                <input type="text" class="form-control" id="reviewName" name="reviewName" required>
            </div>
            <div class="mb-3">
                <label for="reviewContent" class="form-label">Nội dung đánh giá:</label>
                <textarea class="form-control" id="reviewContent" name="reviewContent" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="reviewRating" class="form-label">Đánh giá:</label>
                <select class="form-control" id="reviewRating" name="reviewRating" required>
                    <option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Gửi đánh giá</button>
        </form>
        
    </section>

    <section id="nhan-xet">
        <div class="mt-5">
            <h2>Đánh giá</h2>
            <ul class="list-group mb-3" id="reviewList"></ul>
            <form id="reviewForm">
                <div class="mb-3">
                    <label for="reviewName" class="form-label">Tên của bạn:</label>
                    <input type="text" class="form-control" id="reviewName" required>
                </div>
                <div class="mb-3">
                    <label for="reviewContent" class="form-label">Nội dung đánh giá:</label>
                    <textarea class="form-control" id="reviewContent" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Gửi đánh giá</button>
            </form>
        </div>
    </section>

    <script>
        // Thêm sự kiện lướt xuống cho các liên kết
        document.querySelectorAll('.nav-links a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                // Lướt xuống từ từ
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        document.getElementById('reviewForm')?.addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn không reload trang khi gửi form

            // Lấy thông tin từ form
            const name = document.getElementById('reviewName').value;
            const content = document.getElementById('reviewContent').value;

            // Kiểm tra nếu người dùng chưa nhập
            if (!name || !content) {
                alert('Vui lòng nhập đầy đủ thông tin!');
                return;
            }

            // Tạo phần tử đánh giá mới
            const reviewItem = document.createElement('li');
            reviewItem.className = 'list-group-item';
            reviewItem.innerHTML = `<strong>${name}:</strong> ${content}`;

            // Thêm đánh giá vào danh sách
            document.getElementById('reviewList').appendChild(reviewItem);

            // Reset form sau khi thêm đánh giá
            document.getElementById('reviewForm').reset();
        });

    </script>
    <!-- Liên kết Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
