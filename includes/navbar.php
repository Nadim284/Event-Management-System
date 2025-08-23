<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .navbar-custom {
      padding: 15px 30px;
    }
    .navbar-center {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }
    .btn-icon {
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-light bg-light navbar-custom fixed-top" style="height:150px; padding:0;">
  <div class="d-flex w-100" style="height:100%;">
    
    <!-- Left: 1/6 প্রস্থ কালো div -->
   <div style="width:20.66%; background-color:black; height:100%; display:flex; justify-content:center; align-items:center;">
    <a class="navbar-brand" href="#">
        <img src="assets/logo.png" alt="Logo" width="200" height="140">
    </a>
</div>


    <!-- Center: Website Name -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center mt-5">
        <h1 class="m-0 fw-bold">Show Event Management System</h1>
    </div>


    <!-- Right: Dark Mode + Notifications -->
    <div class="d-flex align-items-center gap-3" style="width:16.66%; justify-content:end; padding-right:100px; margin-top:50px;">
        <button class="btn btn-outline-secondary btn-icon">
            <i class="bi bi-moon"></i>
        </button>

    <button class="btn btn-outline-primary btn-icon position-relative">
        <i class="bi bi-bell"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        3
        </span>
      </button>
    </div>

  </div>
</nav>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
