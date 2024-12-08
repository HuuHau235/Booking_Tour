document.addEventListener('DOMContentLoaded', function () {
    // XỬ LÝ KHI CLICK VÀO ICON_USER TRÊN HEADER
    const iconUser = document.getElementById('icon_user');
    
    if (iconUser) {
      iconUser.addEventListener('click', function () {
        // Gửi yêu cầu kiểm tra trạng thái đăng nhập
        fetch('./user/check_login_status.php')
          .then(response => response.json())
          .then(data => {
            if (data.logged_in) {
              // Nếu đã đăng nhập, điều hướng đến trang thay đổi thông tin
              window.location.href = './user/update_info.php';
            } else {
              // Nếu chưa đăng nhập, yêu cầu đăng nhập
              if (confirm('Bạn chưa đăng nhập. Vui lòng đăng nhập vào tài khoản của bạn. Nhấn "OK" để tới trang đăng nhập.')) {
                window.location.href = './user/log_in.php';
              }
            }
          })
          .catch(error => {
            console.error('Lỗi khi gọi API:', error);
          });
      });
    }
  });