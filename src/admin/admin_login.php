<?php
session_start();
require_once('../../MySQL/Createdatabase.php'); // Kết nối với cơ sở dữ liệu

// Kiểm tra nếu form đã được gửi
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra nếu người dùng nhập tên đăng nhập và mật khẩu
    if (empty($username) || empty($password)) {
        echo "Vui lòng nhập tên đăng nhập và mật khẩu.";
        exit();
    }

    // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM admin WHERE username = ? AND password = MD5(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra kết quả truy vấn
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['username'];
        header("Location: admin_dashboard.php"); // Điều hướng đến trang quản lý admin
        exit();
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Đăng nhập Admin</h2>
        <form action="admin_login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
