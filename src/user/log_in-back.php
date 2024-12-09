<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);

    require_once('../../MySQL/Createdatabase.php');

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM User WHERE email = '$email' and password = md5 ('$password')";
        $result = mysqli_query($conn, $sql);

        $rows = mysqli_num_rows($result);
        if ($rows > 0){
            $_SESSION['email'] = $email; // Initializing Session,Khởi tạo Session cho username
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['user_id'];
            }

            header("location:../index.php?ls=success");
            exit();

        } else {
            $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không hợp lệ!';
    
            header("location:log_in.php?error=wrong");
            exit();
        }
    }  else {
        // Lỗi truy vấn SQL
        $_SESSION['error'] = 'Lỗi truy vấn cơ sở dữ liệu!';
        header("location:log_in.php?error=query");
        exit();
    }

    // Xử lý forgot password
    if (isset($_GET['action']) && $_GET['action'] == 'forgot_password') {
        header("location:forgot_token.php");
        exit();
    }
?>
