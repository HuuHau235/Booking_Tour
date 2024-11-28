<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Tour Booking</title>
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
            background-color: #5EA1A3;
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

        /* .content {
            margin-left: 250px;
        } */

        .filter-section {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
    <div class="d-flex">
        <!-- Main Content -->
        <div class="content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>List Tours</h2>
                <div class="d-flex align-items-center">
                    <input type="search" class="form-control me-2" placeholder="Search...">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>

            <!-- Filter Section -->
                <form class="row">
                    <div class="col-md-3">
                        <label for="tour" class="form-label">Tour</label>
                        <select id="tour" class="form-select">
                            <option selected>Hà Nội</option>
                            <option>Đà Nẵng</option>
                            <option>TP. Hồ Chí Minh</option>
                            <option>Hải Phòng</option>
                            <option>Đà Lạt</option>
                            <option>Hà Giang</option>
                            <option>Nha Trang</option>
                            <option>Quảng Bình</option>
                            <option>Quy Nhơn</option>
                            <option>SaPa</option>
                            <option>Bắc Giang</option>
                            <option>Hạ Long</option>
                            <option>Hội An</option>
                            <option>Lý Sơn</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="form-label">Price Range</label>
                        <input type="text" id="price" class="form-control" placeholder="e.g. 100-500">
                    </div>
                    <div class="col-md-3">
                        <label for="type" class="form-label">Type</label>
                        <select id="type" class="form-select">
                            <option selected>Exploration</option>
                            <option>Relaxation</option>
                            <option>Adventure</option>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Filter</button>
                    </div>
                </form>
        </div>
    </div>      
    <div>
        <p>sưqdfgfytfjrj</p>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
