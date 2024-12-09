<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "happytrips";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tour_id = isset($_GET['tour_id']) ? $_GET['tour_id'] : 1; 

$get_location_query = "SELECT name, latitude, longitude FROM Tour WHERE tour_id = $tour_id";
$result = $conn->query($get_location_query);

if ($result->num_rows > 0) {
    $location = $result->fetch_assoc();
} else {
    $location = null; 
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Location Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px; 
            width: 80%;   
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; color: #fc0000" >
        <?php 
            if ($location) {
                echo htmlspecialchars($location['name']);
            } else {
                echo "No location available for this tour.";
            }
        ?>
    </h2>
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
