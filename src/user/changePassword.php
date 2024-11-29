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

// Kết nối đến cơ sở dữ liệu
$mysqli = new mysqli('localhost', 'root', '', 'HappyTrips');
if ($mysqli->connect_error) {
    die('Kết nối thất bại: ' . $mysqli->connect_error);
}  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    $user_id = $_SESSION['user_id']; // Lấy ID user từ session

    // Kiểm tra mật khẩu cũ
    $query = "SELECT password FROM User WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Kiểm tra mật khẩu cũ
    if ($user['password'] === md5($old_password)) {
        // Kiểm tra mật khẩu mới và xác nhận
        if ($new_password === $confirm_password) {
            $hashed_password = md5($new_password);

            // Cập nhật mật khẩu
            $query = "UPDATE User SET password = ? WHERE user_id = ?";
            $update_stmt = $mysqli->prepare($query);
            $update_stmt->bind_param("si", $hashed_password, $user_id);

            if ($update_stmt->execute()) {
                setFlashData('msg', 'Đã cập nhật mật khẩu thành công!');
                setFlashData('msg_type', 'success');
                header('Location: ../index.php');
                exit();
            } else {
                setFlashData('msg', 'Lỗi cập nhật mật khẩu. Vui lòng thử lại!');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Mật khẩu mới và mật khẩu cũ không khớp!');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Mật khẩu cũ không khớp!');
        setFlashData('msg_type', 'danger');
    }

    header('Location: change_password.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS (Optional nếu cần hiệu ứng)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/changePassword.css">

</head>
<body>
    <div class="mt-5">
        <div class="container shadow-lg">
            <h5 class="title-frm mb-0">Change Password</h5>
            <div class="card-body">
                <form action="changePassword.php" method="POST">
                    <?php
                        // Hiển thị thông báo nếu có
                        if (!empty($smg)) {
                            getMsg($smg, $msg_type);
                        }
                    ?>
                    <div class="mb-3">
                        <label for="current-password" class="form-label"><i class="bi bi-key"></i>Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="current-password" placeholder="Enter your old password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label"><i class="bi bi-lock-fill"></i> New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new-password" placeholder="Enter your new password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-new-password" class="form-label"><i class="bi bi-lock-fill"></i> Confirm New Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm-new-password" placeholder="Re-enter your new password">
                    </div>
                    <div class="btn-changePassword d-flex justify-content-between">
                        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update</button>
                        <button type="button" onclick="window.location.href='../index.php'" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>