<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "happytrips";  // Thay bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy tour_id từ URL (nếu có)
$tour_id = isset($_GET['tour_id']) ? $_GET['tour_id'] : 1; // Giả sử tour_id mặc định là 1

// Lấy thông tin vị trí của tour từ cơ sở dữ liệu
$get_location_query = "SELECT name, latitude, longitude FROM Tour WHERE tour_id = $tour_id";
$result = $conn->query($get_location_query);

if ($result->num_rows > 0) {
    $location = $result->fetch_assoc();
} else {
    $location = null;  // Không tìm thấy dữ liệu
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Location Map</title>
    <!-- Thêm Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px; /* Chiều cao bản đồ */
            width: 100%;   /* Chiều rộng bản đồ */
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; color: black" >
        Location of Tour: 
        <?php 
            if ($location) {
                echo htmlspecialchars($location['name']);
            } else {
                echo "No location available for this tour.";
            }
        ?>
    </h1>
    <div id="map"></div>

    <!-- Thêm Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        <?php if ($location): ?>
        // Dữ liệu vị trí từ PHP
        const tourLocation = {
            name: "<?php echo htmlspecialchars($location['name']); ?>",
            latitude: <?php echo $location['latitude']; ?>,
            longitude: <?php echo $location['longitude']; ?>
        };

        // Hàm khởi tạo bản đồ
        const map = L.map('map').setView([tourLocation.latitude, tourLocation.longitude], 13); // Set center cho bản đồ

        // Thêm lớp bản đồ OpenStreetMap vào
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Thêm marker cho vị trí cụ thể
        const marker = L.marker([tourLocation.latitude, tourLocation.longitude]).addTo(map);
        marker.bindPopup("<b>" + tourLocation.name + "</b>").openPopup();
        <?php else: ?>
        console.log("No location data available.");
        <?php endif; ?>
    </script> <br>
</body>
</html>
