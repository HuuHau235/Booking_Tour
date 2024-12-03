<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "happytrips"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$tour_id = isset($_GET['tour_id']) ? $_GET['tour_id'] : 0;

$sql = "SELECT name, latitude, longitude FROM Tour WHERE tour_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tour_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tourName = $row["name"];
    $latitude = $row["latitude"];
    $longitude = $row["longitude"];
} else {
    echo "Tour không tồn tại.";
    exit();
}

$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vị Trí Tour</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px; 
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Vị Trí Của Tour: <?php echo $tourName; ?></h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const latitude = <?php echo $latitude; ?>;
        const longitude = <?php echo $longitude; ?>;

        if (latitude === 0 && longitude === 0) {
            alert("Không tìm thấy vị trí cho tour này!");
            return;
        }

        console.log('Tọa độ:', [latitude, longitude]);  

        const map = L.map('map').setView([latitude, longitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        L.marker([latitude, longitude]).addTo(map)
            .bindPopup(`<b>${<?php echo json_encode($tourName); ?>}</b>`)
            .openPopup();
    </script>
</body>
</html>
