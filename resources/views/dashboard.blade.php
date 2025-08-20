<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Sastra Indonesia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --sidebar-width: 250px;
      --sidebar-collapsed-width: 70px;
      --primary-color: #007bff;
      --warning-color: #ffc107;
      --light-gray: #f8f9fa;
      --border-color: #dee2e6;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f5;
    }

    .wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: var(--sidebar-width);
      background: #fff;
      border-right: 1px solid var(--border-color);
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      transition: all 0.3s ease;
      z-index: 1050;
    }

    .sidebar.collapsed {
      width: var(--sidebar-collapsed-width);
    }

    .sidebar-header {
      padding: 1rem;
      border-bottom: 1px solid var(--border-color);
    }

    .sidebar-nav {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-nav .nav-link {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      color: #666;
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all 0.2s;
    }

    .sidebar-nav .nav-link i {
      width: 20px;
      margin-right: 10px;
    }

    .sidebar-nav .nav-link:hover {
      background: var(--light-gray);
      color: #000;
    }

    .sidebar-nav .nav-link.active {
      background: #fff3cd;
      color: var(--warning-color);
      border-left-color: var(--warning-color);
      font-weight: 600;
    }

    .sidebar-footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      padding: 1rem;
      border-top: 1px solid var(--border-color);
    }

    /* Content */
    .content {
      flex: 1;
      margin-left: var(--sidebar-width);
      transition: margin-left 0.3s ease;
      padding: 1rem;
      width: 100%;
    }

    .content.expanded {
      margin-left: var(--sidebar-collapsed-width);
    }

    /* Responsive */
    @media (max-width: 991.98px) {
      .sidebar {
        left: -100%;
      }

      .sidebar.show {
        left: 0;
      }

      .content {
        margin-left: 0 !important;
      }
    }

    .page-title {
      font-weight: 600;
      color: #333;
    }

    /* Small tweaks */
    .table th {
      background: var(--light-gray);
    }

    .btn-group .btn {
      margin-right: 0.25rem;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">
      <div class="sidebar-header d-flex align-items-center">
        <div class="logo-icon me-2">
          <i class="fas fa-book text-warning fs-4"></i>
        </div>
        <span class="fw-bold">Sastra UM</span>
      </div>

      <ul class="sidebar-nav">
        <li><a href="#" class="nav-link"><i class="fas fa-images"></i><span>Slideshow</span></a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-newspaper"></i><span>Berita</span></a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-file-alt"></i><span>Artikel</span></a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-calendar"></i><span>Agenda</span></a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-users"></i><span>Kelola User</span></a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-question-circle"></i><span>FAQ</span></a></li>
        <li><a href="#" class="nav-link active"><i class="fas fa-book-open"></i><span>Sastra
              Indonesia</span></a></li>
      </ul>

      <div class="sidebar-footer d-flex align-items-center">
        <img src="https://via.placeholder.com/40" class="rounded-circle me-2">
        <div>
          <div class="fw-semibold">Admin</div>
          <small class="text-muted">Administrator</small>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <div id="content" class="content">
      <!-- Top Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-4">
        <div class="container-fluid">
          <button id="sidebarToggle" class="btn btn-outline-secondary d-lg-none">
            <i class="fas fa-bars"></i>
          </button>
          <div class="ms-auto">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle fa-lg"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Header -->
      <div class="mb-4">
        <h2 class="page-title">Manajemen Data Sastra Indonesia</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Informasi</a></li>
            <li class="breadcrumb-item"><a href="#">Sastra Indonesia</a></li>
            <li class="breadcrumb-item active text-warning" aria-current="page">Data Sastra Indonesia</li>
          </ol>
        </nav>
      </div>

      <!-- Card -->
      <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data User</h5>
          <button class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
        </div>

        <div class="card-body">
          <!-- Filters -->
          <div class="row g-3 mb-3">
            <div class="col-md-6 d-flex flex-wrap gap-2">
              <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="fas fa-filter"></i> Status
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Semua</a></li>
                  <li><a class="dropdown-item" href="#">Publish</a></li>
                  <li><a class="dropdown-item" href="#">Draft</a></li>
                </ul>
              </div>
              <button class="btn btn-outline-danger"><i class="fas fa-redo"></i> Reset</button>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Sesuatu...">
                <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <!-- Table placeholder -->
          <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead>
                <tr>
                  <th>Nama <i class="fas fa-sort"></i></th>
                  <th>Email <i class="fas fa-sort"></i></th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John Doe</td>
                  <td>john@example.com</td>
                  <td><span class="badge bg-success">Active</span></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                      <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Jane Smith</td>
                  <td>jane@example.com</td>
                  <td><span class="badge bg-secondary">Inactive</span></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                      <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("sidebarToggle");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("show");
        });
  </script>
</body>

</html>