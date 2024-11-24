<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu tour
$sql = "SELECT t.tour_id, t.name AS tour_name, t.description, t.price, ti.image_url 
        FROM Tour t
        JOIN TourImage ti ON t.tour_id = ti.tour_id
        LIMIT 4 OFFSET 4;";
$result = $conn->query($sql);

// Tạo mảng chứa dữ liệu các tour
$tours = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tours[] = $row;
    }
}

// Kiểm tra xem có dữ liệu từ AJAX gửi đến không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ AJAX (POST)
    $tour_id = isset($_POST['tour_id']) ? $_POST['tour_id'] : null;  
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;  
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;   
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';  

    // Kiểm tra dữ liệu có hợp lệ không
    if ($tour_id && $user_id && $rating && $comment) {
        // Lưu đánh giá vào bảng Review
        $sql = "INSERT INTO Review (tour_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $tour_id, $user_id, $rating, $comment);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Đánh giá đã được lưu!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Lưu đánh giá thất bại."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Dữ liệu không hợp lệ."]);
    }
}
// Lấy tour_id từ URL nếu có
$tour_id = isset($_GET['tour_id']) ? $_GET['tour_id'] : 0;

// Truy vấn lấy thông tin chi tiết của tour
$sql = "SELECT t.tour_id, t.name, t.description, t.price, t.duration, t.start_date, t.type, ti.image_url
        FROM Tour t
        JOIN TourImage ti ON t.tour_id = ti.tour_id
        WHERE t.tour_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tour_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $tour = $result->fetch_assoc();
} else {
    echo "Không tìm thấy tour.";
}

// Truy vấn lấy lịch trình của tour
$sql = "SELECT day, description FROM Itinerary WHERE tour_id = ? ORDER BY day ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tour_id);
$stmt->execute();
$itinerary_result = $stmt->get_result();

