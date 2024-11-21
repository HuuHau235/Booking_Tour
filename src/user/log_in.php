<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link font chữ Tinos (website dùng) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- css -->
     <link rel="stylesheet" href="../styles/log_in.css">
</head>
<body>
    <div class="container">
        <!-- Left Text Section -->
        <div class="text-section">
            <h1>EXPLORE NEW THINGS WITH HAPPY TRIPS</h1>
            <p>&copy; HappyTrips.com.vn © 2023. All Rights Reserved.</p>
        </div>


        <!-- Login Form -->
        <div class="login-form shadow">
            <div class="text-center mb-4">
                <img src="../assets/logo/Logo.jpg" alt="Logo" class="img-fluid mb-2 img_logo">
                <h2 class="title-frm">LOGIN TO YOUR ACCOUNT</h2>

            <!-- Google Login -->
            <!-- <div class="btn google-btn">
                <i class=" icon_gg fa-brands fa-google"></i>
                <div class="btn_gg">Login with Google</div>
            </div>
            <p class="divider">or</p> -->


            <!-- Email & Password Form -->
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <input type="checkbox" id="rememberMe" class="form-check-input">
                        <label for="rememberMe" class="form-check-label">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="btn login-btn w-100">LOG IN</button>
            </form>


            <!-- Create Account -->
            <p class="text-center mt-3 create-account">Don't have an account? <a href="#">Create new account</a></p>
        </div>
    </div>


    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
