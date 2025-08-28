<!-- includes/header.php -->
<style>
  :root {
    --ems-header-h: 150px;
    --ems-sidebar-w: 280px;
  }

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
  }

  .btn-icon {
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
  }

  body.with-ems-layout { padding-top: 0; }

  .ems-main {
    margin-left: var(--ems-sidebar-w);
    padding: 24px;
    min-height: 100vh;
    box-sizing: border-box;
    background: #f7f7f8;
  }

  .ems-logo-img {
    max-width: 140px;
    height: auto;
    display: block;
  }

  /* header slots */
  .ems-header-left   { width:16.66%; padding-left:24px; }
  .ems-header-center { flex:1; display:flex; justify-content:center; align-items:center; text-align:center; }
  .ems-header-right  { width:16.66%; padding-right:100px; display:flex; align-items:center; justify-content:flex-end; }
</style>

<nav class="navbar navbar-light navbar-custom">
  <!-- Left (empty placeholder, keeps center aligned) -->
  <div class="ems-header-left"></div>

  <!-- Center: Website Name -->
  <div class="ems-header-center">
    <h1 class="m-0 fw-bold">Show Event Management System</h1>
  </div>

  <!-- Right: Logout button -->
  <div class="ems-header-right">
    <a href="../public/login.php" class="btn btn-danger btn-icon">Logout</a>
  </div>
</nav>
