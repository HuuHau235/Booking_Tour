<?php
// Bao gồm các tệp PHPMailer
require_once('../model/phpmailer/Exception.php');
require_once('../model/phpmailer/PHPMailer.php');
require_once('../model/phpmailer/SMTP.php');

// Hàm gửi email sử dụng PHPMailer với Gmail và mật khẩu ứng dụng
function sendMail($to, $subject, $content){
    // Khởi tạo đối tượng PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);  // Đảm bảo sử dụng đầy đủ namespace

    try {
        // Cấu hình máy chủ gửi email
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Máy chủ SMTP của Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'ngothikimhan.2004@gmail.com';  // Địa chỉ Gmail của bạn
        $mail->Password = 'wyxe sekg jfjt slcq';  // Mật khẩu ứng dụng 
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;  // Cấu hình mã hóa
        $mail->Port = 587;  // Cổng gửi email của Gmail

        // Thiết lập người gửi và người nhận
        $mail->setFrom('ngothikimhan.2004@gmail.com', 'Happy Trips Tour');  // Địa chỉ email người gửi
        $mail->addAddress($to);  // Địa chỉ email người nhận
        $mail->addReplyto('ngothikimhan.2004@gmail.com', 'Happy Trips Tour');  // Địa chỉ email người nhận

        // Cấu hình nội dung email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $content;

        // // Gửi email
        // $mail->send();
        // echo 'Email đã được gửi thành công!';
        if ($mail->send()) {
            return true; // Trả về true nếu gửi thành công
        } else {
            return false; // Trả về false nếu không gửi được
        }

    } catch (Exception $e) {
        echo "Email gửi không thành công. Mailer Error: {$mail->ErrorInfo}";
    }
}

// // Hàm để lấy dữ liệu flash
// function getFlashData($key) {
//     if (isset($_SESSION[$key])) {
//         $data = $_SESSION[$key];
//         unset($_SESSION[$key]); // Xóa dữ liệu flash sau khi đã lấy
//         return $data;
//     }
//     return null;
// }

// // Hàm để set dữ liệu flash
// function setFlashData($key, $value) {
//     $_SESSION[$key] = $value;
// }

// // Hàm kiểm tra xem yêu cầu có phải POST không
// function isPost() {
//     return $_SERVER['REQUEST_METHOD'] === 'POST';
// }

// // Hàm lọc và làm sạch dữ liệu đầu vào(email)
// function filter() {
//     return [
//         'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)
//     ];
// }

// // Hàm lọc mật khẩu
// function filter1() {
//     return [
//         'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
//         'password' => filter_input(INPUT_POST, 'password', FILTER_DEFAULT), // Không lọc mật khẩu
//         'confirmpassword' => filter_input(INPUT_POST, 'confirmpassword', FILTER_DEFAULT)
//     ];
// }


// // Hàm hiển thị thông báo
// function getMsg($msg, $msg_type) {
//     $class = $msg_type === 'danger' ? 'alert-danger' : 'alert-success';
//     echo "<div class='alert $class' role='alert'>$msg</div>";
// }

// function oneraw($sql) {
//     global $conn; // Sử dụng kết nối toàn cục

//     // Kiểm tra xem kết nối có hợp lệ không
//     if ($conn === null) {
//         die("Database connection is not established.");
//     }

//     // Thực thi câu truy vấn
//     $result = $conn->query($sql);

//     // Kiểm tra xem truy vấn có trả về kết quả không
//     if ($result && $result->num_rows > 0) {
//         // Lấy một dòng đầu tiên trong kết quả
//         return $result->fetch_assoc(); // Trả về một mảng kết hợp của dòng đầu tiên
//     } else {
//         return null; // Trả về null nếu không có kết quả
//     }
// }







// function update($table, $data, $condition) {
//     global $conn;

//     // Xây dựng chuỗi `SET` từ mảng `$data`
//     $set = [];
//     foreach ($data as $key => $value) {
//         $set[] = "$key = '" . $conn->real_escape_string($value) . "'";
//     }
//     $setString = implode(", ", $set);

//     // Xây dựng câu lệnh SQL
//     $sql = "UPDATE $table SET $setString WHERE $condition";

//     // Thực thi truy vấn
//     return $conn->query($sql);
// } 







// function update($table, $data, $condition) {
//     global $conn; // Kết nối DB
//     $setClause = [];
//     foreach ($data as $key => $value) {
//         $setClause[] = "$key = '" . mysqli_real_escape_string($conn, $value) . "'";
//     }

//     $setClause = implode(', ', $setClause);
//     $sql = "UPDATE $table SET $setClause WHERE $condition";

//     $result = mysqli_query($conn, $sql);

//     // Kiểm tra kết quả
//     if ($result) {
//         // Kiểm tra nếu có dòng nào thực sự bị thay đổi
//         return mysqli_affected_rows($conn) >= 0;
//     } else {
//         return false; // Nếu lỗi
//     }
// }


// // Hàm để hiển thị lỗi cho từng trường
// function form_error($field, $before = '', $after = '', $errors = []) {
//     if (isset($errors[$field])) {
//         $error_messages = $errors[$field];
//         // In ra lỗi nếu có
//         return $before . implode('<br>', $error_messages) . $after;
//     }
//     return '';
// }

// function redirect($url){
//     header('Location: ' . $url);
//     exit();
// }

?>
