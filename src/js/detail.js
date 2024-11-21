document.getElementById('reviewForm')?.addEventListener('submit', function (event) {
    event.preventDefault(); // Ngăn không reload trang khi gửi form

    // Lấy thông tin từ form
    const name = document.getElementById('reviewName').value;
    const content = document.getElementById('reviewContent').value;

    // Kiểm tra nếu người dùng chưa nhập
    if (!name || !content) {
        alert('Vui lòng nhập đầy đủ thông tin!');
        return;
    }

    // Tạo phần tử đánh giá mới
    const reviewItem = document.createElement('li');
    reviewItem.className = 'list-group-item';
    reviewItem.innerHTML = `<strong>${name}:</strong> ${content}`;

    // Thêm đánh giá vào danh sách
    document.getElementById('reviewList').appendChild(reviewItem);

    // Reset form sau khi thêm đánh giá
    document.getElementById('reviewForm').reset();
});


document.addEventListener("DOMContentLoaded", () => {
    const openFormButton = document.getElementById("openForm");
    const closeFormButton = document.getElementById("closeForm");
    const requestFormModal = document.getElementById("requestForm");

    // Mở form khi nhấn nút "Gửi yêu cầu"
    openFormButton.addEventListener("click", () => {
      requestFormModal.style.display = "flex";
    });

    // Đóng form khi nhấn nút "Đóng"
    closeFormButton.addEventListener("click", () => {
      requestFormModal.style.display = "none";
    });

    // Gửi form
    document.getElementById("formRequest").addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Yêu cầu đã được gửi. Chúng tôi sẽ liên hệ với bạn sớm nhất!");
      requestFormModal.style.display = "none"; // Đóng form sau khi gửi
    });
});

