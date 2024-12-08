<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <title>Navbar Inside Header</title>
  <link rel="stylesheet" href="./styles/header.css">
</head>
<body>
  <!-- Header -->
  <div id="header">
  <!-- Navigation Bar -->
  <div class="navbar-section">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="custom-brand">
            <img
                class="brand-logo"
                src="./images_blog/Logo.png"
                alt="Gogo" />
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about_us.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list_tour.php">Tour</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index_blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tour_random.php">Special Tour</a>
            </li>
          </ul>
          
          <!-- Icon tài khoản bên phải -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i id="icon_user" class="fa fa-user" aria-hidden="true"></i> <!-- Icon tài khoản -->
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Content Section -->
  <div class="content-section">
    <h1 class="text12">Spend your vocation<br> with our activities</h1>
    <h1 class="text1">Most popular</h1>

    <div id="trip-page">
      <div class="card custom-card" style="width:200px;">
        <img src="./images_blog/Ha_noi.png" class="card-img-top1" alt="...">
        <div class="trip-body">
          <p class="trip-text">Trip to Ha Noi.</p>
          <p class="text-icon">
            <i class="fa-solid fa-users icon-blue"></i> 30 People going
          </p>
        </div>
      </div>
      <div class="card custom-card" style="width:200px;">
        <img src="./images_blog/Đa_nang.jpg" class="card-img-top1" alt="...">
        <div class="trip-body">
          <p class="trip-text">Trip to Đà Nẵng</p>
          <p class="text-icon">
            <i class="fa-solid fa-users icon-blue"></i> 10 People going
          </p>
        </div>
      </div>
      <div class="card custom-card" style="width:200px;">
        <img src="./images_blog/Nha_trang.png" class="card-img-top1" alt="...">
        <div class="trip-body">
          <p class="trip-text">Trip to Nha Trang</p>
          <p class="text-icon">
            <i class="fa-solid fa-users icon-blue"></i> 25 People going
          </p>
        </div>
      </div>
    </div>
<?php
    // Lấy các tham số tìm kiếm từ URL (query string)
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
$activity = isset($_GET['activity']) ? $_GET['activity'] : '';
$duration = isset($_GET['duration']) ? $_GET['duration'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
?>
   <form id="searchForm" method="GET" action="search_results.php">
    <div id="search-bar">
        <input type="text" class="search-input" id="searchInput" name="searchTerm" value="<?php echo htmlspecialchars($searchTerm); ?>" placeholder="Search">
        <!-- Các trường chọn lựa -->
        <select class="search-select" name="activity">
            <option value="">Activity</option>
            <option value="adventure" <?php if ($activity == 'adventure') echo 'selected'; ?>>Adventure</option>
            <option value="relaxation" <?php if ($activity == 'relaxation') echo 'selected'; ?>>Relaxation</option>
            <option value="exploration" <?php if ($activity == 'exploration') echo 'selected'; ?>>Exploration</option>
        </select>
        <select class="search-select" name="duration">
            <option value="">Duration</option>
            <option value="1" <?php if ($duration == '1') echo 'selected'; ?>>1 Day Tour</option>
            <option value="2-3" <?php if ($duration == '2-3') echo 'selected'; ?>>2-3 Day Tour</option>
            <option value="4-5" <?php if ($duration == '4-5') echo 'selected'; ?>>4-5 Day Tour</option>
            <option value="6-7" <?php if ($duration == '6-7') echo 'selected'; ?>>6-7 Day Tour</option>
            <option value="8+" <?php if ($duration == '8+') echo 'selected'; ?>>8+ Day Tour</option>
        </select>
        <input type="date" class="search-input" name="date" value="<?php echo htmlspecialchars($date); ?>">
        <button class="search-button" type="submit">Search</button>
    </div>
</form>
<script src="js/login.js"></script>
<script>
const searchInput = document.getElementById('searchInput');
// Lắng nghe sự kiện nhập liệu (input) để lọc gợi ý
searchInput.addEventListener('input', function () {
  updateSuggestions();
});
document.addEventListener('DOMContentLoaded', function () {
    // XỬ LÝ KHI CLICK VÀO ICON_USER TRÊN HEADER
    const iconUser = document.getElementById('icon_user');
    
    if (iconUser) {
      iconUser.addEventListener('click', function () {
        // Gửi yêu cầu kiểm tra trạng thái đăng nhập
        fetch('./user/check_login_status.php')
          .then(response => response.json())
          .then(data => {
            if (data.logged_in) {
              // Nếu đã đăng nhập, điều hướng đến trang thay đổi thông tin
              window.location.href = './user/update_info.php';
            } else {
              // Nếu chưa đăng nhập, yêu cầu đăng nhập
              if (confirm('Bạn chưa đăng nhập. Vui lòng đăng nhập vào tài khoản của bạn. Nhấn "OK" để tới trang đăng nhập.')) {
                window.location.href = './user/log_in.php';
              }
            }
          })
          .catch(error => {
            console.error('Lỗi khi gọi API:', error);
          });
      });
    }
  });

 // Lấy các phần tử HTML cần thiết
const searchButton = document.querySelector('.search-button');
const searchInput = document.querySelector('#searchInput'); // Chắc chắn rằng bạn đã chọn đúng input
const activitySelect = document.querySelector('.search-select:nth-of-type(1)');
const durationSelect = document.querySelector('.search-select:nth-of-type(2)');
const dateInput = document.querySelector('input[type="date"]');

// Lắng nghe sự kiện khi nhấn nút "Search"
searchButton.addEventListener("click", function (e) {
  e.preventDefault(); // Ngừng hành động mặc định của nút (nếu có)

  // Lấy giá trị từ các trường tìm kiếm
  const searchTerm = searchInput.value.trim(); // Tên tìm kiếm
  const activity = activitySelect.value; // Loại hoạt động
  const duration = durationSelect.value; // Thời gian tour
  const date = dateInput.value; // Ngày chọn

  // Kiểm tra nếu ít nhất một trường được điền
  if (searchTerm || activity !== "Activity" || duration !== "Duration" || date) {
    const searchParams = new URLSearchParams();

    // Thêm tham số vào URL nếu có giá trị
    if (searchTerm) searchParams.append("search", searchTerm);
    if (activity !== "Activity") searchParams.append("activity", activity);
    if (duration !== "Duration") searchParams.append("duration", duration);
    if (date) searchParams.append("date", date);

    // Chuyển đến trang tìm kiếm và truyền tham số tìm kiếm qua URL
    window.location.href = `search_results.php?${searchParams.toString()}`;
  } else {
    alert("Please fill in at least one search field!"); // Cảnh báo nếu không điền thông tin
  }
});
</script>
</body>
</html>