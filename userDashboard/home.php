<?php
// public/home.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    :root {
      --ems-header-h: 150px;
      --ems-sidebar-w: 280px;
    }

    /* Sidebar with scrollbar */
    .ems-sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: var(--ems-sidebar-w);
      height: 100vh;
      background: #2c3e50;
      color: #fff;
      overflow-y: auto;
      overflow-x: hidden;
      padding-top: 20px;
    }

    /* Navbar */
    .navbar-custom {
      padding: 0;
      width: calc(100% - var(--ems-sidebar-w));
      margin-left: var(--ems-sidebar-w);
      height: var(--ems-header-h);
      z-index: 1050;
      background: #fff;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
    }

    /* Main content */
    .ems-main {
      margin-left: var(--ems-sidebar-w);
      margin-top: var(--ems-header-h);
      padding: 24px;
      min-height: 100vh;
      background: #f7f7f8;
      overflow-y: auto;
    }

    /* Dashboard replacement layout */
    .dashboard-container {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .dashboard-buttons {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .dashboard-buttons button {
      padding: 10px 20px;
      border: 1px solid #333;
      background: #fff;
      cursor: pointer;
      border-radius: 5px;
    }

    /* Event details at the bottom */
    .event-section {
      margin-left: bottom; 
    }

    .event-box {
      background: #ddd;
      border: 2px solid #999;
      margin-top: 30px;
      padding: 15px;
      min-height: 500px;
    }

    .event-details {
      border: 1px solid #333;
      background: #e5e5e5;
      margin-top: 200px;
      padding: 10px;
      min-height: 200px;
    }
  </style>
</head>
<body class="with-ems-layout">
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/userSidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid d-flex flex-column" style="min-height: 80vh;">
      <!-- Top Buttons -->
      <div class="dashboard-buttons">
        <button>Upcoming Events</button>
        <button>Latest Events</button>
      </div>

      <!-- Event Details at the bottom -->
      <div class="event-section mt-auto">
        <div class="event-box">
          <button>Event Details</button>
          <div class="event-details">
            Event information will appear here.
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
