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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>

    body{
      font-family: "Tinos", serif  !important;

    }
.header {  
    background-image: url("./images/header.jpeg") !important;
    background-size: cover;
    /* Căn chỉnh kích thước ảnh */
    background-position: center;
    /* Căn giữa ảnh */
    height: 690px;
    /* Chiều cao tàn màn hình */
    color: white;
    font-family: "Tinos", serif ;
    padding-top: 10px;
    padding-bottom: 100px;
    margin-bottom: 50px;
}


.navbar .nav-link {
    color: white !important;
    /* Màu chữ trên thanh điều hướng */
    font-weight: 600;
    transition: color 0.3s ease;
    /* Hiệu ứng khi hover */
    font-size: 26px;
    margin-right: 15px;
    margin-top: 10px;
}
.navbar .nav-link:hover {
    color: orangered!important;
    /* Màu vàng khi hover */
}
.navbar-toggler {
    border-color: white;
    /* Màu viền nút toggle */
}
  /* Căn chỉnh logo */
.custom-brand {
    display: flex;
    align-items: center;
    justify-content: center; /* Thay bằng 'flex-start' hoặc 'flex-end' nếu muốn đổi vị trí */
}
 .brand-logo {
    width: 210px; /* Điều chỉnh kích thước logo */
    height: auto;
    margin-top: 18px;
}

 .custom-brand img:hover {
    transform: scale(1.2); /* Phóng to logo 20% */
    transition: transform 0.3s ease; /* Hiệu ứng mượt mà */
  }

/* Thanh điều hướng */
.navbar-nav {
    display: flex;
    align-items: center;
    justify-content: center; /* Thay bằng 'space-between' nếu muốn khoảng cách đều */
}

.navbar {
  background-color: #5EA1A3;
    height: 100px;
    padding-top:  4px;
    width: 100%;
    position: fixed; /* Đảm bảo navbar không bị cuộn */
    top: 0; /* Gắn navbar ở đầu trang */
    left: 0; /* Vị trí bên trái */
    z-index: 900; /* Đảm bảo navbar nằm trên tất cả các phần tử khác */
    margin-bottom: 20px;
    
}

.content-section {
  margin-top: 120px; /* Thêm khoảng cách lớn hơn nếu cần */
  margin-bottom: 30px;
  background-size: cover;
  background-position: center;
}

.navbar-toggler {
    border: none;
    color: #fff;
}

/* Icon tài khoản */
.navbar-nav.ms-auto {
    margin-left: auto;
}

.navbar .nav-item.dropdown .dropdown-toggle::after {
    display: none;
}

.navbar .nav-item.dropdown .dropdown-menu {
    background-color: rgba(255, 255, 255, 0.8) !important;
    /* Màu trắng với độ mờ 80% */
    border: none;
    /* Loại bỏ đường viền nếu cần */
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: -10px;
    background-color: #fff;
    list-style: none;
    width: 180px;
}

/* Thiết kế cho từng mục trong menu con */

dropdown-menu li {
    padding: 5px;
    margin-right: 18px;
}

.dropdown-menu li a {
    text-decoration: none;
    font-size: 20px;
    color: #333;
    display: block;
    transition: color 0.3s, background-color 0.3s;
}

.dropdown-menu li a:hover {
    color:orangered;
}


/* Hiển thị menu con khi di chuột vào mục cha */
  .nav-item:hover .dropdown-menu {
    display: block;
   }

    .custom-bg-dark {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
   .img-row {
          width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều ngang */
          height: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều cao của cột */
          object-fit: cover; /* Cắt ảnh để vừa với khung mà không làm méo */
          display: block; /* Loại bỏ khoảng trắng dư thừa xung quanh */
        }
        .col-lg-6 {
          height: 430px; /* Chiều cao cố định */
          padding: 0; /* Xóa khoảng cách bên trong */
          margin: 0; /* Xóa khoảng cách bên ngoài */
          overflow: hidden; /* Đảm bảo ảnh không tràn ra ngoài cột */
        }

        .container{
          margin: 0; 
          padding:0;
        }

        /* General reset */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.guide-section {
    text-align: center;
    padding: 50px;
    background: #f9f9f9 url('background-pattern.png') no-repeat center;
    background-size: cover;
}

.title {
    font-size: 2rem;
    color: #333;
    margin-bottom: 30px;
}

.card-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}
.guide-section{
  margin-top:100px;
  background-color: #5EA1A3;
 height: 270px; 
 margin-bottom:300px;
}
.card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    padding: 20px;
    text-align: center;
    position: relative;
    height: 400px;
    display:flex;

}
.card:hover {
  transform: translateY(-10px); /* Di chuyển card lên khi hover */
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Tạo bóng đổ khi hover */
}

.card-background {
    width: 100%;
    height: 150px;
    border-radius: 10px 10px 0 0;
    object-fit: cover;
    background-color: #A7D4D0;

}

.profile-pic {
    position: absolute;
    top: 60px;
    left: 50%;
    transform: translateX(-50%);
    border: 5px solid #fff;
    border-radius: 50%;
    width: 160px;
    height: 160px;
    overflow: hidden;
    font-size:24px
}

.profile-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card h3 {
    margin-top: 60px;
    font-size: 1.2rem;
    color: #333;
}

