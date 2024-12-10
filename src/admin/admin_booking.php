<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
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
        .btn-warning, .btn-danger {
            margin-left: 5px;
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
            <h1>Manage Bookings</h1>

            <!-- Search and Filter -->
            <div class="d-flex mb-3">
                <input type="text" id="searchBooking" class="form-control me-2" placeholder="Search by customer name...">
                <select id="filterStatus" class="form-select me-2">
                    <option value="">All statuses</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Booking Table -->
            <div class="table-responsive">
                <table class="table table-striped" id="bookingTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Tour</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>John Doe</td>
                            <td>Hanoi - Halong Bay</td>
                            <td>2024-11-20</td>
                            <td>
                                <select class="form-select" onchange="updateBookingStatus(this, 101)">
                                    <option value="Confirmed" selected>Confirmed</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewDetails(101)">
                                    <i class="bi bi-info-circle"></i> Details
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Booking Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Booking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailsContent">
                    <!-- Details content will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search and filter bookings
        document.getElementById('searchBooking').addEventListener('input', filterBookings);
        document.getElementById('filterStatus').addEventListener('change', filterBookings);

        function filterBookings() {
            const searchValue = document.getElementById('searchBooking').value.toLowerCase();
            const statusValue = document.getElementById('filterStatus').value;
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const name = row.children[1].innerText.toLowerCase();
                const status = row.children[4].querySelector('select').value;

                if (
                    (name.includes(searchValue) || searchValue === '') &&
                    (status === statusValue || statusValue === '')
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function updateBookingStatus(selectElement, bookingId) {
            const newStatus = selectElement.value;
            alert(`Booking ${bookingId} status has been updated to "${newStatus}"`);
        }

        function viewDetails(bookingId) {
            const bookingDetails = {
                101: { customer: 'John Doe', tour: 'Hanoi - Halong Bay', date: '2024-11-20', status: 'Confirmed' },
            };

            const details = bookingDetails[bookingId];
            const detailsHTML = `
                <p><strong>Customer Name:</strong> ${details.customer}</p>
                <p><strong>Tour:</strong> ${details.tour}</p>
                <p><strong>Booking Date:</strong> ${details.date}</p>
                <p><strong>Status:</strong> ${details.status}</p>
            `;

            document.getElementById('detailsContent').innerHTML = detailsHTML;
            const detailsModal = new bootstrap.Modal(document.getElementById('detailsModal'));
            detailsModal.show();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
