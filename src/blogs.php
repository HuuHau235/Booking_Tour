<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <title>Blog</title>
  <link rel="stylesheet" href="../css/blog.css">
</head>
<body>
  <!-- Header -->
  <div class="header_blogs">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="hea.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About us</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Tour</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Destination</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Blogs
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li><a class="dropdown-item" href="blogs.php">All</a></li>
                <li><a class="dropdown-item" href="blogs.php?category=meo-du-lich">Travel Tips</a></li>
                <li><a class="dropdown-item" href="blogs.php?category=diem-den">Destination</a></li>
            </ul>

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
    <div class="text animate__animated animate__fadeInDown">Welcome to our blogs</div>
  </div>

  <!-- Blog Section -->
  <section class="container my-5">
    <div class="row g-4"> <!-- Thêm g-4 để tạo khoảng cách -->
      <?php
        // Mảng chứa thông tin các bài viết
        $posts = [
          [
            "id" => 1,
            "category" => "meo du lich",
            "title" => "18 tips for traveling on a budget",
            "description" => "Ever wondered how to travel for cheap? If so, here’s good news: There are lots of ways to economize while still checking destinations off your travel bucket list.
Whether you’re thinking about ...",
            "image" => "../images_blog/Tietkiem.jpg",
            "link" => "https://www.capitalone.com/learn-grow/more-than-money/budget-travel-tips/"
          ],
          [
            "id" => 2,
            "category" => "diem-den",
            "title" => "12 of the best places to visit in Vietnam",
            "description" => "Enjoy Hanoi and Halong Bay — then step beyond the tourist trail to find more magic in the highlands, islands, history and culture of this captivating nation....",
            "image" => "../images_blog/Best_destination.jpg",
            "link" => "https://www.thetimes.com/travel/destinations/asia-travel/vietnam/best-places-to-visit-in-vietnam-p3jfppb7t"
          ],
          [
            "id" => 3,
            "category" => "meo-du-lich",
            "title" => "20 Travel-ready packing tips for travelling on short notice",
            "description" => "Are you ready to grab an attractive travel deal at a moment’s notice? Are you occasionally asked to pack your bags for an unexpected trip...",
            "image" => "../images_blog/prepa.jpeg",
            "link" => "https://packinglighttravel.com/travel-tips/luggage-and-packing/travel-ready-packing-tips/"
          ],
          [
            "id" => 4,
            "category" => "diem-den",
            "title" => "Top 24 Most Beautiful and Famous Tourist Destinations in Hà Giang ",
            "description" => "A busy life sometimes makes you forget about relaxation. Travel to find balance and joy again. This article will help you choose a suitable trip,
For those...",
            "image" => "../images_blog/hà_giang.jpg",
            "link" => "https://mytour.vn/en/blog/bai-viet/top-24-most-beautiful-and-famous-tourist-destinations-in-ha-giang.html"
          ],
          [
            "id" => 5,
            "category" => "diem-den",
            "title" => "Top 6 tourist destinations in Da Nang",
            "description" => "Welcome to Da Nang, Vietnam, where modern architecture meets natural beauty. Bridge is a unique testament to modern engineering. The record belonged to a bridge that is now surpassed by this modern …",
            "image" => "../images_blog/Đà_nẵng.jpg",
            "link" => "https://houserentaldanang.com/best-places-to-visit-in-da-nang/"
          ],
          [
            "id" => 6,
            "category" => "meo-du-lich",
            "title" => "10 Travel Skin Care Tips",
            "description" => "If you are forever dipped in wanderlust, you need to know some travel skin care tips!
              Traveling is stressful, even when you are flying to some exotic location. All of the stress associated with travel can ....",
            "image" => "../images_blog/skincare.jpg",
            "link" => "https://www.stylecraze.com/articles/travel-skin-care-tips/"
          ],
          [
            "id" => 7,
            "category" => "meo-du-lich",
            "title" => "Plan Your First Trip to Vietnam",
            "description" => "Visiting Vietnam offers an unparalleled experience, combining stunning landscapes, rich cultural heritage, and exquisite cuisine. Travel Off Path, a world-leading indie travel news source has named Vietnam the safest country to visit in Asia for 2024....",
            "image" => "../images/plan_firs.jpeg",
            "link" => "https://oxalisadventure.com/plan-your-first-trip-to-vietnam/"
          ],
          [
            "id" => 8,
            "category" => "meo-du-lich",
            "title" => "The Beginner’s Guide to Exploring Vietnam",
            "description" => "Now here's a country that breaks the mold of your typical Asian destination. Vietnam's not just famous for its stunning landscape and unique culture. It gets way quirkier than that—we're talking egg coffee ...",
            "image" => "../images_blog/Beginer.jpeg",
            "link" => "https://www.atlys.com/blog/beginners-guide-vietnam"
          ],
          [
            "id" => 9,
            "category" => "diem-den",
            "title" => "7 places in Vietnam for families ",
            "description" => "Picking the right destination for a family holiday can be tricky, but the pay-off is well worth it. Sharing a gorgeous view with those closest to you, or watching the kids be amazed by new experiences is simply wonderful....",
            "image" => "../images_blog/vietnam travel for families.jpg",
            "link" => "https://vietnam.travel/things-to-do/vietnam-for-families"
          ]
        ];
        // Lọc bài viết theo tham số category trong URL
        $categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

        // Lặp qua mảng $posts và hiển thị bài viết nếu thuộc danh mục cần lọc
        foreach ($posts as $post) {
          if ($categoryFilter === '' || $post['category'] === $categoryFilter) {
            echo '
              <div class="col-md-4">
                <div class="card h-100">
                  <img src="' . $post['image'] . '" class="card-img-top_blogs" alt="...">
                  <div class="card-body">
                    <h5 class="card-title_blogs">' . $post['title'] . '</h5>
                    <p class="card-text_blogs">' . $post['description'] . '</p>
                    <a href="' . $post['link'] . '" class="btn btn-primary">Read more</a>
                  </div>
                </div>
              </div>
            ';
          }
        }
      ?>
    </div>
  </section>
<script src="blogs.js"></script>
  <?php include 'footer.php'; ?>
</body>
</html>