.role {
    color: #777;
    font-size: 0.9rem;
    margin: 5px 0 15px;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.social-links a {
    text-decoration: none;
    color: #333;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #007bff;
}
 
/* Lớp phủ chữ */
.header-text-overlay {
    position: absolute;
    top: 40%;
    left: 34%;
    transform: translate(-50%, -50%); /* Giữ chữ căn giữa */
    transform-origin: center center; /* Đảm bảo phóng to/thu nhỏ từ trung tâm */
    color: white;
    font-size: 6rem; /* Kích thước chữ */
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Tạo hiệu ứng đổ bóng */
    z-index: 1; /* Đảm bảo chữ nằm trên ảnh */
    opacity: 0; /* Ban đầu chữ ẩn */
    animation: fadeIn 2s ease-in forwards; /* Hiệu ứng xuất hiện trong 2 giây */
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.8); /* Thu nhỏ chữ ban đầu */
        transform-origin: center center; /* Căn chỉnh trung tâm */
    }
    to {
        opacity: 1;
        transform: scale(1); /* Trở về kích thước ban đầu */
    }
}

.title{
  color:white;
}
.container{
  margin:100px;
}
.text {
  width: 620px;
  margin:60px;
  text-align: justify; /* Căn đều văn bản */

}

.text h5{
  text-align: center;
  font-weight: bold;
  margin-bottom:20px;
}
.role{
  font-size:18px;
}
.custom-btn {
  border-radius: 0; /* Loại bỏ bo tròn */
  margin-left:200px;
  margin-top:20px;
}

    </style>
</head>
<body>
<div class="header">
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
    <div class="header-text-overlay">
    HappyTrips
  </div>
</div>
</div>

<div class="container">
  <div class="row">
    <!-- Cột chứa video -->
    <div class="col-lg-6 col-md-6 col-12 text-center p-0 d-flex align-items-center">
      <video width="100%" height="450" controls>
        <source src="./images/tour-introduction.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
    
    <!-- Cột chứa nội dung -->
    <div class="col-lg-6 col-md-6 col-12 text-center p-0 d-flex align-items-center" style="background-color: white; padding: 20px;">
      <div class="text"> 
        <h5 style="color: black;font-size: 27px; line-height: 1.2;">Our Story</h5>
        <p style="color:black; font-size: 24px; line-height: 1.2;">
        HappyTrips is an organization specializing in providing quality travel services, committed to bringing customers memorable trips and many things. We understand that each trip is not only an opportunity to explore new places but also a precious treasure of time to connect and experience life. </br>
        
        With a professional and experienced team, HappyTrips provides diverse tours, domestic travel flights, suitable for all needs and interests of customers.</p>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Cột chứa nội dung -->
    <div class="col-lg-6 col-md-6 col-12 text-center p-0 d-flex align-items-center" style="background-color: white; padding: 20px;">
      <div class="text">
        <h5 style="color: Black;font-size:27px; line-height: 1.2;">We offer tours in a range of locations</h5>
        <p style="color: Black;font-size:24px; line-height: 1.2;">
        Our mountain tours take you to the highest peaks, where you can witness stunning vistas and enjoy the crisp mountain air. Our beach tours, on the other hand, offer a chance to relax and unwind on the sandy shores..</p>
        <a href="list_tour.php" target="_blank">
        <button type="button" class="btn btn-warning custom-btn"> Discover Tour</button>
      </a>
      </div>
    </div>
    
    <!-- Cột chứa hình ảnh -->
    <div class="col-lg-6 col-md-6 col-12 text-center p-0 d-flex align-items-center">
      <img src="./images/about_us1.jpeg" class="img-fluid" alt="Eiffel Tower" style="width: 100%; height: auto;">
    </div>
  </div>
</div>


<?php
// Database connection
$servername = "localhost";  // Change if necessary
$username = "root";         // Default username for XAMPP MySQL
$password = "";             // Default password for XAMPP MySQL (empty)
$dbname = "HappyTrips";  // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the guides' data along with images
$sql = "
    SELECT g.id, g.name, g.role, i.file_path
    FROM Guide g
    LEFT JOIN Image i ON g.id = i.guide_id
    WHERE g.role IN ('Tourist Guide', 'Manager')";  // Filter for tourist guides and managers only

$result = $conn->query($sql);
?>

<div class="guide-section">
    <h2 class="title">Meet with Expert Guides</h2>
    <div class="card-container">

        <?php
        if ($result->num_rows > 0) {
            // Loop through each result and generate cards
            while($row = $result->fetch_assoc()) {
                // Output data for each guide
                echo '<div class="card">';
                echo '<div class="card-background"></div>';
                echo '<div class="profile-pic">';
                echo '<img src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
                echo '</div>';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p class="role">' . $row['role'] . '</p>';
                echo '<div class="social-links">';
                echo '<a href="#"><i class="fab fa-facebook"></i></a>';
                echo '<a href="#"><i class="fab fa-twitter"></i></a>';
                echo '<a href="#"><i class="fab fa-linkedin"></i></a>';
                echo '<a href="#"><i class="fab fa-instagram"></i></a>';
                echo '<a href="#"><i class="fab fa-youtube"></i></a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No guides found.";
        }

        ?>
    </div>
</div>
<?php
// Close the database connection
$conn->close();
?>
          <?php include 'footer.php'?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>