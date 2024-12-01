
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
      alert("Yêu cầu đã được gửi. Chúng tôi sẽ liên hệ với bạn sớm nhất!");
      requestFormModal.style.display = "none"; 
    });
});

