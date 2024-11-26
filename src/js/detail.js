
document.addEventListener("DOMContentLoaded", () => {
    const openFormButton = document.getElementById("openForm");
    const closeFormButton = document.getElementById("closeForm");
    const requestFormModal = document.getElementById("requestForm");

    openFormButton.addEventListener("click", () => {
      requestFormModal.style.display = "flex";
    });

    closeFormButton.addEventListener("click", () => {
      requestFormModal.style.display = "none";
    });

    document.getElementById("formRequest").addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Yêu cầu đã được gửi. Chúng tôi sẽ liên hệ với bạn sớm nhất!");
      requestFormModal.style.display = "none"; 
    });
});
document.getElementById('formRequest').addEventListener('submit', function (e) {
    e.preventDefault(); // Ngăn gửi form mặc định

    // Lấy dữ liệu từ form
    const adults = parseInt(document.getElementById('adults').value) || 0;
    const children = parseInt(document.getElementById('children').value) || 0;
    const infants = parseInt(document.getElementById('infants').value) || 0;

    const data = {
        tourId: document.getElementById('tourId').value,
        userId: document.getElementById('userId').value,
        bookingDate: new Date().toISOString().split('T')[0], // Lấy ngày hiện tại
        travelDate: document.getElementById('startDate').value,
        numPeople: adults + children + infants,
        status: 'pending' // Mặc định là 'pending'
    };

    // Gửi dữ liệu đến máy chủ
    fetch('process_booking.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Your booking request has been sent successfully!');
            } else {
                alert('Failed to send booking request. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });
});

document.addEventListener("DOMContentLoaded", () => {
    const holdButtons = document.querySelectorAll(".btn-hold");

    holdButtons.forEach((button) => {
      button.addEventListener("click", () => {
        button.textContent = "Seat reserved";
        button.classList.remove("btn-outline-primary");
        button.classList.add("btn-success");
        button.disabled = true;
      });
    });
  });

document.addEventListener("DOMContentLoaded", () => {
    const reviewForm = document.getElementById("reviewForm");
    const reviewList = document.getElementById("reviewList");

    const tourId = 1; 

  
    function loadReviews() {
        fetch(`review.php?tour_id=${tourId}`)
            .then((response) => response.json())
            .then((reviews) => {
                reviewList.innerHTML = ""; 
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

    reviewForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const userId = 1; 

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
                    reviewForm.reset(); 
                    loadReviews(); 
                } else {
                    return response.json().then((data) => {
                        alert(data.error || "Failed to submit review");
                    });
                }
            })
            .catch((error) => console.error("Error submitting review:", error));
    });

    loadReviews();
});
