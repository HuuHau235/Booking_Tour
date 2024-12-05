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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
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

  <div id="search-bar">
    <input type="text" class="search-input" id="searchInput" placeholder="Search">
    <ul class="dropdown-menu" id="suggestionList" style="display: none">
      <li><a class="dropdown-item" href="#">Hội An</a></li>
      <li><a class="dropdown-item" href="#">Đà Nẵng</a></li>
      <li><a class="dropdown-item" href="#">Huế</a></li>
      <li><a class="dropdown-item" href="#">Đà Lạt</a></li>
      <li><a class="dropdown-item" href="#">Hà Nội</a></li>
      <li><a class="dropdown-item" href="#">Quảng Bình</a></li>
      <li><a class="dropdown-item" href="#">Nha Trang</a></li>
      <li><a class="dropdown-item" href="#">Bắc Giang</a></li>
    </ul>
    <select class="search-select">
      <option>Activity</option>
      <option>Adventure</option>
      <option>Vacation</option>
      <option>Explore</option>
    </select>
    <select class="search-select">
      <option>Duration</option>
      <option>1 Day Tour</option>
      <option>2-4 Day Tour</option>
      <option>5-7 Day Tour</option>
      <option>7+ Day Tour</option>
    </select>
    <input type="date" class="search-input">
    <button class="search-button">Search</button>
  </div>
</div>

<script>
 const searchInput = document.getElementById('searchInput');
const suggestionList = document.getElementById('suggestionList');
const suggestions = suggestionList.querySelectorAll('.dropdown-item');

// Hiển thị danh sách gợi ý khi focus
searchInput.addEventListener('focus', function () {
  updateSuggestions(); // Kiểm tra và cập nhật danh sách mỗi khi focus
});

// Lọc danh sách gợi ý khi nhập
searchInput.addEventListener('input', function () {
  updateSuggestions();
});

// Cập nhật danh sách gợi ý
function updateSuggestions() {
  const filter = searchInput.value.trim().toLowerCase();
  let hasMatch = false;

  suggestions.forEach((item) => {
    if (item.textContent.toLowerCase().includes(filter)) {
      item.style.display = 'block'; // Hiển thị mục phù hợp
      hasMatch = true;
    } else {
      item.style.display = 'none'; // Ẩn mục không phù hợp
    }
  });

  // Ẩn danh sách nếu không có mục nào phù hợp
  suggestionList.style.display = hasMatch ? 'block' : 'none';
}

// Ẩn danh sách khi nhấp ra ngoài
document.addEventListener('click', function (event) {
  if (!searchInput.contains(event.target) && !suggestionList.contains(event.target)) {
    suggestionList.style.display = 'none';
  }
});

// Xử lý sự kiện chọn gợi ý
suggestionList.addEventListener('click', function (event) {
  if (event.target.classList.contains('dropdown-item')) {
    searchInput.value = event.target.textContent; // Điền vào ô tìm kiếm
    suggestionList.style.display = 'none'; // Ẩn danh sách sau khi chọn
  }
});

// XỬ LÝ KHI CLICK VÀO ICON_USER TRÊN HEADER
document.getElementById('icon_user').addEventListener('click', () => {
    fetch('./user/check_login_status.php')
        .then(response => response.json())
        .then(data => {
            if (data.logged_in) {
                // Nếu đã đăng nhập
                window.location.href = './user/update_info.php'; // Điều hướng tới trang thay đổi thông tin
            } else {
                // Nếu chưa đăng nhập
                if (confirm('Bạn chưa đăng nhập. Vui lòng đăng nhập vào tài khoản của bạn. Nhấn "OK" để tới trang đăng nhập.')) {
                    window.location.href = './user/log_in.php'; // Điều hướng tới trang đăng nhập
                }
            }
        })
        .catch(error => {
            console.error('Lỗi khi gọi API:', error);
        });
});

</script>
</body>
</html>