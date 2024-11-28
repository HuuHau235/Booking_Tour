<?php
// Dữ liệu về các chuyến đi
$trips = [
    [
        "image" => "./assets/images/danang.png",
        "title" => "2 days 3 nights trip to Da Nang",
        "rating" => "⭐⭐⭐⭐",
        "price" => "$350"
    ],
    [
        "image" => "./assets/images/haiphong.png",
        "title" => "2 days 3 nights trip to Hai Phong",
        "rating" => "⭐⭐⭐⭐",
        "price" => "$230"
    ],
    [
        "image" => "./assets/images/sapa.png",
        "title" => "2 days 3 nights trip to Sa Pa",
        "rating" => "⭐⭐⭐⭐⭐",
        "price" => "$270"
    ],
    [
        "image" => "./assets/images/hoian.png",
        "title" => "2 days 3 nights trip to Hoi An",
        "rating" => "⭐⭐⭐⭐⭐",
        "price" => "$220"
    ],
    [
        "image" => "./assets/images/danang.png",
        "title" => "2 days 3 nights trip to Da Nang Again",
        "rating" => "⭐⭐⭐⭐⭐",
        "price" => "$400"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Deal</title>
    <style>
        .card {
            position: relative;
            width: 100%;
            max-width: 300px; /* Bạn có thể điều chỉnh kích thước */
            margin: 15px;
            border-radius: 10px;
            overflow: hidden; /* Ẩn phần ảnh tràn ra ngoài */
        }

        .card img {
            width: 100%;
            height: auto; /* Đảm bảo ảnh không bị méo */
            object-fit: cover; /* Đảm bảo ảnh lấp đầy thẻ mà không bị méo */
        }

        .card-img-over {
            position: absolute;
            bottom: 0; /* Đặt chữ ở phía dưới cùng của ảnh */
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Nền bán trong suốt */
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .price-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .slider-wrapper{
            display: flex;
        }

    </style>
</head>
<body>
    <section class="features py-5">
        <div class="container">
            <h2>FLASH DEAL</h2>
            <p>Our best fast minutes offers. Book now and get</p>
            <div class="slider-wrapper">
                <div class="slider">
                    <?php foreach ($trips as $trip): ?>
                        <div class="card">
                            <img src="<?php echo $trip['image']; ?>" class="card-img" alt="<?php echo $trip['title']; ?>">
                            <span class="price-badge"><?php echo $trip['price']; ?></span>
                            <div class="card-content">
                                <h5 class="card-title"><?php echo $trip['title']; ?></h5>
                                <p class="card-text"><?php echo $trip['rating']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slider-controls">
                    <button class="btn-prev">&lt;</button>
                    <button class="btn-next">&gt;</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        const slider = document.querySelector('.slider');
        const btnNext = document.querySelector('.btn-next');

        let currentIndex = 0; // Vị trí hiện tại
        const cardWidth = slider.querySelector('.card').offsetWidth + 15; // Chiều rộng mỗi thẻ (bao gồm khoảng cách)
        const totalCards = slider.querySelectorAll('.card').length;
        const cardsPerView = 4; // Số thẻ hiển thị trong 1 hàng

        // Khi nhấn nút Next (>)
        btnNext.addEventListener('click', () => {
            if (currentIndex < totalCards - cardsPerView) {
                currentIndex++;
                slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            }
        });

    </script>
</body>
</html>
