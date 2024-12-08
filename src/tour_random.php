<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/tour_random.css">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Special Tour</h3>
                        <form action="process_random.php" method="POST">
                            <!-- Money input -->
                            <div class="mb-3">
                                <label for="money" class="form-label"><i class="bi bi-currency-exchange"></i>Tour Price (VND)</label>
                                <input type="number" min="1" class="form-control" id="money" name="money" placeholder="Enter your desired amount" required>
                            </div>
                            <!-- Duration input -->
                            <div class="mb-3">
                                <label for="duration" class="form-label"><i class="bi bi-calendar-check-fill"></i> Duration (Days)</label>
                                <input type="number" min="1" max="8" class="form-control" id="duration" name="duration" placeholder="Enter the number of days" required>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-custom w-100">Find Tour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>