// Tạo mảng chứa lịch trình
$itinerary = [];
while ($row = $itinerary_result->fetch_assoc()) {
    $itinerary[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tour Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <?php if (isset($tour))?>
      <div class="card mb-4">
        <div class="row g-0">
          <!-- Hình ảnh -->
          <div class="col-md-7">
            <img src="<?= $tour['image_url'] ?>" class="img-fluid rounded-start" alt="<?= $tour['name'] ?>">
          </div>
          <!-- Nội dung -->
          <div class="col-md-5">
            <div class="card-body">
              <h3 class="card-title text-danger fw-bold"><?= $tour['name'] ?></h3>
              <p class="card-text"><?= $tour['description'] ?></p>
              <ul class="list-unstyled my-3">
                <li><i class="bi bi-clock"></i> <strong>Time:</strong> <?= $tour['duration'] ?> date</li>
                <li><i class="bi bi-calendar"></i> <strong>Depart:</strong> <?= $tour['start_date'] ?></li>
                <li><i class="bi bi-geo-alt"></i> <strong>Type:</strong> <?= $tour['type'] ?></li>
              </ul>
              <div class="mb-3">
                <span class="text-danger fs-4 fw-bold"><?= number_format($tour['price'], 0, ',', '.') ?>₫</span>
              </div>
                <button class="btn btn-danger w-100 mb-2" id="openForm">Send request</button>
              <div id="requestForm" class="modal" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Ask for advice</h4>
                      <button type="button" class="btn-close" id="closeForm">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="formRequest">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <h5><label for="departureDate" class="form-label">Departure date:</label></h5>
                            <input type="date" class="form-control" id="departureDate" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <h5><label for="departurePlace" class="form-label">Departure point:</label></h5>
                            <select id="departurePlace" class="form-select" required>
                              <option value="Hà Nội">Hà Nội</option>
                              <option value="Hải Phòng">Hải Phòng</option>
                              <option value="Bắc Giang">Bắc Giang</option>
                              <option value="Bắc Giang">Đà Nẵng</option>
                              <option value="Bắc Giang">Hồ Chí Minh</option>
                              <option value="Bắc Giang">Đà Lạt</option>
                              <option value="Bắc Giang">Hải Phòng</option>
                              <option value="Bắc Giang">Hạ Long</option>
                              <option value="Bắc Giang">Nha Trang</option>
                              <option value="Bắc Giang">Quảng Bình</option>
                              <option value="Bắc Giang">Quảng Ngãi</option>
                              <option value="Bắc Giang">Hội An</option>
                              <option value="Bắc Giang">Huế</option>
                              <option value="Bắc Giang">Tam Đảo</option>
                              <option value="Bắc Giang">Sài Gòn</option>
                              <option value="Bắc Giang">Lý Sơn</option>
                              <option value="Bắc Giang">Quy Nhơn</option>
                              <option value="Bắc Giang">Sa Pa</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <h5><label for="adults" class="form-label">Adult:</label></h5>
                            <select id="adults" class="form-select">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            </select>
                          </div>
                          <div class="col-md-4 mb-3">
                          <h5> <label for="children" class="form-label">Children (2-12):</label></h5>
                            <select id="children" class="form-select">
                              <option>0</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            </select>
                          </div>
                          <div class="col-md-4 mb-3">
                            <h5> <label for="infants" class="form-label">Baby (&lt;2):</label></h5>
                            <select id="infants" class="form-select">
                              <option>0</option>
                              <option>1</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <h5><label for="infants" class="form-label">Quarterly:</label></h5>
                          <select id="infants" class="form-select">
                            <option>Grandfather</option>
                            <option>Grandma</option>
                            <option>Brother</option>
                            <option>Sister</option>
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <h5><label for="name" class="form-label">Name:</label></h5>
                            <input type="text" class="form-control" id="name" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <h5><label for="phone" class="form-label">Phone number:</label></h5>
                            <input type="tel" class="form-control" id="phone" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <h5><label for="phone" class="form-label">Email:</label></h5>
                            <input type="tel" class="form-control" id="phone" required>
                          </div>
                        </div>
                        <div class="mb-3">
                          <h5><label for="specialRequests" class="form-label">Special requirements:</label></h5>
                          <textarea class="form-control" id="specialRequests" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Send request:</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tab Navigation -->
     
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="#gioi-thieu">Introduce</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#lich-trinh">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#bang-gia">Price list</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#nhan-xet">Review</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Tour-du-lich">Similar tours</a>
      </li>
    </ul>
    <div class="tab-content mt-4" id="tourTabsContent">
      <!-- Tab Giới thiệu -->
      <div class="tab-pane fade show active" id="gioi-thieu" role="tabpanel" aria-labelledby="gioi-thieu-tab">
        <h6 class="fw-bold">Highlightst</h6>
        <ul>
          <li>✅ Tours are designed to provide experiences that match travelers' preferences, from exploring nature and relaxing to learning about culture and history.</li>
          <li>✅ Includes dedicated tour guides, comfortable transportation, and engaging activities at the destinations.</li>
          <li>✅ Schedules are arranged to ensure travelers can fully enjoy their experience, whether it’s an adventurous journey or peaceful relaxation.</li>
          <li>✅ Tours offer opportunities to explore new places, meet fellow travelers, and create unforgettable memories.</li>
          <li>✅ An ideal choice for those seeking a fully equipped trip filled with meaningful experiences.</li>
        </ul>
      </div><br>

      <!-- Tab Lịch trình -->
      <section id="lich-trinh">
            <h2>Schedule</h2>
              <div class="accordion" id="tourSchedule">
                <?php foreach ($itinerary as $item): ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="day<?= $item['day'] ?>-heading">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                              data-bs-target="#day<?= $item['day'] ?>" 
                              aria-expanded="false" aria-controls="day<?= $item['day'] ?>">
                        Date <?= $item['day'] ?>
                      </button>
                    </h2>
                    <div id="day<?= $item['day'] ?>" class="accordion-collapse collapse" 
                         aria-labelledby="day<?= $item['day'] ?>-heading" data-bs-parent="#tourSchedule">
                      <div class="accordion-body">
                        <?= $item['description'] ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
      </section><br><br>

      <!-- Tab Bảng giá -->
        <div id="bang-gia" role="tabpanel" aria-labelledby="bang-gia-tab">
          <h2>Price list</h2>
          <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>Departure Date</th>
                        <th>Tour Class</th>
                        <th>Tour Price</th>
                        <th>Reward Points</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>22/11/2024</td>
                        <td>Vietjet Air</td>
                        <td class="text-danger fw-bold">5,990,000₫</td>
                        <td>+ 79,900 points</td>
                        <td><span class="badge bg-secondary">Fully Booked</span></td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td>06/12/2024 <span class="text-danger"></span></td>
                        <td>Vietjet Air</td>
                        <td>
                            <span class="text-muted text-decoration-line-through">7,990,000₫</span><br>
                            <span class="text-danger fw-bold">7,490,000₫</span>
                        </td>
                        <td>+ 74,900 points</td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm btn-hold">Hold Now</button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                        <td>13/12/2024 <span class="text-danger"></span></td>
                        <td>Vietjet Air</td>
                        <td>
                            <span class="text-muted text-decoration-line-through">4,990,000₫</span><br>
                            <span class="text-danger fw-bold">5,490,000₫</span>
                        </td>
                        <td>+ 74,900 points</td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm btn-hold">Hold Now</button>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr>
                        <td>20/12/2024 <span class="text-danger"></span></td>
                        <td>Vietjet Air</td>
                        <td>
                            <span class="text-muted text-decoration-line-through">6,990,000₫</span><br>
                            <span class="text-danger fw-bold">8,490,000₫</span>
                        </td>
                        <td>+ 74,900 points</td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm btn-hold">Hold Now</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <section id="nhan-xet">
        <div class="mt-5">
            <h2>Review</h2>
            <ul class="list-group mb-3" id="reviewList"></ul>
            <form id="reviewForm">
                <div class="mb-3">
                    <label for="reviewName" class="form-label">Tên của bạn:</label>
                    <input type="text" class="form-control" id="reviewName" required>
                </div>
                <div class="mb-3">
                  <label for="reviewRating" class="form-label">Xếp hạng:</label>
                  <select class="form-select" id="reviewRating" required>
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
                    <textarea class="form-control" id="reviewContent" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Gửi đánh giá</button>
            </form>
        </div>
    </section><br><br>

    <section id="Tour-du-lich">
      <h2>Similar Tours</h2>
        <div class="tour-list">
            <?php foreach ($tours as $tour): ?>
            <div class="tour-item">
                <div class="tour-image">
                    <img src="<?= $tour['image_url'] ?>" alt="<?= $tour['tour_name'] ?>" />
                </div>
                <div class="tour-content">
                    <h3><?= $tour['tour_name'] ?></h3>
                    <p><?= $tour['description'] ?></p>
                    <div class="tour-price">
                        <span class="new-price"><?= number_format($tour['price'], 0, ',', '.') ?>đ</span>
                    </div>
                    <a href="detail.php?tour_id=<?= $tour['tour_id'] ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

<link rel="stylesheet" href="styles/detail.css">
<script src="js/detail.js"></script>
       <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>