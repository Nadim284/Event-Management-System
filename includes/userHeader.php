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
    justify-content: center; /* ✅ ensures center content */
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

  /* header center only (no left/right space needed now) */
  .ems-header-center {
    text-align: center;
  }
</style>

<nav class="navbar navbar-light navbar-custom">
  <div class="ems-header-center">
    <h1 class="m-0 fw-bold">Show Event Management System</h1>
  </div>
</nav>
