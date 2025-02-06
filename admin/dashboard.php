<?php 
session_start();
include("../include/config.php");
error_reporting(0);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Dashboard | Dashboard v2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Admin Dashboard" />
    <meta name="author" content="Your Company" />
    <meta name="description" content="Admin Dashboard, manage products, categories, and users" />
    <meta name="keywords" content="admin dashboard, product management, user management" />
    
    <!-- External Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="css/adminlte.css" />

    <!-- ApexCharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />

  </head>
  <body class="layout-fixed sidebar-expand-lg bg-light">
    <div class="app-wrapper">
      <!-- Navbar -->
      <?php include("include/navbar.php") ?>

      <!-- Sidebar -->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="./dashboard.php" class="brand-link">
            <img src="./assets/img/AdminLTELogo.png" alt="Admin Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Admin Dashboard</span>
          </a>
        </div>
        <?php include("include/sidebar.php") ?>
      </aside>

      <!-- Main Content -->
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Admin Dashboard</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <!-- Product Management -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box shadow-sm mb-4">
                  <span class="info-box-icon text-bg-primary">
                    <i class="bi bi-gear-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <a href="manage_product.php" class="btn btn-primary w-100">View Products</a>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="javascript:void(0)" class="text-muted">View All Products</a>
                </div>
              </div>

              <!-- Category Management -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box shadow-sm mb-4">
                  <span class="info-box-icon text-bg-warning">
                    <i class="bi bi-boxes"></i>
                  </span>
                  <div class="info-box-content">
                    <a href="manage_category.php" class="btn btn-warning w-100">View Categories</a>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="javascript:void(0)" class="text-muted">View All Categories</a>
                </div>
              </div>

              <!-- User Management -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box shadow-sm mb-4">
                  <span class="info-box-icon text-bg-success">
                    <i class="bi bi-person-lines-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <a href="manage_user.php" class="btn btn-success w-100">View Users</a>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="javascript:void(0)" class="text-muted">View All Users</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <?php include("include/footer.php"); ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../../dist/js/adminlte.js"></script>
  </body>
</html>
