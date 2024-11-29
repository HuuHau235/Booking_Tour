<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT day, description FROM Itinerary WHERE tour_id = ? ORDER BY day ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tour_id);
$stmt->execute();
$itinerary_result = $stmt->get_result();

$itinerary = [];
while ($row = $itinerary_result->fetch_assoc()) {
    $itinerary[] = $row;
}

$stmt->close();
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
    <title>HappyTrips</title>
</head>
<body>
    <section id="lich-trinh">
            <h2>Schedule</h2>
              <div class="accordion" id="tourSchedule">
                <?php foreach ($itinerary as $item): ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="day<?= $item['day'] ?>-heading">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                              data-bs-target="#day<?= $item['day'] ?>" 
                              aria-expanded="false" aria-controls="day<?= $item['day'] ?>">
                        Date <?= $item['day'] ?>
                      </button>
                    </h2>
                    <div id="day<?= $item['day'] ?>" class="accordion-collapse collapse" 
                         aria-labelledby="day<?= $item['day'] ?>-heading" data-bs-parent="#tourSchedule">
                      <div class="accordion-body">
                        <?= $item['description'] ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
      </section><br><br>
</body>
</html>