<?php
session_start();

// Kết nối cơ sở dữ liệu
$mysqli = new mysqli("localhost", "root", "", "HappyTrips");

if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

// Kiểm tra user_id trong session
if (!isset($_SESSION['user_id'])) {
    die("Bạn cần đăng nhập để thực hiện thanh toán.");
}

$user_id = $_SESSION['user_id'];

// Query lấy thông tin người dùng
$query_user = "SELECT * FROM User WHERE user_id = ?";
$stmt_user = $mysqli->prepare($query_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows === 0) {
    die("Không tìm thấy thông tin người dùng.");
}

$user = $result_user->fetch_assoc();

// Query lấy thông tin booking gần nhất
$query_booking = "SELECT * FROM Booking WHERE user_id = ? ORDER BY booking_id DESC LIMIT 1";
$stmt_booking = $mysqli->prepare($query_booking);
$stmt_booking->bind_param("i", $user_id);
$stmt_booking->execute();
$result_booking = $stmt_booking->get_result();

if ($result_booking->num_rows === 0) {
    die("Không tìm thấy thông tin booking.");
}

$booking = $result_booking->fetch_assoc();

// Lấy thông tin tour
$query_tour = "SELECT t.*, ti.image_url FROM Tour t 
               LEFT JOIN Tourimage ti ON t.tour_id = ti.tour_id
               WHERE t.tour_id = ?";
$stmt_tour = $mysqli->prepare($query_tour);
$stmt_tour->bind_param("i", $booking['tour_id']);
$stmt_tour->execute();
$result_tour = $stmt_tour->get_result();

if ($result_tour->num_rows === 0) {
    die("Không tìm thấy thông tin tour.");
}

$tour = $result_tour->fetch_assoc();

// Include thư viện QR code
include_once __DIR__ . '../libs/phpqrcode/qrlib.php';

// Kiểm tra lớp QRCode
if (!class_exists('QRcode')) {
    die("QRcode class not loaded. Check the include path for phpqrcode.");
}

// Dữ liệu QR
$qrData = "Bank Name: MB BANK\nAccount Number: 0312 455 602\nAccount Holder: Happy Trips\nAmount: " . 
          $tour['price'] . " USD";



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/payment_information.css">
</head>
<body>
    <!-- Header -->
    <header class="payment-header">
        <h1><i class="bi bi-airplane-engines"></i> Tour Payment</h1>
        <p>Complete your information to confirm your tour booking</p>
    </header>

    <div class="container">
        <div class="row">
            <!-- Tour Detail -->
            <div class="col-md-6">
                <div class="card-detail">
                    <img class="tour-image" src="<?php echo $tour['image_url']; ?>" class="img-fluid" alt="Tour Image">
                    <div class="card-header">
                        <h4 class="title_frm">Tour Detail</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-item"><strong><i class="bi bi-bookmark-heart-fill"></i> Tour name:</strong> <?php echo htmlspecialchars($tour['name']); ?></p>
                        <p class="card-item"><strong><i class="bi bi-calendar2-week-fill"></i> Start date:</strong> <?php echo htmlspecialchars($tour['start_date']); ?></p>
                        <p class="card-item"><strong><i class="bi bi-calendar2-week-fill"></i> End date:</strong> <?php echo htmlspecialchars($tour['end_date']); ?></p>
                        <p class="card-item"><strong><i class="bi bi-people-fill"></i> Quantity:</strong> <?php echo htmlspecialchars($booking['num_people']); ?></p>
                        <p class="card-item final"><strong><i class="bi bi-coin"></i> Total price:</strong> <?php echo $tour['price']; ?> VND</p>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="col-md-6">
                <div class="card-paymentInformation">
                    <div class="card-header paymentInformation">
                        <h4 class="title_frm">Payment Information</h4>
                    </div>

                    <div class="card-body paymentInformation">
                        <div class="mb-3 frm-item">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
                        </div>
                        <div class="mb-3 frm-item">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                        </div>
                        <div class="mb-3 frm-item">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                        </div>
                        <!-- Phương thức thanh toán -->
                        <form action="process_payment.php" method="POST">
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Methods</label>
                                <select class="form-control" id="paymentMethod" name="paymentMethod" onchange="toggleBankTransferInfo()">
                                    <option value="cash payment">Cash payment</option>
                                    <option value="bank transfer">Bank Transfer</option>
                                </select>
                            </div>

                            <!-- Thông tin chuyển khoản -->
                            <div id="bankTransferInfo" style="display: none;">
                                <div class="card-header bank_transferInformation">
                                    <h4 class="title_frm bank_transferInformation">Bank Transfer Information</h4>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>MB BANK</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>0312 455 602</td>
                                    </tr>
                                    <tr>
                                        <th>Account Holder</th>
                                        <td>Happy Trips</td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td><?php echo $tour['price']; ?> VND</td>
                                    </tr>
                                </table>
                                <div class="text-center">
                                    <?php
                                        $qrFilePath = __DIR__ . "/qrcodes/payment_qr_$user_id.png";
                                        QRcode::png($qrData, $qrFilePath, QR_ECLEVEL_L, 10);
                                    ?>
                                    <img src="qrcodes/payment_qr_<?php echo $user_id; ?>.png" alt="QR Code" style="width:250px; height:250px;">
                                    <p>Scan this QR code to complete the payment</p>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3">Confirm Payment</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleBankTransferInfo() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            const bankTransferInfo = document.getElementById('bankTransferInfo');
            if (paymentMethod === 'bank transfer') {
                bankTransferInfo.style.display = 'block';
            } else {
                bankTransferInfo.style.display = 'none';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>