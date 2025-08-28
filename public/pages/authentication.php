<?php
// public/pages/authenticate.php
include_once __DIR__ . "/../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Authentication | Show Event Management System</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    .page-wrap{padding:24px 28px;}
    .page-title{ text-align:center; font-weight:700; margin:12px 0 28px; }
    .page-title span{ border-bottom:3px solid #000; padding:0 10px 4px; }
    .toolbar{display:flex; justify-content:flex-end; margin-bottom:10px;}
    .search-input{max-width:230px;}

    .card-elev{border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,.08);}
    .table-wrap{border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;}
    .table-wrap .table{margin:0;}
    .table td, .table th{vertical-align:middle;}
    .col-check{width:44px;}

    /* role chip dropdown */
    .chip-btn{
      border:1px solid #e3cfff; border-radius:999px; padding:.2rem .6rem; font-size:.8rem;
      line-height:1; display:inline-flex; align-items:center; gap:.35rem; cursor:pointer;
      background:#f8e7ff; color:#6b2ed6;
    }
    .chip-user{ background:#e7f0ff; border-color:#cfe0ff; color:#1f59b9; }
    .chip-org { background:#f8e7ff; border-color:#e3cfff; color:#6b2ed6; }
    .chip-btn:after{ display:none; } /* hide default caret */

    /* sticky footer remove */
    .remove-box{
      position: sticky; bottom: 0; display:flex; justify-content:flex-end;
      padding: 12px 14px; background:#fff; border-top:1px solid #eee;
    }
    .btn-remove{
      background:#6b5bf1; color:#fff; font-weight:600; border:0;
      padding:.55rem 1.1rem; border-radius:10px;
    }
    .btn-remove:disabled{opacity:.45;}
    .ems-main .container-fluid{padding:24px;}
  </style>
</head>
<body class="with-ems-layout">

  <?php include("../../includes/header.php"); ?>
  <?php include("../../includes/sidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid page-wrap">

      <h1 class="page-title"><span>Authentication</span></h1>

      <div class="toolbar">
        <div class="input-group input-group-sm search-input">
          <input id="searchBox" type="text" class="form-control" placeholder="Search">
          <button class="btn btn-outline-secondary" id="btnSearch" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>

      <div class="table-wrap card-elev">
        <table class="table table-hover align-middle" id="authTable">
          <thead class="table-light">
            <tr>
              <th class="col-check text-center">
                <input class="form-check-input" type="checkbox" id="checkAll">
              </th>
              <th>Email</th>
              <th>Role</th>
              <th>Starting Date</th>
              <th>Club</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // NEW dataset: [email, role, date, club]
              $rows = [
                ["Email1@gmail.com","Organizer","21/09/2025","Youth Team"],
                ["Email2@gmail.com","User","21/09/2025","MU Club"],
                ["Email3@gmail.com","User","21/09/2025","Tech Society"],
                ["Email4@gmail.com","Organizer","22/09/2025","Cultural Forum"],
                ["Email5@gmail.com","User","22/09/2025","Sports Club"],
                ["Email6@gmail.com","Organizer","22/09/2025","Robotics Club"],
                ["Email7@gmail.com","User","22/09/2025","Debate Club"],
                ["Email8@gmail.com","Organizer","23/09/2025","Youth Team"],
                ["Email9@gmail.com","User","23/09/2025","MU Club"],
              ];
              foreach($rows as $r){
                $email = htmlspecialchars($r[0]);
                $role  = $r[1]; // User | Organizer
                $date  = htmlspecialchars($r[2]);
                $club  = htmlspecialchars($r[3]);
                $chipClass = $role === "User" ? "chip-user" : "chip-org";
                echo '<tr>'.
                      '<td class="text-center"><input class="form-check-input row-check" type="checkbox"></td>'.
                      '<td>'.$email.'</td>'.
                      // ROLE CELL = dropdown chip for switching User/Organizer
                      '<td>'.
                        '<div class="dropdown">'.
                          '<button class="chip-btn '.$chipClass.' dropdown-toggle role-chip" data-bs-toggle="dropdown" type="button" data-current-role="'.htmlspecialchars($role).'">'.
                            '<i class="bi bi-person-badge"></i> <span class="role-text">'.htmlspecialchars($role).'</span>'.
                          '</button>'.
                          '<ul class="dropdown-menu">'.
                            '<li><button class="dropdown-item role-opt" data-role="User"><i class="bi bi-person"></i> User</button></li>'.
                            '<li><button class="dropdown-item role-opt" data-role="Organizer"><i class="bi bi-people"></i> Organizer</button></li>'.
                          '</ul>'.
                        '</div>'.
                      '</td>'.
                      '<td>'.$date.'</td>'.
                      '<td>'.$club.'</td>'.
                    '</tr>';
              }
            ?>
          </tbody>
        </table>

        <div class="remove-box">
          <button id="btnRemove" class="btn-remove" disabled>
            Remove (<span id="selCount">0</span>)
          </button>
        </div>
      </div>

    </div>
  </main>

  <script>
    const $ = s => document.querySelector(s);
    const $$ = s => Array.from(document.querySelectorAll(s));

    const checkAll = $('#checkAll');
    const selCount = $('#selCount');
    const removeBtn = $('#btnRemove');
    const tbody = $('#authTable').querySelector('tbody');

    function updateSelectedCount(){
      const n = $$('.row-check:checked').length;
      selCount.textContent = n;
      removeBtn.disabled = n === 0;
    }

    // Select all
    checkAll?.addEventListener('change', e => {
      $$('.row-check').forEach(ch => ch.checked = e.target.checked);
      updateSelectedCount();
    });

    // Individual select
    tbody.addEventListener('change', e=>{
      if(e.target.classList.contains('row-check')){
        if(!e.target.checked) checkAll.checked = false;
        updateSelectedCount();
      }
    });

    // Search (includes club text)
    const searchBox = $('#searchBox');
    function filterTable(q){
      tbody.querySelectorAll('tr').forEach(tr => {
        const text = tr.innerText.toLowerCase();
        tr.style.display = text.includes(q.toLowerCase()) ? '' : 'none';
      });
    }
    $('#btnSearch')?.addEventListener('click', ()=>filterTable(searchBox.value));
    searchBox?.addEventListener('keyup', ()=>filterTable(searchBox.value));

    // Bulk remove
    removeBtn?.addEventListener('click', ()=>{
      const selectedRows = $$('.row-check:checked').map(ch => ch.closest('tr'));
      if(selectedRows.length === 0) return;
      if(confirm(`Remove ${selectedRows.length} selected entr${selectedRows.length>1?'ies':'y'}?`)){
        selectedRows.forEach(tr => tr.remove());
        checkAll.checked = false;
        updateSelectedCount();
      }
    });

    // Role switch (chip dropdown)
    function applyRoleStyle(btn, role){
      btn.dataset.currentRole = role;
      btn.querySelector('.role-text').textContent = role;
      btn.classList.remove('chip-user','chip-org');
      btn.classList.add(role === 'User' ? 'chip-user' : 'chip-org');
      // TODO: POST to backend if needed
      // fetch('/api/assign_role.php',{method:'POST', body:new URLSearchParams({email, role})})
    }

    tbody.addEventListener('click', e=>{
      const opt = e.target.closest('.role-opt');
      if(opt){
        const role = opt.dataset.role;
        const menu = opt.closest('.dropdown-menu');
        const btn = menu.previousElementSibling; // chip button
        applyRoleStyle(btn, role);
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
