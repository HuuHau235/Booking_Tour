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
  <link rel="stylesheet" href="../css/header_footer.css">
</head>
<body>
  <!-- Header -->
  <div class="header">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tour</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Destination</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blogs.php">Blog</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user" aria-hidden="true"></i> <!-- Icon tài khoản -->
              </a>
              <ul class="dropdown-menu" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="#" id="openRegisterBtn">Register</a></li>
                  <li><a class="dropdown-item" href="#" id="openLoginBtn">Log in</a></li>
              </ul>
          </li>
         </ul>
        </div>
      </div>
    </nav>
  <h1 class="text12"> Spend your vocation<br> with our activities</h1>
  <h1 class="text1"> Most popular</h1>

  <div class="content">
    <div class="card custom-card"
style="width:200px;">
  <img src="../images_blog/Ha_noi.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Trip to Ha Noi.</p>
    <p class="text-icon">
  <i class="fa-solid fa-users icon-blue"></i> 30 People going
</p>
    </div>
</div>
<div class="card custom-card"
style="width:200px;">  
<img src="../images_blog/Đa_nang.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Trip to Đà Nẵng</p>
    <p class="text-icon">
  <i class="fa-solid fa-users icon-blue"></i> 10 People going
</p>
  </div>
</div>
<div class="card custom-card"
style="width:200px;">
  <img src="../images_blog/Nha_trang.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Trip to Nha Trang </p>
    <p class="text-icon">
  <i class="fa-solid fa-users icon-blue"></i> 25 People going
</p>
  </div>
</div>
  </div>
  <div class="search-bar">
  <input type="text" placeholder="Search" class="search-input">
  <select class="search-select">
      <option>Activity</option>
      <option>Adventure</option>
      <option>Vacation</option>
      <option>Explore</option>
    </select>
    <select class="search-select">
      <option>Destination</option>
      <option>Hà Nội</option>
      <option>Nha Trang</option>
      <option>Đà Lạt</option>
      <option>Bắc Giang</option>
      <option>Hải Phòng</option>
      <option>Quảng Bình</option>
      <option>Huế</option>
      <option>Đà Nẵng</option>
      <option>TP.Hồ Chí Minh</option>
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
  </div>

  <div class="conten">
    <P>Hi loo ain chao</P>
  </div>
</body>
</html>
