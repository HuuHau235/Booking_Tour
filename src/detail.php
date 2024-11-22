<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel"; // Thay bằng tên database của bạn

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Các tour tương tự
    // Truy vấn dữ liệu
    $sql = "SELECT t.tour_id, t.name AS tour_name, t.description, t.price, ti.image_url
        FROM Tour t
        JOIN TourImage ti ON t.tour_id = ti.tour_id
        LIMIT 24;";
    $result = $conn->query($sql);

    // Tạo mảng chứa dữ liệu
    $tours = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tours[] = $row;
        }
    }
// // Lấy dữ liệu từ AJAX
// $tour_id = $_POST['tour_id'];  // ID của tour
// $user_id = $_POST['user_id'];  // ID người dùng
// $rating = $_POST['rating'];    // Số sao (1-5)
// $comment = $_POST['comment'];  // Nội dung đánh giá

// // Lưu dữ liệu vào bảng Review
// $sql = "INSERT INTO Review (tour_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("iiis", $tour_id, $user_id, $rating, $comment);

// if ($stmt->execute()) {
//     echo json_encode(["status" => "success", "message" => "Đánh giá đã được lưu!"]);
// } else {
//     echo json_encode(["status" => "error", "message" => "Lưu đánh giá thất bại."]);
// }
// $tour_id = $_GET['tour_id']; // ID của tour cần lấy đánh giá
// $sql = "SELECT r.rating, r.comment, u.username 
//         FROM Review r 
//         JOIN User u ON r.user_id = u.user_id 
//         WHERE r.tour_id = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $tour_id);
// $stmt->execute();
// $result = $stmt->get_result();

// $reviews = [];
// while ($row = $result->fetch_assoc()) {
//     $reviews[] = $row;
// }

