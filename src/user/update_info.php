<?php
session_start();

// Hàm để lấy dữ liệu flash
function getFlashData($key) {
    if (isset($_SESSION[$key])) {
        $data = $_SESSION[$key];
        unset($_SESSION[$key]); // Xóa dữ liệu flash sau khi đã lấy
        return $data;
    }
    return null;
}

// Hàm để set dữ liệu flash
function setFlashData($key, $value) {
    $_SESSION[$key] = $value;
}

// Hàm hiển thị thông báo
function getMsg($msg, $msg_type) {
    $class = $msg_type === 'danger' ? 'alert-danger' : 'alert-success';
    echo "<div class='alert $class' role='alert'>$msg</div>";
}

// Lấy thông báo từ session (nếu có)
$smg = getFlashData('msg');
$msg_type = getFlashData('msg_type');

if (!isset($_SESSION['user_id']) || (isset($_SESSION['role']) && $_SESSION['role'] == 2)) {
    header('Location: log_in.php'); 
    exit;
}

$user_id = $_SESSION['user_id'];

// Kết nối đến cơ sở dữ liệu
$mysqli = new mysqli('localhost', 'root', '', 'HappyTrips');
if ($mysqli->connect_error) {
    die('Kết nối thất bại: ' . $mysqli->connect_error);
}

// Lấy thông tin người dùng từ database
$query = "SELECT name, email, phone, address FROM User WHERE user_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    setFlashData('msg', 'Không tìm thấy thông tin người dùng.');
    setFlashData('msg_type', 'danger');
    header('Location: login.php');
    exit;
}

// Xử lý cập nhật thông tin cá nhân
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?: $user['name'];
    $email = $_POST['email'] ?: $user['email'];
    $phone = $_POST['phone'] ?: $user['phone'];
    $address = $_POST['address'] ?: $user['address'];

    $update_query = "UPDATE User SET name = ?, email = ?, phone = ?, address = ? WHERE user_id = ?";
    $update_stmt = $mysqli->prepare($update_query);
    $update_stmt->bind_param('ssssi', $name, $email, $phone, $address, $user_id);

    if ($update_stmt->execute()) {
        setFlashData('msg', 'Đã cập nhật thông tin thành công!');
        setFlashData('msg_type', 'success');
        header('Location: ../index.php');
        exit();
    } else {
        setFlashData('msg', 'Cập nhật thất bại. Vui lòng thử lại!');
        setFlashData('msg_type', 'danger');
    }

    $update_stmt->close();
    header("Location: update_info.php");
    exit;
}

$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips - Personal Info</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/update_info.css">
</head>
<body>
    <div class="mt-5">
        <div class="container shadow-lg">
            <h5 class="title-frm mb-0">Personal Information</h5>
            <div class="card-body">
                <form action="update_info.php" method="POST">
                    <?php
                    // Hiển thị thông báo nếu có
                    if (!empty($smg)) {
                        getMsg($smg, $msg_type);
                    }
                    ?>
                    <div class="mb-3">
                        <label for="fullname" class="form-label"><i class="bi bi-person-fill"></i> Full Name</label>
                        <input type="text" class="form-control" name="name" id="fullname" placeholder="Enter your full name" value="<?= htmlspecialchars($user['name']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill"></i> Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?= htmlspecialchars($user['email']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><i class="bi bi-telephone-fill"></i> Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" value="<?= htmlspecialchars($user['phone']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><i class="bi bi-house-door-fill"></i> Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" value="<?= htmlspecialchars($user['address']) ?>">
                    </div>
                    <div class="btn_update d-flex justify-content-between">
                        <button type="button" onclick="window.location.href='changePassword.php'" class="btn btn-warning"><i class="bi bi-key-fill"></i> Change Password</button>
                        <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Update</button>
                        <button type="button" onclick="window.location.href='log_out.php'" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Log Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
