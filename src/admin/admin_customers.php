<?php
require_once('../../MySQL/Createdatabase.php'); // Database connection

// Query customer data
$sql = "SELECT * FROM User";
$res = mysqli_query($conn, $sql);

if (!$res) {
    echo "Error while querying the database.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
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
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h4><i class="bi bi-gear-fill"></i> Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a href="admin_tours.php" class="nav-link"><i class="bi bi-card-list"></i> Manage Tours</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_booking.php" class="nav-link"><i class="bi bi-book"></i> Manage Bookings</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_customers.php" class="nav-link"><i class="bi bi-person"></i> Manage Customers</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_invoices.php" class="nav-link"><i class="bi bi-receipt"></i> Payments & Invoices</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="admin_feedback.php" class="nav-link"><i class="bi bi-chat-left-text"></i> Feedback</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Customer Management</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Join Date</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td>{$row['user_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['created_at']}</td>
                                <td>" . ($row['role'] == 1 ? "User" : "Admin") . "</td>
                                <td>
                                    <button class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#viewCustomerModal' 
                                    data-customer-name='{$row['name']}' 
                                    data-customer-email='{$row['email']}' 
                                    data-customer-phone='{$row['phone']}'
                                    data-customer-address='{$row['address']}' 
                                    data-customer-date='{$row['created_at']}'>View</button>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: View Customer Information -->
    <div class="modal fade" id="viewCustomerModal" tabindex="-1" aria-labelledby="viewCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewCustomerModalLabel">Customer Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="customerName"></span></p>
                    <p><strong>Email:</strong> <span id="customerEmail"></span></p>
                    <p><strong>Phone:</strong> <span id="customerPhone"></span></p>
                    <p><strong>Address:</strong> <span id="customerAddress"></span></p>
                    <p><strong>Join Date:</strong> <span id="customerDate"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Lock/Unlock Customer Account -->
    <div class="modal fade" id="confirmLockModal" tabindex="-1" aria-labelledby="confirmLockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmLockModalLabel">Confirm Lock/Unlock Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to change the account status for this customer?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="confirmLockBtn" class="btn btn-warning">Proceed</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle viewing customer details
        const viewCustomerModal = document.getElementById('viewCustomerModal');
        viewCustomerModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const customerName = button.getAttribute('data-customer-name');
            const customerEmail = button.getAttribute('data-customer-email');
            const customerPhone = button.getAttribute('data-customer-phone');
            const customerAddress = button.getAttribute('data-customer-address');
            const customerDate = button.getAttribute('data-customer-date');

            viewCustomerModal.querySelector('#customerName').textContent = customerName;
            viewCustomerModal.querySelector('#customerEmail').textContent = customerEmail;
            viewCustomerModal.querySelector('#customerPhone').textContent = customerPhone;
            viewCustomerModal.querySelector('#customerAddress').textContent = customerAddress;
            viewCustomerModal.querySelector('#customerDate').textContent = customerDate;
        });

        // Handle Lock/Unlock Customer Account
        const confirmLockModal = document.getElementById('confirmLockModal');
        confirmLockModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-customer-id');
            const lockBtn = confirmLockModal.querySelector('#confirmLockBtn');
            lockBtn.href = `lock_unlock_customer.php?id=${userId}`; // Link to lock/unlock page
        });
    </script>
</body>
</html>
