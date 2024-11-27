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
    <link rel="stylesheet" href="../styles/update_info.css">

</head>
<body>
    <div class="mt-5">
        <div class="container shadow-lg">
            <h5 class="title-frm mb-0">Personal Information</h5>
            <div class="card-body">
                <form action="update_info-back.php" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label"><i class="bi bi-person-fill"></i> Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Enter your full name" value="<?php echo $user['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill"></i> Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" value="<?php echo $user['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><i class="bi bi-telephone-fill"></i> Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" value="<?php echo $user['phone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><i class="bi bi-house-door-fill"></i> Address</label>
                        <input type="tel" class="form-control" id="address" placeholder="Enter your address" value="<?php echo $user['address'] ?>">
                    </div>
                    <div class="btn_update d-flex justify-content-between">
                        <button onclick="window.location.href='changePassword.php'" class="btn btn-warning"><i class="bi bi-key-fill"></i> Change Password</button>
                        <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i>Update</button>
                        <button onclick="window.location.href='log_out.php'" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i>Log Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>