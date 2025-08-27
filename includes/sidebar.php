<!-- includes/sidebar.php -->
<style>
  .ems-sidebar {
    width: var(--ems-sidebar-w, 280px);
    height: 100vh;
    position: fixed;
    inset: 0 auto 0 0;               /* top:0 right:auto bottom:0 left:0 */
    background: #000;
    color: #fff;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    padding: 20px 16px;
    padding-top: calc(var(--ems-header-h, 150px) + 16px); /* sit under fixed header */
    z-index: 1040; /* below header */
  }

  .ems-menu { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:8px; }
  .ems-section { font-size:12px; letter-spacing:.06em; text-transform:uppercase; color:#9aa0a6; margin:12px 12px 6px; }

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
  <nav>
    <div class="ems-section">Main</div>
    <ul class="ems-menu">
      <li class="ems-item"><a href="/index.php" class="active"><span class="ems-icon">🏠</span><span>Home</span></a></li>
      <li class="ems-item"><a href="/public/login.php"><span class="ems-icon">➕</span><span>Add Program</span></a></li>
      <li class="ems-item"><a href="/public/signup.php"><span class="ems-icon">🗑️</span><span>Remove Program</span></a></li>
      <li class="ems-item"><a href="/public/deshbroad.php"><span class="ems-icon">📬</span><span>Mail</span></a></li>
    </ul>

    <div class="ems-section">Access</div>
    <ul class="ems-menu">
      <li class="ems-item"><a href="#"><span class="ems-icon">✅</span><span>Authenticate</span></a></li>
      <li class="ems-item"><a href="#"><span class="ems-icon">👥</span><span>Invite</span></a></li>
      <li class="ems-item"><a href="#"><span class="ems-icon">📦</span><span>Allocate</span></a></li>
    </ul>
  </nav>
</aside>
