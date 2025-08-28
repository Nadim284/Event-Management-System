<?php
// Detect current file
$currentFile = basename($_SERVER['SCRIPT_NAME'], ".php");

// Map file names to menu keys
$map = [
    'deshbroad'     => 'home',
    'addProgram'     => 'Add Program'

];

// Resolve current page key
$currentPage = $map[$currentFile] ?? '';
?>

<style>
  .ems-sidebar {
  width: var(--ems-sidebar-w, 280px);
  height: 100vh;            /* take full viewport height */
  position: fixed;
  inset: 0 auto 0 0;        /* stick to left */
  background: #000;
  color: #fff;
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  padding: 0;
  z-index: 1040;
  overflow-y: auto;         /* enable scrolling inside if menu is long */
}


  /* Logo container */
  .ems-logo {
    position: sticky;   /* stays at top while scrolling */
    top: 0;
    background: #000;   /* same bg as sidebar */
    padding: 20px 16px;
    text-align: center;
    z-index: 1050;      /* above nav */
  }

  .ems-logo img {
    max-width: 120px;
    height: auto;
  }

  /* Menu styles */
  .ems-menu { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:8px; }
  .ems-section { font-size:12px; letter-spacing:.06em; text-transform:uppercase; color:#9aa0a6; margin:16px 12px 6px; }

  .ems-item a {
    display:flex; align-items:center; gap:10px;
    padding:10px 12px; margin:4px 8px; border-radius:10px;
    color:#e8eaed; text-decoration:none; font-size:16px;
  }
  .ems-item a:hover  { background:#1a1a1a; }
  .ems-item a.active { background:#222; border:1px solid #333; }
  .ems-icon { width:22px; text-align:center; }
</style>

<aside class="ems-sidebar">
  <!-- Logo fixed at top -->
  <div class="ems-logo">
    <img src="../../includes/assets/logo.png" alt="Logo" class="ems-logo-img">

  </div>

  <!-- Navigation -->
  <nav>
    <div class="ems-section">Main</div>
    <ul class="ems-menu">
      <li class="ems-item">
        <a href="/deshbroad.php" class="<?= $currentPage === 'home' ? 'active' : '' ?>">
          <span class="ems-icon">🏠</span><span>Home</span>
        </a>
      </li>
      <li class="ems-item">
        <a href="/addProgram.php" class="<?= $currentPage === 'addProgram' ? 'active' : '' ?>">
          <span class="ems-icon">➕</span><span>Add Program</span>
        </a>
      </li>
      <li class="ems-item">
        <a href="/public/signup.php" class="<?= $currentPage === 'remove_program' ? 'active' : '' ?>">
          <span class="ems-icon">🗑️</span><span>Remove Program</span>
        </a>
      </li>
      <li class="ems-item">
        <a href="/public/deshbroad.php" class="<?= $currentPage === 'mail' ? 'active' : '' ?>">
          <span class="ems-icon">📬</span><span>Mail</span>
        </a>
      </li>
    </ul>

    <div class="ems-section">Access</div>
    <ul class="ems-menu">
      <li class="ems-item"><a href="#"><span class="ems-icon">✅</span><span>Authenticate</span></a></li>
      <li class="ems-item"><a href="#"><span class="ems-icon">👥</span><span>Invite</span></a></li>
      <li class="ems-item"><a href="#"><span class="ems-icon">📦</span><span>Allocate</span></a></li>
    </ul>
  </nav>
</aside>
