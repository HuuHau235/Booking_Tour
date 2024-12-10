<?php
// Database connection
session_start();
include('config.php');

// Check database connection
if (!isset($conn) || $conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle tour deletion
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $tourId = intval($_GET['delete_id']);
    $sql = "DELETE FROM Tour WHERE tour_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tourId);
    if ($stmt->execute()) {
        header("Location: admin_tours.php");
        exit;
    } else {
        echo "<script>alert('Error deleting tour!');</script>";
    }
}

// Handle add/update tour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Invalid request.');
    }

    $tourId = $_POST['tour_id'] ?? null;
    $tourName = trim($_POST['tourName']);
    $tourDescription = trim($_POST['tourDescription']);
    $tourPrice = $_POST['tourPrice'];
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];
    $type = $_POST['type'];

    // Validate input
    if (empty($tourName) || empty($tourPrice) || !is_numeric($tourPrice) || empty($startDate) || empty($duration) || empty($type)) {
        echo "<script>alert('Please provide complete and valid information!');</script>";
    } else {
        if ($tourId) {
            // Update tour
            $sql = "UPDATE Tour SET name = ?, description = ?, price = ?, start_date = ?, duration = ?, type = ? WHERE tour_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsdsi", $tourName, $tourDescription, $tourPrice, $startDate, $duration, $type, $tourId);
        } else {
            // Add new tour
            $sql = "INSERT INTO Tour (name, description, price, start_date, duration, type) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsds", $tourName, $tourDescription, $tourPrice, $startDate, $duration, $type);
        }

        if ($stmt->execute()) {
            header("Location: admin_tours.php");
            exit;
        } else {
            echo "<script>alert('Error saving tour!');</script>";
        }
    }
}

// Fetch tours
$sql = "SELECT * FROM Tour";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            bottom: 0;
            padding: 20px 15px;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        footer {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<nav class="sidebar">
    <h4><i class="bi bi-gear-fill"></i> Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-3"><a href="admin_tours.php" class="nav-link"><i class="bi bi-card-list"></i> Manage Tours</a></li>
        <li class="nav-item mb-3"><a href="admin_booking.php" class="nav-link"><i class="bi bi-book"></i> Manage Bookings</a></li>
        <li class="nav-item mb-3"><a href="admin_customers.php" class="nav-link"><i class="bi bi-person"></i> Manage Customers</a></li>
        <li class="nav-item mb-3"><a href="admin_invoices.php" class="nav-link"><i class="bi bi-receipt"></i> Payments & Invoices</a></li>
        <li class="nav-item mb-3"><a href="admin_feedback.php" class="nav-link"><i class="bi bi-chat-left-text"></i> Feedback</a></li>
    </ul>
</nav>

<div class="main-content">
    <h1>Manage Tours</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tourModal">Add Tour</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tour Name</th>
                <th>Description</th>
                <th>Price (VND)</th>
                <th>Start Date</th>
                <th>Duration</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['tour_id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td><?= number_format($row['price'], 0, ',', '.') ?></td>
                        <td><?= $row['start_date'] ?></td>
                        <td><?= $row['duration'] ?> days</td>
                        <td><?= ucfirst($row['type']) ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#tourModal" 
                                data-id="<?= $row['tour_id'] ?>" data-name="<?= htmlspecialchars($row['name']) ?>" 
                                data-description="<?= htmlspecialchars($row['description']) ?>" data-price="<?= $row['price'] ?>" 
                                data-start="<?= $row['start_date'] ?>" data-duration="<?= $row['duration'] ?>" 
                                data-type="<?= $row['type'] ?>">Edit</button>
                            <a href="?delete_id=<?= $row['tour_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No tours found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Add/Edit Tour Modal -->
<div class="modal fade" id="tourModal" tabindex="-1" aria-labelledby="tourModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="tourModalLabel">Add/Edit Tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="tour_id" id="tour_id">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                    <div class="mb-3">
                        <label for="tourName" class="form-label">Tour Name</label>
                        <input type="text" class="form-control" id="tourName" name="tourName" required>
                    </div>

                    <div class="mb-3">
                        <label for="tourDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="tourDescription" name="tourDescription"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tourPrice" class="form-label">Price (VND)</label>
                        <input type="number" class="form-control" id="tourPrice" name="tourPrice" required>
                    </div>

                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (days)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tour Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="adventure">Adventure</option>
                            <option value="relaxation">Relaxation</option>
                            <option value="exploration">Exploration</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const tourModal = document.getElementById('tourModal');
    tourModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const tourId = button.getAttribute('data-id') || '';
        const tourName = button.getAttribute('data-name') || '';
        const tourDescription = button.getAttribute('data-description') || '';
        const tourPrice = button.getAttribute('data-price') || '';
        const startDate = button.getAttribute('data-start') || '';
        const duration = button.getAttribute('data-duration') || '';
        const type = button.getAttribute('data-type') || '';

        document.getElementById('tour_id').value = tourId;
        document.getElementById('tourName').value = tourName;
        document.getElementById('tourDescription').value = tourDescription;
        document.getElementById('tourPrice').value = tourPrice;
        document.getElementById('startDate').value = startDate;
        document.getElementById('duration').value = duration;
        document.getElementById('type').value = type;
    });
</script>
</body>
</html>
