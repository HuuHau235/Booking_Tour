<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tour Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons (Optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .content {
            margin-left: 250px;
        }

        .filter-section {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Main Content -->
        <div class="content p-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Manage Tours</h2>
                <div class="d-flex align-items-center">
                    <input type="search" class="form-control me-2" placeholder="Search...">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section mb-4">
                <form class="row">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-select">
                            <option selected>All</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="form-label">Price Range</label>
                        <input type="text" id="price" class="form-control" placeholder="e.g. 100-500">
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" class="form-control">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Filter</button>
                    </div>
                </form>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tour Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Beach Paradise</td>
                            <td>$300</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2024-12-10</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Mountain Adventure</td>
                            <td>$500</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td>2024-11-20</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
