<?php
// ===== Configure once =====
// If your app lives at http://localhost/Event-Management-System
$BASE = '/Event-Management-System'; // <-- change to '' if app is at web root

// Detect current php file name without extension (works for nested paths too)
$currentFile = basename($_SERVER['SCRIPT_NAME'], '.php');

// Map file names to menu keys for "active" highlight
$map = [
  'dashboard'       => 'home',         // public/dashboard.php
  'deshbroad'       => 'home',         // if you still use this name anywhere
  'addProgram'      => 'addProgram',   // public/pages/addProgram.php
  'removeProgram'   => 'removeProgram',// public/pages/removeProgram.php
  'mail'            => 'mail',         // public/pages/mail.php
  'authentication'  => 'authentication', // public/pages/authentication.php
  'invite'          => 'invite',       // public/pages/invite.php
];

$currentPage = $map[$currentFile] ?? '';

function active($key, $currentPage) {
  return $key === $currentPage ? 'active' : '';
}
?>
<style>
  .ems-sidebar {
    width: var(--ems-sidebar-w, 280px);
    height: 100vh;
    position: fixed;
    inset: 0 auto 0 0;
    background: #000;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* pushes bottom section down */
    box-sizing: border-box;
    padding: 0;
    z-index: 1040;
    overflow-y: auto;
  }
  .ems-logo {
    position: sticky; top: 0; background:#000; padding: 20px 16px; text-align:center; z-index:1050;
  }
  .ems-logo img { max-width: 140px; height: auto; }

  .ems-menu, .ems-setting {
    list-style:none; padding:0; margin:0;
    display:flex; flex-direction:column; gap:8px;
  }

  .ems-section { font-size:12px; letter-spacing:.06em; text-transform:uppercase; color:#9aa0a6; margin:16px 12px 6px; }
  .ems-item a {
    display:flex; align-items:center; gap:10px;
    padding:10px 12px; margin:4px 8px; border-radius:10px;
    color:#e8eaed; text-decoration:none; font-size:16px;
  }
  .ems-item a:hover  { background:#1a1a1a; }
  .ems-item a.active { background:#222; border:1px solid #333; }
  .ems-icon { width:22px; text-align:center; }

  /* layout helper for main area */
  .with-ems-layout .ems-main { margin-left: var(--ems-sidebar-w, 280px); padding: 20px; }
</style>

<aside class="ems-sidebar">
  <div>
    <!-- Logo -->
    <div class="ems-logo">
      <img src="<?= $BASE ?>/includes/assets/logo.png" alt="Logo" class="ems-logo-img">
    </div>

    <!-- Navigation -->
    <nav>
      <div class="ems-section">Main</div>
      <ul class="ems-menu">
        <li class="ems-item">
          <a href="<?= $BASE ?>/public/home.php" class="<?= active('home', $currentPage) ?>">
            <span class="ems-icon">🏠</span><span>Home</span>
          </a>
        </li>

        <li class="ems-item">
          <a href="<?= $BASE ?>/public/pages/previousProgram.php" class="<?= active('previousProgram', $currentPage) ?>">
            <span class="ems-icon">🗓️</span><span>Previous Program</span>
          </a>
        </li>
        <li class="ems-item">
          <a href="<?= $BASE ?>/public/pages/mail.php" class="<?= active('mail', $currentPage) ?>">
            <span class="ems-icon">📬</span><span>Mail</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- Settings & Logout at bottom -->
  <div>
    <div class="ems-section"></div>
    <ul class="ems-setting">
      <li class="ems-item">
        <a href="<?= $BASE ?>/public/pages/setting.php" class="<?= active('setting', $currentPage) ?>">
          <span class="ems-icon">⚙️</span><span>Settings</span>
        </a>
      </li>
      <li class="ems-item">
        <a href="<?= $BASE ?>/public/logout.php">
          <span class="ems-icon">🚪</span><span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
