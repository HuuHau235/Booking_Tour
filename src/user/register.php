<?php require_once('../../MySQL/Createdatabase.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link font chữ Tinos (website dùng) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="form-container">
            <img src="../assets/logo/Logo.jpg" alt="Logo" class="img-fluid mb-2 img_logo">
            <h2 class="title-frm text-center mb-4">Register Your Account</h2>
            <!-- Form -->
            <form action="register-back.php" method="POST" name="myForm" onsubmit="return validateForm();">
                <div class="mb-3">
                    <label for="username" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="username" name="fullname" placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength ="9" maxlength="11" 
                    class="form-control" id="phone" name="phonenumber" placeholder="Enter your phone number" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmpassword" placeholder="Re-enter your password" tabindex="6" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom" name="submit">Register</button>
                </div>
            </form>
            <div class="text-center mt-3">
                Already have an account? <a href="log_in.php" class="text-primary">Log in here</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