// echo json_encode($reviews);
// $stmt->close();
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
    <!-- Card phần thông tin tour -->
    <div class="card mb-4">
      <div class="row g-0">
        <!-- Hình ảnh -->
        <div class="col-md-7">
          <div class="position-relative">
            <img src="https://i.pinimg.com/736x/19/3d/51/193d51c4ad777673cb57cea2170efd51.jpg" class="img-fluid rounded-start" alt="Tour Image">
            <span class="badge bg-success position-absolute top-0 start-0 m-3 p-2 fs-6">9.2 Tuyệt vời</span>
            <span class="badge bg-secondary position-absolute bottom-0 start-0 m-3 p-2 fs-6">112 đánh giá</span>
          </div>
        </div>
        <!-- Nội dung -->
        <div class="col-md-5">
          <div class="card-body">
            <h5 class="card-title text-primary fw-bold">Du lịch Đà Nẵng</h5>
            <ul class="list-unstyled my-3">
              <li><i class="bi bi-clock"></i> <strong>Thời gian:</strong> 5 ngày 4 đêm</li>
              <li><i class="bi bi-calendar"></i> <strong>Khởi hành:</strong> 
                <span class="text-danger">Tháng 11: 22</span>, 
                <span class="text-danger">Tháng 12: 6, 13, 20, 27</span>
              </li>
              <li><i class="bi bi-geo-alt"></i> <strong>Lịch trình:</strong> Hà Nội - Hải Phòng - Bắc Giang - Quãng Nam - Đà Nẵng</li>
            </ul>
            <div class="mb-3">
              <span class="text-muted text-decoration-line-through">9.240.000₫</span>
              <span class="text-danger fs-4 fw-bold">8.240.000₫</span>
              <span class="badge bg-warning text-dark ms-2">+ 82.400 điểm</span>
            </div class = "nav-links">
            <button class="btn btn-danger w-100 mb-2" id="openForm">Gửi yêu cầu</button>
            <div id="requestForm" class="modal" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Yêu cầu tư vấn</h4>
                    <button type="button" class="btn-close" id="closeForm">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form id="formRequest">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <h5><label for="departureDate" class="form-label">Ngày khởi hành:</label></h5>
                          <input type="date" class="form-control" id="departureDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <h5><label for="departurePlace" class="form-label">Điểm khởi hành:</label></h5>
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
                          <h5><label for="adults" class="form-label">Người lớn:</label></h5>
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
                         <h5> <label for="children" class="form-label">Trẻ em (2-12):</label></h5>
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
                          <h5> <label for="infants" class="form-label">Em bé (&lt;2):</label></h5>
                          <select id="infants" class="form-select">
                            <option>0</option>
                            <option>1</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <h5><label for="infants" class="form-label">Quý:</label></h5>
                        <select id="infants" class="form-select">
                          <option>Ông</option>
                          <option>Bà</option>
                          <option>Anh</option>
                          <option>Chị</option>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <h5><label for="name" class="form-label">Họ tên:</label></h5>
                          <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <h5><label for="phone" class="form-label">Số điện thoại:</label></h5>
                          <input type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <h5><label for="phone" class="form-label">Email:</label></h5>
                          <input type="tel" class="form-control" id="phone" required>
                        </div>
                      </div>
                      <div class="mb-3">
                        <h5><label for="specialRequests" class="form-label">Yêu cầu đặc biệt:</label></h5>
                        <textarea class="form-control" id="specialRequests" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Gửi yêu cầu</button>
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
        <a class="nav-link" href="#gioi-thieu">Giới thiệu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#lich-trinh">Lịch trình</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#bang-gia">Bảng giá</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#nhan-xet">Đánh giá</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Tour-du-lich">Tour du lịch tương tự</a>
      </li>
    </ul>
    <div class="tab-content mt-4" id="tourTabsContent">
      <!-- Tab Giới thiệu -->
      <div class="tab-pane fade show active" id="gioi-thieu" role="tabpanel" aria-labelledby="gioi-thieu-tab">
        <p>
          Chuyến hành trình <strong>Đà Nẵng dài 5 ngày 4 đêm: Hà Nội - Hải Phòng - Bắc Giang - Quãng Nam - Đà Nẵng </strong> 
        </p>
        <h6 class="fw-bold">Điểm nổi bật</h6>
        <ul>
          <li>✅ Tour Đà Nẵng xuất phát từ Hà Nội</li>
          <li>✅ Trải nghiệm massage Hải Phòng cổ truyền thư giãn, sảng khoái</li>
          <li>✅ Tặng bữa Buffet tại Bắc Giang sang trọng</li>
          <li>✅ Sống ảo cực "chất" tại quần thể kiến trúc cổ Quãng Nam</li>
          <li>✅ Thưởng thức show diễn hoành tráng của các vũ công </li>
        </ul>
        <p><strong>Chủ đề:</strong> Tour đoàn, Văn hóa, Lễ hội, Mua sắm, Khám phá, Mạo hiểm.</p>
      </div>
      <!-- Tab Lịch trình -->
      <section id="lich-trinh">
        <h2 class="fw-bold">Lịch trình tour</h2>
        <div class="accordion" id="tourSchedule">
          <!-- Ngày 1 -->
          <div class="timeline-item">
            <div class="accordion-item">
              <h2 class="accordion-header" id="day1-heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#day1" aria-expanded="false" aria-controls="day1">
                  Ngày 1: Hà Nội
                </button>
              </h2>
              <div id="day1" class="accordion-collapse collapse" aria-labelledby="day1-heading" data-bs-parent="#tourSchedule">
                <div class="accordion-body">
                  Khởi hành từ Hà Nội đến Hải Phòng, sau đó bay đến Bắc Giang. Tiếp tục di chuyển tới Quãng Nam.
                </div>
              </div>
            </div>
          </div>
          <!-- Ngày 2 -->
          <div class="timeline-item">
            <div class="accordion-item">
              <h2 class="accordion-header" id="day2-heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#day2" aria-expanded="false" aria-controls="day2">
                  Ngày 2: Hải Phòng
                </button>
              </h2>
              <div id="day2" class="accordion-collapse collapse" aria-labelledby="day2-heading" data-bs-parent="#tourSchedule">
                <div class="accordion-body">
                  Tham quan Hải Phòng với câu ca dao " Hải Phòng là không lòng vòng".
                </div>
              </div>
            </div>
          </div>
          <!-- Ngày 3 -->
          <div class="timeline-item">
            <div class="accordion-item">
              <h2 class="accordion-header" id="day3-heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#day3" aria-expanded="false" aria-controls="day3">
                  Ngày 3: Bắc Giang
                </button>
              </h2>
              <div id="day3" class="accordion-collapse collapse" aria-labelledby="day3-heading" data-bs-parent="#tourSchedule">
                <div class="accordion-body">
                  Tham quan quần thể kiến trúc cổ. Mua sắm và tham quan trung tâm Thành Phố.
                </div>
              </div>
            </div>
          </div>
          <!-- Ngày 4 -->
          <div class="timeline-item">
            <div class="accordion-item">
              <h2 class="accordion-header" id="day4-heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#day4" aria-expanded="false" aria-controls="day4">
                  Ngày 4: Quãng Nam
                </button>
              </h2>
              <div id="day4" class="accordion-collapse collapse" aria-labelledby="day4-heading" data-bs-parent="#tourSchedule">
                <div class="accordion-body">
                  Sống ảo cực "chất" tại quần thể kiến trúc cổ Quãng Nam
                </div>
              </div>
            </div>
          </div>
          <!-- Ngày 5 -->
          <div class="timeline-item">
            <div class="accordion-item">
              <h2 class="accordion-header" id="day5-heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#day5" aria-expanded="false" aria-controls="day5">
                  Ngày 5: Đà Nẵng
                </button>
              </h2>
              <div id="day5" class="accordion-collapse collapse" aria-labelledby="day5-heading" data-bs-parent="#tourSchedule">
                <div class="accordion-body">
                  Trả phòng khách sạn, di chuyển ra sân bay về Hà Nội.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
      <!-- Tab Bảng giá -->
        <div id="bang-gia" role="tabpanel" aria-labelledby="bang-gia-tab">
          <h2>Bảng giá</h2>
          <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
              <thead class="table-warning">
                <tr>
                  <th>Ngày khởi hành</th>
                  <th>Hạng tour</th>
                  <th>Giá tour</th>
                  <th>Điểm thưởng</th>
                  <th>Trạng thái</th>
                </tr>
              </thead>
              <tbody>
                <!-- Hàng 1 -->
                <tr>
                  <td>22/11/2024</td>
                  <td>Vietjet Air</td>
                  <td class="text-danger fw-bold">5.990.000₫</td>
                  <td>+ 79.900 điểm</td>
                  <td><span class="badge bg-secondary">Kín chỗ</span></td>
                </tr>
                <!-- Hàng 2 -->
                <tr>
                  <td>06/12/2024 <span class="text-danger"></span></td>
                  <td>Vietjet Air</td>
                  <td>
                    <span class="text-muted text-decoration-line-through">7.990.000₫</span><br>
                    <span class="text-danger fw-bold">7.490.000₫</span>
                  </td>
                  <td>+ 74.900 điểm</td>
                  <td>
                    <button class="btn btn-outline-primary btn-sm btn-hold">Giữ chỗ ngay</button>
                  </td>
                </tr>
                <!-- Hàng 3 -->
                <tr>
                  <td>13/12/2024 <span class="text-danger"></span></td>
                  <td>Vietjet Air</td>
                  <td>
                    <span class="text-muted text-decoration-line-through">4.990.000₫</span><br>
                    <span class="text-danger fw-bold">5.490.000₫</span>
                  </td>
                  <td>+ 74.900 điểm</td>
                  <td>
                    <button class="btn btn-outline-primary btn-sm btn-hold">Giữ chỗ ngay</button>
                  </td>
                </tr>
                <!-- Hàng 4 -->
                <tr>
                  <td>20/12/2024 <span class="text-danger"></span></td>
                  <td>Vietjet Air</td>
                  <td>
                    <span class="text-muted text-decoration-line-through">6.990.000₫</span><br>
                    <span class="text-danger fw-bold">8.490.000₫</span>
                  </td>
                  <td>+ 74.900 điểm</td>
                  <td>
                    <button class="btn btn-outline-primary btn-sm btn-hold">Giữ chỗ ngay</button>
                  </td>
                  </tr>
              </tbody>
            </table>
          </div>
          
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
                  <label for="reviewRating" class="form-label">Xếp hạng:</label>
                  <select class="form-select" id="reviewRating" required>
                      <option value="" disabled selected>Chọn đánh giá</option>
                      <option value="1">★</option>
                      <option value="2">★★</option>
                      <option value="3">★★★</option>
                      <option value="4">★★★★</option>
                      <option value="5">★★★★★</option>
                  </select>
              </div>
                <div class="mb-3">
                    <label for="reviewContent" class="form-label">Nội dung đánh giá:</label>
                    <textarea class="form-control" id="reviewContent" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Gửi đánh giá</button>
            </form>
        </div>
    </section>
    <section id="Tour-du-lich">
    <h2>Tour du lịch tương tự</h2>
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
                <a href="detail.php?tour_id=<?= $tour['tour_id'] ?>" class="btn btn-primary">Chi tiết</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>


<link rel="stylesheet" href="css/detail.css">
<script src="js/detail.js"></script>
       <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>