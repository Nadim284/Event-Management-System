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
    background: #fff; /* optional: keep a white bg */
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
  }

  .btn-icon {
    width: 40px; 
    height: 40px; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    border-radius: 50%;
  }

  /* page layout helpers */
  body.with-ems-layout {
    padding-top: 0; /* reset since header is not fixed */
  }

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
  .ems-header-left   { width:16.66%; padding-left:24px; display:flex; align-items:center; gap:12px; }
  .ems-header-center { flex:1; height:100%; display:flex; justify-content:center; align-items:center; text-align:center; }
  .ems-header-right  { width:16.66%; padding-right:100px; display:flex; align-items:center; gap:12px; justify-content:flex-end; }
</style>

<nav class="navbar navbar-light navbar-custom">
  <!-- Center: Website Name -->
  <div class="ems-header-center">
    <h1 class="m-0 fw-bold">Show Event Management System</h1>
  </div>

  <!-- Right: Dark Mode + Notifications -->
  <div class="ems-header-right">
    <button class="btn btn-outline-secondary btn-icon" title="Toggle dark mode">
      <i class="bi bi-moon"></i>
    </button>
    <button class="btn btn-outline-primary btn-icon position-relative" title="Notifications">
      <i class="bi bi-bell"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
    </button>
  </div>
</nav>
