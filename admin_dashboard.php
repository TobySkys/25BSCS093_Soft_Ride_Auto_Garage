<?php
// admin_dashboard.php - Soft Ride Auto Garage
session_start();

// ─── AUTH GUARD ───
if (!isset($_SESSION['is_admin'])) {
    header("Location:admin_login.php");
    exit();
}

$admin_name = $_SESSION['username'] ?? 'Administrator';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/icons/css/all.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <title>Admin Dashboard | Soft Ride Auto Garage</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600&family=Barlow+Condensed:wght@400;500;700&display=swap" rel="stylesheet">
  
</head>
<body>
<!-------------------- SIDEBAR ---------------------------->
<aside class="sidebar">
  <div class="sidebar-brand">
    <a href="index.php">Soft<span>Ride</span></a>
    <p>Admin Panel</p>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-group-label">Overview</div>
    <a href="admin_dashboard.php" class="nav-item active">
      <span><i class="fa-solid fa-dashboard"></i></span> Dashboard
      <span class="badge"></span>
    </a>

    <div class="nav-group-label">Operations</div>
    <a href="admin_bookings.php" class="nav-item">
      <span><i class="fa-solid fa-book"></i></span> Bookings
      <span class="badge"></span>
    </a>
    <a href="admin_customers.php" class="nav-item">
      <span><i class="fa-solid fa-user"></i></span> Customers
    </a>
    <a href="admin_vehicles.php" class="nav-item">
      <span><i class="fa-solid fa-car"></i></span> Vehicles
    </a>
    <a href="admin_technicians.php" class="nav-item">
      <span><i class="fa-solid fa-wrench"></i></span> Technicians
    </a>

    <div class="nav-group-label">Inventory</div>
    <a href="admin_parts.php" class="nav-item">
      <span><i class="fa-solid fa-gear"></i></span> Spare Parts
      <span class="badge"></span>
    </a>
    <a href="admin_orders.php" class="nav-item">
      <span><i class="fa-solid fa-box"></i></span> Orders
    </a>
    <a href="admin_suppliers.php" class="nav-item">
      <span><i class="fa-solid fa-truck"></i></span> Suppliers
    </a>

    <div class="nav-group-label">Finance</div>
    <a href="admin_invoices.php" class="nav-item">
      <span><i class="fa-solid fa-file-invoice"></i></span> Invoices
    </a>
    <a href="admin_reports.php" class="nav-item">
      <span><i class="fa-solid fa-chart-bar"></i></span> Reports
    </a>

    <div class="nav-group-label">System</div>
    <a href="admin_settings.php" class="nav-item">
      <span><i class="fa-solid fa-gear"></i></span> Settings
    </a>
    <a href="index.php" class="nav-item" target="_blank">
      <span><i class="fa-solid fa-globe"></i></span> View Website
    </a>
  </nav>

  <div class="sidebar-footer">
    <div class="admin-info">
      <div class="admin-avatar"><?php echo strtoupper(substr($admin_name, 0, 1)); ?></div>
      <div>
        <div class="admin-name"><?php echo htmlspecialchars($admin_name); ?></div>
        <div class="admin-role">Administrator</div>
      </div>
    </div>
    <a href="index.php" class="logout-btn">Log Out</a>
  </div>
</aside>

