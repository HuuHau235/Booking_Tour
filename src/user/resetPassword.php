<?php
session_start();
require_once('../../MySQL/Createdatabase.php');
require_once('../model/function.php');

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

// Hàm kiểm tra xem yêu cầu có phải POST không
function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


// Hàm lọc mật khẩu
function filter() {
    return [
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'password', FILTER_DEFAULT), // Không lọc mật khẩu
        'confirmpassword' => filter_input(INPUT_POST, 'confirmpassword', FILTER_DEFAULT)
    ];
}

// Hàm hiển thị thông báo
function getMsg($msg, $msg_type) {
    $class = $msg_type === 'danger' ? 'alert-danger' : 'alert-success';
    echo "<div class='alert $class' role='alert'>$msg</div>";
}

function oneraw($sql) {
    global $conn; // Sử dụng kết nối toàn cục

    // Kiểm tra xem kết nối có hợp lệ không
    if ($conn === null) {
        die("Database connection is not established.");
    }

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra xem truy vấn có trả về kết quả không
    if ($result && $result->num_rows > 0) {
        // Lấy một dòng đầu tiên trong kết quả
        return $result->fetch_assoc(); // Trả về một mảng kết hợp của dòng đầu tiên
    } else {
        return null; // Trả về null nếu không có kết quả
    }
}

function update($table, $data, $condition) {
    global $conn; // Kết nối DB
    $setClause = [];
    foreach ($data as $key => $value) {
        $setClause[] = "$key = '" . mysqli_real_escape_string($conn, $value) . "'";
    }

    $setClause = implode(', ', $setClause);
    $sql = "UPDATE $table SET $setClause WHERE $condition";

    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả
    if ($result) {
        // Kiểm tra nếu có dòng nào thực sự bị thay đổi
        return mysqli_affected_rows($conn) >= 0;
    } else {
        return false; // Nếu lỗi
    }
}


// Hàm để hiển thị lỗi cho từng trường
function form_error($field, $before = '', $after = '', $errors = []) {
    if (isset($errors[$field])) {
        $error_messages = $errors[$field];
        // In ra lỗi nếu có
        return $before . implode('<br>', $error_messages) . $after;
    }
    return '';
}

function redirect($url){
    header('Location: ' . $url);
    exit();
} 

$smg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$errors = getFlashData('errors');

// Lấy token từ POST (sau khi submit) hoặc GET (khi truy cập ban đầu)
$token = isset($_POST['token']) ? trim($_POST['token']) : (isset($_GET['token']) ? trim($_GET['token']) : null);
if (!empty($token)) {
    $tokenQuery = oneraw("SELECT user_id, name, email FROM User WHERE forgot_token = '$token'");
    if (!empty($tokenQuery)) {
        $userId = $tokenQuery['user_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filterAll = filter(); // Lọc dữ liệu từ form
            $errors = [];

            // Kiểm tra mật khẩu
            if (empty($filterAll['password'])) {
                $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
            } else if (strlen($filterAll['password']) < 4) {
                $errors['password']['min'] = 'Mật khẩu phải lớn hơn hoặc bằng 4 ký tự';
            }

            // Kiểm tra xác nhận mật khẩu
            if (empty($filterAll['confirmpassword'])) {
                $errors['confirmpassword']['required'] = 'Bạn phải nhập lại mật khẩu';
            } else if ($filterAll['password'] != $filterAll['confirmpassword']) {
                $errors['confirmpassword']['match'] = 'Mật khẩu bạn nhập lại không khớp';
            }

            // Nếu có lỗi, hiển thị thông báo
            if (!empty($errors)) {
                setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
                setFlashData('msg_type', 'danger');
                setFlashData('errors', $errors);
                redirect('?module=auth&action=resetPassword&token=' . urlencode($token));
                exit();
            }else{
                // Nếu không có lỗi, cập nhật mật khẩu
                $passwordHash = md5($filterAll['password']);
                $dataUpdate = [
                    'password' => $passwordHash,
                    'forgot_token' => null
                ];

                $updateStatus = update('User', $dataUpdate, "user_id = $userId");
                echo $updateStatus;

                if ($updateStatus) {
                    setFlashData('msg', 'Thay đổi mật khẩu thành công. Hãy đăng nhập!');
                    setFlashData('msg_type', 'success');
                    header("location: log_in.php");
                    exit();
                } else {
                    setFlashData('msg', 'Lỗi hệ thống. Vui lòng thử lại sau.');
                    setFlashData('msg_type', 'danger');
                    redirect('?module=auth&action=resetPassword&token=' . urlencode($token));
                    exit();
                }
            }
        }
    } else {
        setFlashData('msg', 'Liên kết không tồn tại hoặc đã hết hạn!');
        setFlashData('msg_type', 'danger');
        // redirect('?module=auth&action=resetPassword');
        exit();
    }
} else {
    setFlashData('msg', 'Liên kết không tồn tại hoặc đã hết hạn!');
    setFlashData('msg_type', 'danger');
    // redirect('?module=auth&action=resetPassword');
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
            <form action="resetPassword.php" method="POST">
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
