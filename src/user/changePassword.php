<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS (Optional nếu cần hiệu ứng)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/changePassword.css">

</head>
<body>
    <div class="mt-5">
        <div class="container shadow-lg">
            <h5 class="title-frm mb-0">Change Password</h5>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="current-password" class="form-label"><i class="bi bi-key"></i>Old Password</label>
                        <input type="password" class="form-control" id="current-password" placeholder="Enter your old password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label"><i class="bi bi-lock-fill"></i> New Password</label>
                        <input type="password" class="form-control" id="new-password" placeholder="Enter your new password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-new-password" class="form-label"><i class="bi bi-lock-fill"></i> Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm-new-password" placeholder="Re-enter your new password">
                    </div>
                    <div class="btn-changePassword d-flex justify-content-between">
                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i> Update</button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>