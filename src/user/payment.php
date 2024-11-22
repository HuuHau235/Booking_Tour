<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trips</title>
    <link rel="icon" type="image/png" href="../assets/logo/Logo.jpg">
    <!-- link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/payment.css">
</head>
<body>
    <!-- Header -->
    <header class="payment-header">
        <h1><i class="bi bi-airplane-engines"></i> Tour Payment</h1>
        <p>Complete your information to confirm your tour booking</p>
    </header>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Tour Details -->
            <div class="col_detail col-lg-6 mb-4">
                <div class="card card_left">
                    <img src="../assets/images/SaPa.jpg" alt="Tour Image" class="tour-image">
                    <div class="card-header">
                        Tour Detail
                    </div>
                    <div class="card-body">
                        <p><strong><i class="bi bi-bookmark-heart-fill"></i> Tour name: </strong> Travel to Da Lat 3 days 2 nights</p>
                        <p><strong><i class="bi bi-calendar2-week-fill"></i> Start day: </strong> 25/12/2024</p>
                        <p><strong><i class="bi bi-people-fill"></i>Quantity: </strong> 2 people</p>
                        <p><strong><i class="bi bi-coin"></i> Total price: </strong> 5,000,000 VND</p>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Payment Information
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                            </div>
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Methods</label>
                                <select class="form-select" id="paymentMethod">
                                    <option class="option_select" value="cash">Cash payment</option>
                                    <option class="option_select" value="bank-transfer">Bank transfer</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-check-circle"></i> Confirm Payment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>