<?php
session_start(); // Bắt đầu phiên làm việc của PHP
require_once('../../MySQL/Createdatabase.php'); /*kết nối với database*/
require_once('../model/phpmailer/Exception.php');  // Thư viện PHPMailer
require_once('../model/phpmailer/PHPMailer.php');
require_once('../model/phpmailer/SMTP.php');
require_once('../model/function.php'); 


$msg = getFlashData('msg'); // Lấy thông báo từ session
$msg_type = getFlashData('msg_type'); // Lấy kiểu thông báo

// Xử lý form khi gửi yêu cầu
if (isPost()) {
    $filterAll = filter(); // Lọc và làm sạch dữ liệu
    if (!empty($filterAll['email'])) {
        $email = $filterAll['email'];
        
        $queryUser = oneraw("SELECT user_id FROM User WHERE email = '$email'");
        if (!empty($queryUser)){
            $userId = $queryUser['user_id'];
            // Tạo forgot token
            $forgotToken = sha1(uniqid().time());

            $dataUpdate = [
                'forgot_token' => $forgotToken
            ];
            $updateStatus = update('User', $dataUpdate, "user_id = $userId");
            if ($updateStatus){
                // Tạo link reset khôi phục mật khẩu
                $link_reset ="http://localhost:8080/BOOKING%20TOUR/Booking_Tour/src/user/reset_password.php?token=$forgotToken";
                // Gửi email
                $subject = "Reset Account Password";
                $message = "
                    <p>Hello,</p>
                    <p>You have requested to reset your password. Please click the link below to reset your password:</p>
                    <ul>
                        <li><strong>Link reset:</strong> $link_reset</li>
                    </ul>
                    <p>Best regards,<br><strong>Happy Trips.</strong></p>
                ";

                // bắt đầu gửi 
                $sendEmail = sendMail($email, $subject, $message);
                if ($sendEmail){
                    setFlashData('msg', 'Vui lòng kiểm tra email của bạn để xem hướng dẫn đặt lại mật khẩu!');
                    setFlashData('msg_type', 'success');
                }
                else{
                    setFlashData('msg', 'Lỗi hệ thống gửi mail không thành công!Vui lòng thử lại sau nhé!');
                    setFlashData('msg_type', 'danger');
                }
               
            }else{
                setFlashData('msg', 'Lỗi hệ thống! Vui lòng thử lại sau!');
                setFlashData('msg_type', 'danger');
            }
        }else{
            setFlashData('msg', 'Địa chỉ email không tồn tại trong hệ thống!');
            setFlashData('msg_type', 'danger');
        }
    } else {
        // Nếu không nhập email, hiển thị thông báo lỗi
        setFlashData('msg', 'Vui lòng nhập địa chỉ email!');
        setFlashData('msg_type', 'danger');
        header('Location: ' . $_SERVER['PHP_SELF']); // Chuyển hướng lại trang để hiển thị thông báo
        exit; // Dừng script
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/log_in.css">
</head>
<body>
    <div class="container">
        <div class="text-section">
            <h1>EXPLORE NEW THINGS WITH HAPPY TRIPS</h1>
            <p>&copy; HappyTrips.com.vn © 2023. All Rights Reserved.</p>
        </div>

        <div class="login-form shadow">
            <div class="text-center mb-4">
                <img src="../assets/logo/Logo.jpg" alt="Logo" class="img-fluid mb-2 img_logo">
                <h2 class="title-frm">RECOVER YOUR PASSWORD</h2>
            </div>

            <!-- Hiển thị thông báo nếu có -->
            <?php
            if (!empty($msg)) {
                getMsg($msg, $msg_type);
            }
            ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                </div>

                <button type="submit" name="submit" class="btn login-btn w-100">SEND REQUEST</button>
            </form>

            <p style="margin-top: 10px; text-align: center;" ><a style="text-decoration: none;" href="log_in.php">Log in here</a></p>
            <p class="text-center mt-3 create-account">Don't have an account? <a href="register.php">Create new account</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


