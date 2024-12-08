<?php
$servername = "localhost"; 
$username = "root";        
$password = "";          
$dbName = "HappyTrips";       

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to the database '$dbName'";

?>
<?php

// Kiểm tra và lấy id bài viết từ URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $blog_id = $_GET['id'];
    
    // Truy vấn cơ sở dữ liệu để lấy chi tiết bài viết
    $sql = "SELECT b.id, b.title, b.content, b.author, b.post_date,
                   COALESCE(bi.image_url, 'default-image.jpg') AS image_url, 
                   b.category
            FROM Blogs b
            LEFT JOIN Blog_image bi ON b.id = bi.blog_id
            WHERE b.id = $blog_id";

            // Thực hiện truy vấn
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "<p>Bài viết không tồn tại.</p>";
                exit;
            }
        } else {
            echo "<p>Thông tin bài viết không hợp lệ.</p>";
            exit;
        }
        ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/post_detail.css">
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
  </div>
<!-- Header bài viết -->
<div class="header-image">
    <img src="<?php echo $row['image_url']; ?>" alt="Ảnh bài viết">
    <div class="overlay">
        <h1 class="title"><?php echo $row['title']; ?></h1>
        <p class="author">Tác giả: <?php echo $row['author']; ?> | <?php echo $row['post_date']; ?></p>
    </div>
</div>

<!-- Nội dung bài viết -->
<div class="container post-detail">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Nội dung bài viết -->
            <div class="content">
                <?php echo nl2br($row['content']); ?>
            </div>

            <!-- Nút quay lại -->
            <a href="index_blog.php" class="btn btn-secondary back-btn">Return</a>
        </div>
    </div>


    
 <div class="side-info">
                <h1 style="text-align: center;">Top Destination</h1>
                <ul class="list-unstyled mt-3 list-css">
                    <li class="d-flex align-items-center mb-3" id="19">
                    <a href="detail.php?tour_id=19" class="tour-link">
                        <img src="./images/nha_trang_beach.jpg" alt="Nha Trang" class="img-fluid me-2" style="width: 170px; height: 110px;">
                        </a>
                      <div>
                             <p class="m-0">Vibrant Nha Trang</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="17">
                    <a href="detail.php?tour_id=17" class="tour-link">
                        <img src="./images/top_hue.jpg" alt="Huế" class="img-fluid me-2" style="width: 170px; height: 110px;">
                          </a>
                        <div>
                            <p class="m-0">Tranquil Hue</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="6">
                    <a href="detail.php?tour_id=6" class="tour-link">
                        <img src="./images/top_da_nang.jpg" alt="Đà Nẵng" class="img-fluid me-2" style="width: 170px; height: 110px;">
                        </a>
                        <div>
                            <p class="m-0">Golden in the Sky</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="10">
                    <a href="detail.php?tour_id=10" class="tour-link">
                        <img src="./images/vinh_ha_long.jpg" alt="Hạ Long" class="img-fluid me-2" style="width: 170px; height: 110px;">
                       </a>
                        <div>
                            <p class="m-0"> Ha Long Wonder</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="25">
                    <a href="detail.php?tour_id=25" class="tour-link">
                        <img src="./images/top_sapa.jpg" alt="sapa" class="img-fluid me-2" style="width: 170px; height: 110px;">
                            </a>
                        <div>
                            <p class="m-0">Misty Sa Pa</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="">
                    <a href="detail.php?tour_id=15" class="tour-link">
                        <img src="./images/top_hoi_an.jpg" alt="Hội an" class="img-fluid me-2" style="width: 170px; height: 110px;">
                             </a>
                        <div>
                            <p class="m-0">Hoi An Culture</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="3">
                    <a href="detail.php?tour_id=3" class="tour-link">
                        <img src="./images/top_da_lat.jpg" alt="Đà lạt" class="img-fluid me-2" style="width: 170px; height: 110px;">
                            </a>
                        <div>
                            <p class="m-0">Da Lat Fragrance</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="22">
                    <a href="detail.php?tour_id=22" class="tour-link">
                        <img src="./images/top_quang_binh.jpg" alt="Quảng Bình" class="img-fluid me-2" style="width: 170px; height: 110px;">
                        </a>
                        <div>
                            <p class="m-0">Dreamy Quang Binh</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="24">
                    <a href="detail.php?tour_id=24" class="tour-link">
                        <img src="./images/top_ho_chi_minh.jpg" alt="Ho chi minh" class="img-fluid me-2" style="width: 170px; height: 110px;">
                         </a>
                        <div>
                            <p class="m-0">Dynamic Saigon</p>
                        </div>
                     </li>
                    <li class="d-flex align-items-center mb-3" id="9">
                    <a href="detail.php?tour_id=9" class="tour-link">
                        <img src="./images/top_hai_phong" alt="Hai Phong" class="img-fluid me-2" style="width: 170px; height: 110px;">
                    </a>
                        <div>
                            <p class="m-0">Vibrant Hai Phong</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="1">
                    <a href="detail.php?tour_id=1" class="tour-link">
                        <img src="./images/top_tam_dao.jpg" alt="Tam dao" class="img-fluid me-2" style="width: 170px; height: 110px;">
                     </a>
                        <div>
                            <p class="m-0">The Breath of Tam Dao</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="18">
                    <a href="detail.php?tour_id=18" class="tour-link">
                    <img src="./images/top_ly_son" alt="Ly son" class="img-fluid me-2" style="width: 170px; height: 110px;">
                        </a>
                    <div>
                            <p class="m-0">Paradise Ly Son</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-3" id="7">
                    <a href="detail.php?tour_id=7" class="tour-link">
                    <img src="./images/top_quynhon.jpg" alt="quy nhon" class="img-fluid me-2" style="width: 170px; height: 110px;">
                     </a>
                    <div>
                            <p class="m-0">Eo Gio Adventure</p>
                        </div>
                    </li>
                    
                </ul>
            </div>
    </div>
<?php
$conn->close();
?>
<?php include 'footer.php';?>
</body>
</html>
