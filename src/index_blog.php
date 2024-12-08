<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/index_blog.css">
    <style> 
       .header_blogs {
        background-image: url("./images/blogs_header.jpg");
        background-size: cover;
        background-position: center;
        height: 600px;
        color: white;
        font-family: "Tinos", serif !important;
        padding-top: 10px; 
        margin-bottom: 30px; 
    }
    .navbar-section {
        background-color: #5EA1A3;
        height: 100px;
        padding-top:  4px;
        width: 100%;
        position: fixed; /* Đảm bảo navbar không bị cuộn */
        top: 0; /* Gắn navbar ở đầu trang */
        left: 0; /* Vị trí bên trái */
        z-index: 900; /* Đảm bảo navbar nằm trên tất cả các phần tử khác */
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
        height: 100px;
        padding-top:  4px;
        width: 100%;
        position: fixed; /* Đảm bảo navbar không bị cuộn */
        top: 0; /* Gắn navbar ở đầu trang */
        left: 0; /* Vị trí bên trái */
        z-index: 900; /* Đảm bảo navbar nằm trên tất cả các phần tử khác */
        margin-bottom: 20px;
    }
    .text {
        font-size: 85px;
        font-weight: bold;
        text-align: center;
        margin-top: 220px;
        animation: fadeIn 2s ease-in-out;
    }
</style>
</head>
<body>
<div class="header_blogs">
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
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blogs
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index_blog.php?category=all">All</a></li>
                            <li><a class="dropdown-item" href="index_blog.php?category=Reisetipps">Reisetipps</a></li>
                            <li><a class="dropdown-item" href="index_blog.php?category=Destination">Destination</a></li>
                        </ul>
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
    <div class="text animate__animated animate__fadeInDown">Welcome to our blogs</div>
</div>

<!-- Phần hiển thị bài viết -->
<div class="container my-4" id="blog-list">
    <!-- Các bài viết sẽ được tải tại đây -->
</div>

<!-- Phần PHP hiển thị bài viết -->
<div class="container my-4">
    <div class="row">
<?php
$servername = "localhost";
$username = "root";  // hoặc tên người dùng của bạn
$password = "";  // hoặc mật khẩu của bạn
$dbname = "HappyTrips";  // thay thế bằng tên cơ sở dữ liệu của bạn

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

        // Lấy danh mục từ GET nếu có
        $categoryFilter = isset($_GET['category']) ? $_GET['category'] : 'all';

        // Thực hiện câu lệnh SQL
        $sql = "SELECT b.id AS blog_id, b.title, b.author, b.category,
                       COALESCE(b.excerpt, 'Không có tóm tắt') AS excerpt, 
                       COALESCE(bi.image_url, 'default-image.jpg') AS image_url
                FROM Blogs b
                LEFT JOIN Blog_image bi ON b.id = bi.blog_id";

        if ($categoryFilter !== 'all') {
            $sql .= " WHERE b.category = '" . $conn->real_escape_string($categoryFilter) . "'";
        }

        $sql .= " ORDER BY b.id ASC"; 

        // Thực hiện truy vấn
        $result = $conn->query($sql);

        // Kiểm tra nếu có kết quả
        if ($result->num_rows > 0) {
            // Lặp qua từng bài viết trong kết quả
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="' . $row['image_url'] . '" class="card-img-top" alt="Ảnh bài viết">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['title'] . '</h5>
                            <p class="card-text">' . $row['excerpt'] . '</p>
                            <a href="post-detail.php?id=' . $row['blog_id'] . '" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                ';
            }
        } else {
            echo "<div class='alert alert-warning text-center'>Hiện chưa có bài viết nào. Hãy quay lại sau!</div>";
        }

        $conn->close();
        ?>
    </div>
</div>
<script src="js/login.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
