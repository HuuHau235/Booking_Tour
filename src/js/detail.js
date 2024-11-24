
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

// Lắng nghe sự kiện DOMContentLoaded để đảm bảo trang được tải xong
document.addEventListener("DOMContentLoaded", () => {
    // Lấy tất cả các nút "Giữ chỗ ngay"
    const holdButtons = document.querySelectorAll(".btn-hold");

    // Lặp qua từng nút và thêm sự kiện click
    holdButtons.forEach((button) => {
      button.addEventListener("click", () => {
        // Thay đổi nội dung nút thành "Đã giữ chỗ"
        button.textContent = "Đã giữ chỗ";
        // Thay đổi kiểu dáng nút
        button.classList.remove("btn-outline-primary");
        button.classList.add("btn-success");
        // Vô hiệu hóa nút
        button.disabled = true;
      });
    });
  });

document.addEventListener("DOMContentLoaded", () => {
    const reviewForm = document.getElementById("reviewForm");
    const reviewList = document.getElementById("reviewList");

    const tourId = 1; // Thay giá trị bằng tour_id động (ví dụ: từ URL hoặc thuộc tính dữ liệu)

    // Hàm tải danh sách đánh giá
    function loadReviews() {
        fetch(`review.php?tour_id=${tourId}`)
            .then((response) => response.json())
            .then((reviews) => {
                reviewList.innerHTML = ""; // Xóa danh sách cũ
                reviews.forEach((review) => {
                    const li = document.createElement("li");
                    li.className = "list-group-item";
                    li.innerHTML = `
                        <strong>${review.username}</strong> 
                        <span class="badge bg-success">${review.rating}★</span>
                        <p>${review.comment}</p>
                    `;
                    reviewList.appendChild(li);
                });
            })
            .catch((error) => console.error("Error loading reviews:", error));
    }

    // Gửi đánh giá mới
    reviewForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const userId = 1; // Thay bằng `user_id` thực tế từ session hoặc context

        const data = {
            tour_id: tourId,
            user_id: userId,
            rating: parseInt(document.getElementById("reviewRating").value),
            comment: document.getElementById("reviewContent").value,
        };

        fetch("review.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                if (response.ok) {
                    reviewForm.reset(); // Xóa form
                    loadReviews(); // Tải lại danh sách đánh giá
                } else {
                    return response.json().then((data) => {
                        alert(data.error || "Failed to submit review");
                    });
                }
            })
            .catch((error) => console.error("Error submitting review:", error));
    });

    // Tải danh sách đánh giá ngay khi trang được tải
    loadReviews();
});

// document.getElementById('reviewForm').addEventListener('submit', function (e) {
//     e.preventDefault(); // Ngăn trình duyệt refresh trang

//     // Lấy dữ liệu từ form
//     const tourId = 1; // ID tour, có thể lấy từ URL hoặc biến động
//     const userId = 123; // ID người dùng đăng nhập
//     const reviewName = document.getElementById('reviewName').value;
//     const reviewRating = document.getElementById('reviewRating').value;
//     const reviewContent = document.getElementById('reviewContent').value;

//     // Gửi request đến backend
//     fetch('path/to/review_handler.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: new URLSearchParams({
//             tour_id: tourId,
//             user_id: userId,
//             rating: reviewRating,
//             comment: reviewContent,
//         }),
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.status === 'success') {
//                 alert(data.message);
//                 // Hiển thị đánh giá mới lên giao diện
//                 const reviewList = document.getElementById('reviewList');
//                 const newReview = document.createElement('li');
//                 newReview.classList.add('list-group-item');
//                 newReview.innerHTML = `
//                     <strong>${reviewName}</strong> (${reviewRating} ★)<br>
//                     ${reviewContent}
//                 `;
//                 reviewList.appendChild(newReview);
//             } else {
//                 alert(data.message);
//             }
//         })
//         .catch(error => console.error('Lỗi:', error));
// });
// document.addEventListener('DOMContentLoaded', function () {
//     const tourId = 1; // ID của tour
//     fetch(`path/to/get_reviews.php?tour_id=${tourId}`)
//         .then(response => response.json())
//         .then(data => {
//             const reviewList = document.getElementById('reviewList');
//             data.forEach(review => {
//                 const reviewItem = document.createElement('li');
//                 reviewItem.classList.add('list-group-item');
//                 reviewItem.innerHTML = `
//                     <strong>${review.username}</strong> (${review.rating} ★)<br>
//                     ${review.comment}
//                 `;
//                 reviewList.appendChild(reviewItem);
//             });
//         })
//         .catch(error => console.error('Lỗi:', error));
// });
