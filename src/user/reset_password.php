<?php
session_start(); // Bắt đầu phiên làm việc
require_once('../../MySQL/Createdatabase.php'); // Kết nối database
require_once('../model/function.php'); // Các hàm tiện ích

// Lấy token từ URL
$token = isset($_GET['token']) ? trim($_GET['token']) : null;

if (!empty($token)) {
    $tokenQuery = oneraw("SELECT user_id, name, email FROM User WHERE forgot_token = '$token'");
    if (!empty($tokenQuery)) {
        $userId = $tokenQuery['user_id'];
        if (isPost()) {
            $filterAll = filter1();  // Lọc và lấy giá trị từ form
            $errors = [];  // Mảng chứa các lỗi

            // Kiểm tra mật khẩu
            if (empty($filterAll['password'])) {
                $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
            } else {
                if (strlen($filterAll['password']) < 4) {
                    $errors['password']['min'] = 'Mật khẩu phải lớn hơn hoặc bằng 4 ký tự';
                }
            }

            // Kiểm tra mật khẩu xác nhận
            if (empty($filterAll['confirmpassword'])) {
                $errors['confirmpassword']['required'] = 'Bạn phải nhập lại mật khẩu';
            } else {
                if ($filterAll['password'] != $filterAll['confirmpassword']) {
                    $errors['confirmpassword']['match'] = 'Mật khẩu bạn nhập lại không khớp';
                }
            }

            // Nếu có lỗi, giữ lại form cũ và thông báo lỗi
            if (!empty($errors)) {
                setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
                setFlashData('msg_type', 'danger');
                setFlashData('errors', $errors);
                // redirect('?module=auth&action=reset_password&token=' . $token);
            }
            
            // Nếu không có lỗi, tiến hành xử lý thay đổi mật khẩu
            // Ví dụ: Cập nhật mật khẩu trong database ở đây
            // Mã cập nhật mật khẩu vào database sẽ đi ở đây
            $passwordHash = password_hash($filterAll['password'],PASSWORD_DEFAULT);
            $dataUpdate = [
                'password' => $passwordHash,
                'forgot_token' => null
            ];
            $updateStatus = update('User', $dataUpdate, "user_id = $userId");

            // if ($updateStatus){
            //     setFlashData('msg', 'Thay đổi mật khẩu thành công.Hãy đăng nhập vào tài khoản của bạn!');
            //     setFlashData('msg_type', 'success');
            //     redirect('?module=auth&action=log_in');
            // }
            // else{
            //     setFlashData('msg', 'Lỗi hệ thống vui lòng thử lại sau!');
            //     setFlashData('msg_type', 'danger');
            // }
            if ($updateStatus) {
                error_log("Password updated successfully.");
                setFlashData('msg', 'Thay đổi mật khẩu thành công. Hãy đăng nhập vào tài khoản của bạn!');
                setFlashData('msg_type', 'success');
                redirect('?module=auth&action=log_in');
            } else {
                error_log("Failed to update password.");
                setFlashData('msg', 'Lỗi hệ thống vui lòng thử lại sau!');
                setFlashData('msg_type', 'danger');
            }
            
        }

        // Lấy lại thông báo và lỗi nếu có
        $smg = getFlashData('msg');
        $msg_type = getFlashData('msg_type');
        $errors = getFlashData('errors');

        // Hiển thị form đặt lại mật khẩu
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Happy Trips</title>
            <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font chữ -->
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../styles/register.css">
        </head>
        <body>
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="form-container">
                    <img src="../assets/logo/Logo.jpg" alt="Logo" class="img-fluid mb-2 img_logo">
                    <h2 class="title-frm text-center mb-4">Reset Your Password</h2>
                    <!-- Form -->
                    <form action="" method="POST" name="myForm">
                        <?php
                        // Hiển thị thông báo nếu có
                        if (!empty($smg)) {
                            getMsg($smg, $msg_type);
                        }
                        ?>  
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?php echo isset($filterAll['password']) ? htmlspecialchars($filterAll['password']) : ''; ?>">
                            <?php
                                // Hiển thị lỗi nếu có
                                echo form_error('password', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirmpassword" placeholder="Re-enter your password" value="<?php echo isset($filterAll['confirmpassword']) ? htmlspecialchars($filterAll['confirmpassword']) : ''; ?>">
                            <?php
                                // Hiển thị lỗi nếu có
                                echo form_error('confirmpassword', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom" name="submit">Save Password</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        Already have an account? <a href="log_in.php" class="text-primary">Log in here</a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Nếu token không hợp lệ, đặt thông báo và chuyển hướng
        setFlashData('msg', 'Liên kết không tồn tại hoặc đã hết hạn!');
        setFlashData('msg_type', 'danger');
        redirect('?module=auth&action=reset_password');
    }
} else {
    // Nếu không có token, đặt thông báo và chuyển hướng
    setFlashData('msg', 'Liên kết không tồn tại hoặc đã hết hạn!');
    setFlashData('msg_type', 'danger');
    redirect('?module=auth&action=reset_password');
}
?>
