<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT t.tour_id, t.name AS tour_name, t.description, t.price, ti.image_url 
        FROM Tour t
        JOIN TourImage ti ON t.tour_id = ti.tour_id
        LIMIT 4 OFFSET 4;";
$result = $conn->query($sql);

$tours = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tours[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/detail.css">
    <title>HappyTrips</title>
</head>
<body>
    <section id="Tour-du-lich">
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
                        <span class="new-price"><?= number_format($tour['price']) ?>đ</span>
                    </div>
                    <a href="detail.php?tour_id=<?= $tour['tour_id'] ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section> <br> <br>
</body>
</html>