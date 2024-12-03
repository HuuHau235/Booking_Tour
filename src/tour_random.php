<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HappyTrips";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$money = (float)$_POST['money'];
$duration = (int)$_POST['duration'];

$sql = "SELECT * FROM Tour WHERE price <= ? AND duration = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $money, $duration);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $tour = $result->fetch_assoc();
    header("Location: payment.php?tour_id=" . $tour['tour_id']);
    exit();
} else {
    echo '<div class="container mt-5 text-center">';
    echo '<h3>Không tìm thấy tour phù hợp.</h3>';
    echo '<a href="select_tour.html" class="btn btn-secondary mt-3">Quay lại</a>';
    echo '</div>';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Tour Tự Động</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Chọn Tour Tự Động</h3>
                        <form action="process_tour.php" method="POST">
                            <div class="mb-3">
                                <label for="money" class="form-label">Số tiền bạn có (VNĐ)</label>
                                <input type="number" class="form-control" id="money" name="money" placeholder="Nhập số tiền" required>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Số ngày đi</label>
                                <input type="number" class="form-control" id="duration" name="duration" placeholder="Nhập số ngày" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tìm Tour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
