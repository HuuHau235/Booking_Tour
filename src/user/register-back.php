<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);

    // Yêu các file cần thiết để gửi email sau khi đăng ký thành công
    require_once('../../MySQL/Createdatabase.php'); /*kết nối với database*/
    require_once('../model/phpmailer/Exception.php');  // Thư viện PHPMailer
    require_once('../model/phpmailer/PHPMailer.php');
    require_once('../model/phpmailer/SMTP.php');
    require_once('../model/function.php'); /* Các hàm bỏ vào đây để viết các hàm dùng trong trang web */
    
    if (isset($_POST['submit'])){
        // Việc lấy dữ liệu từ form
        if (isset($_POST['fullname'])){
            $name = $_POST['fullname'];
        }

        if (isset($_POST['phonenumber'])){
            $phone = $_POST['phonenumber'];
        }

        if (isset($_POST['address'])){
            $address = $_POST['address'];
        }

        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }

        if (isset($_POST['password'])){
            $password = $_POST['password'];
        }

        if (isset($_POST['confirmpassword'])){
            $confirm_password = $_POST['confirmpassword'];
        }
        
        if (empty($name) || empty($phone) || empty($address) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "Vui lòng điền đầy đủ thông tin!";
            exit();
        }
    
        if ($confirm_password != $password){
            echo "Xác nhận mật khẩu không khớp!";
            exit();
        }
        
        $sql_check = "SELECT * FROM User WHERE name = ? OR email = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ss", $name, $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        
        if ($result_check->num_rows > 0) {
            echo "Tên đăng nhập hoặc email đã tồn tại!";
            exit();
        }
        
        // Mã hóa mật khẩu
        $hashed_password = md5($password);  // Có thể thay thế bằng password_hash() để an toàn hơn
        
        // Thực hiện chèn dữ liệu vào bảng User
        $sql = "INSERT INTO User (name, email, password, phone, address, role) 
                VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $hashed_password, $phone, $address);
        $res = $stmt->execute();

        // Nội dung của email sẽ gửi
        $subject = "Confirm Receipt of Successful Account Registration";
        $message = "
            <p>Hello $name,</p>
            <p>Thank you for registering an account with us. Your account has been successfully created with the following information:</p>
            <ul>
                <li><strong>Email:</strong> $email</li>
                <li><strong>Password:</strong> $password</li>
            </ul>
            <p>Please keep this information secure and do not share it with anyone to protect your account.</p>
            <p>We hope you have a great experience using our services!</p>
            <p>Best regards,<br><strong>Happy Trips.</strong></p>
        ";
        // Nếu đã chèn dự liệu thành công database thì gửi email xác nhận
        if ($res){
            sendMail($email, $subject, $message);
            header("location:log_in.php?rs=success");
            exit();
        }
        else{
            header("location:log_in.php?rf=fail");
            exit();
        }
    }
?>