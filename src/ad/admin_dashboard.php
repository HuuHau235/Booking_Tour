<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Tour Booking</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css"> <!-- Optional: External Styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
        <div class="position-sticky">
          <h4 class="text-white py-3 text-center">Admin Dashboard</h4>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="#reviews"><i class="bi bi-chat-dots me-2"></i>Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#destinations"><i class="bi bi-geo-alt me-2"></i>Destinations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#booked-tours"><i class="bi bi-calendar-check me-2"></i>Booked Tours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#manage-tours"><i class="bi bi-gear me-2"></i>Manage Tours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#create-tour"><i class="bi bi-plus-circle me-2"></i>Create Tour</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#users"><i class="bi bi-people me-2"></i>Users</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <!-- Reviews Section -->
        <section id="reviews">
          <h2>Reviews</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tour Name</th>
                  <th>User</th>
                  <th>Review</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Beach Escape</td>
                  <td>John Doe</td>
                  <td>Excellent experience!</td>
                  <td>⭐⭐⭐⭐⭐</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Mountain Adventure</td>
                  <td>Jane Smith</td>
                  <td>Loved it!</td>
                  <td>⭐⭐⭐⭐</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <!-- Destinations Section -->
        <section id="destinations" class="mt-5">
          <h2>Destinations</h2>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Beach">
                <div class="card-body">
                  <h5 class="card-title">Beach Paradise</h5>
                  <p class="card-text">A beautiful seaside escape.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Mountain">
                <div class="card-body">
                  <h5 class="card-title">Mountain Retreat</h5>
                  <p class="card-text">Experience the serene mountains.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Booked Tours Section -->
        <section id="booked-tours" class="mt-5">
          <h2>Booked Tours</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tour Name</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Beach Paradise</td>
                  <td>John Doe</td>
                  <td>2024-11-01</td>
                  <td>Confirmed</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Mountain Adventure</td>
                  <td>Jane Smith</td>
                  <td>2024-11-05</td>
                  <td>Pending</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <!-- Manage Tours Section -->
        <section id="manage-tours" class="mt-5">
          <h2>Manage Tours</h2>
          <button class="btn btn-primary mb-3">Add New Tour</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tour Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Beach Paradise</td>
                  <td>Beach</td>
                  <td>$500</td>
                  <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <!-- Create Tour Section -->
        <section id="create-tour" class="mt-5">
          <h2>Create Tour</h2>
          <form>
            <div class="mb-3">
              <label for="tour-name" class="form-label">Tour Name</label>
              <input type="text" class="form-control" id="tour-name" placeholder="Enter tour name">
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category">
                <option selected>Select category</option>
                <option value="beach">Beach</option>
                <option value="mountain">Mountain</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" placeholder="Enter price">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
          </form>
        </section>

        <!-- Users Section -->
        <section id="users" class="mt-5">
          <h2>Users</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Admin</td>
                  <td>admin@example.com</td>
                  <td>Admin</td>
                  <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