<!---------- MAIN --------->
<main class="main">

  <!-- TOP BAR -->
  <div class="topbar">
    <div>
      <div class="topbar-title">Dashboard</div>
      <div class="topbar-subtitle">Welcome back, <?php echo htmlspecialchars($admin_name); ?></div>
    </div>
    <div class="topbar-right">
      <div class="topbar-date">
        <?php echo date('l, d F Y'); ?> &mdash; <?php echo date('H:i'); ?>
      </div>
      <a href="admin_bookings.php?new=1" class="topbar-btn">+ New Booking</a>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="content">

    <!-- STAT CARDS -->
    <div class="stats-grid">
      <div class="stat-card rust">
        <span class="stat-icon"><i class="fa-solid fa-book"></i></span>
        <div class="stat-label">Bookings Today</div>
        <div class="stat-val"></div>
        <div class="stat-sub">+2 since yesterday</div>
      </div>
      <div class="stat-card amber">
        <span class="stat-icon"><i class="fa-solid fa-hour-glass"></i></span>
        <div class="stat-label">Pending / Waiting</div>
        <div class="stat-val"></div>
        <div class="stat-sub">Awaiting attention</div>
      </div>
      <div class="stat-card green">
        <span class="stat-icon"><i class="fa-solid fa-checkbox"></i></span>
        <div class="stat-label">Completed Today</div>
        <div class="stat-val"></div>
        <div class="stat-sub">Out of total</div>
      </div>
      <div class="stat-card blue">
        <span class="stat-icon"><i class="fa-solid fa-money-bag"></i></span>
        <div class="stat-label">Revenue Today</div>
        <div class="stat-val">UGX </div>
        <div class="stat-sub">Across completed jobs</div>
      </div>
      <div class="stat-card red">
        <span class="stat-icon"><i class="fa-solid fa-alert"></i></span>
        <div class="stat-label">Low Stock Alerts</div>
        <div class="stat-val"></div>
        <div class="stat-sub">Parts below threshold</div>
      </div>
      <div class="stat-card purple">
        <span class="stat-icon"><i class="fa-solid fa-user"></i></span>
        <div class="stat-label">Total Customers</div>
        <div class="stat-val"></div>
        <div class="stat-sub">Registered in system</div>
      </div>
    </div>

    <!-- MAIN DASH GRID -->
    <div class="dash-grid">

      <!-- LEFT COL -->
      <div style="display:flex; flex-direction:column; gap:1rem;">

        <!-- BOOKINGS TABLE -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Today's Bookings</span>
            <a href="admin_bookings.php" class="panel-link">View All →</a>
          </div>
          <table class="bookings-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer / Vehicle</th>
                <th>Service</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="booking-id"></span></td>
                <td>
                  <div class="customer-name"></div>
                  <div class="vehicle-info"></div>
                </td>
                <td><span class="service-name"></span></td>
                <td style="color:var(--muted);font-size:0.82rem;"></td>
                <td>
                  <span class="badge-status status-"></span>
                </td>
                <td>
                  <a href="admin_booking_detail.php?id=" class="action-btn">View</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Quick Actions</span>
          </div>
          <div class="actions-grid">
            <a href="admin_bookings.php?new=1" class="quick-action">
              <span class="qa-icon"><i class="fa-solid fa-book"></i></span> New Booking
            </a>
            <a href="admin_customers.php?new=1" class="quick-action">
              <span class="qa-icon"><i class="fa-solid fa-user"></i></span> Add Customer
            </a>
            <a href="shop_parts.php?new=1" class="quick-action">
              <span class="qa-icon"><i class="fa-solid fa-plus"></i></span> Add Part
            </a>
            <a href="admin_invoices.php?new=1" class="quick-action">
              <span class="qa-icon"><i class="fa-solid fa-file-invoice"></i></span> Create Invoice
            </a>
            <a href="admin_reports.php" class="quick-action">
              <span class="qa-icon"><i class="fa-solid fa-chart-line"></i></span> View Reports
            </a>
            <a href="admin_technicians.php" class="quick-action">
              <span class="qa-icon"><i class="fa-solid fa-wrench"></i></span> Technicians
            </a>
          </div>
        </div>
      </div>

      <!-- RIGHT COL -->
      <div style="display:flex; flex-direction:column; gap:1rem;">

        <!-- REVENUE CHART -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Weekly Revenue</span>
            <a href="admin_reports.php" class="panel-link">Full Report →</a>
          </div>
          <div class="chart-body">
            <div class="chart-revenue-total">
              This week total
              <strong>UGX </strong>
            </div>
            <div class="chart-bars" style="margin-top:1.2rem;">
              <div class="chart-col">
                <div class="chart-bar-wrap">
                  <div class="chart-bar" style="height:;"
                       title="UGX"></div>
                </div>
                <div class="chart-day"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- LOW STOCK -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Low Stock Alerts</span>
            <a href="admin_parts.php?filter=low" class="panel-link">Manage →</a>
          </div>
          <div class="stock-list">
            <div class="stock-item">
              <div class="stock-qty"></div>
              <div>
                <div class="stock-name"></div>
                <div class="stock-sku"></div>
              </div>
              <div class="stock-warn">Restock</div>
            </div>
          </div>
        </div>

      </div><!-- /right col -->
    </div><!-- /dash-grid -->

  </div><!-- /content -->
</main>

</body>
</html>
