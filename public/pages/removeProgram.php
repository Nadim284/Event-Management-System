<?php
// public/pages/remove.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Remove | Show Event Management System</title>

  <!-- Bootstrap + Icons (use CDN or swap to local files if you prefer) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    /* page chrome to match mock */
    .page-wrap{padding:24px 28px;}
    .page-title{
      text-align:center; font-weight:700; margin:12px 0 28px;
    }
    .page-title span{
      border-bottom:3px solid #000; padding:0 10px 4px;
    }
    .toolbar{display:flex; justify-content:flex-end; margin-bottom:10px;}
    .search-input{max-width:230px;}
    .card-elev{border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,.08);}
    .table thead th{font-weight:600; color:#2c2c2c;}
    .table td, .table th{vertical-align:middle;}
    .badge-chip{font-size:.75rem; border-radius:10px; padding:.3rem .55rem;}
    .chip-progress{background:#e8d7ff; color:#6c2bd9;}
    .chip-cancel{background:#ffd6d3; color:#c0362c;}
    .table-wrap{border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;}
    .table-wrap .table{margin:0;}
    .btn-remove{
      background:#6b5bf1; color:#fff; font-weight:600; border:0;
      padding:.6rem 1.2rem; border-radius:10px;
    }
    .btn-remove:hover{background:#584ae3;}
    /* optional: align checkbox column like mock */
    .col-check{width:44px;}
    /* keep enough space from sidebar */
    .ems-main .container-fluid{padding:24px;}
  </style>
</head>
<body class="with-ems-layout">

  <?php include("../../includes/header.php"); ?>
  <?php include("../../includes/sidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid page-wrap">

      <h1 class="page-title"><span>Remove</span></h1>

      <div class="toolbar">
        <div class="input-group input-group-sm search-input">
          <input id="searchBox" type="text" class="form-control" placeholder="Search Event">
          <button class="btn btn-outline-secondary" id="btnSearch" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>

      <div class="table-wrap card-elev">
        <table class="table table-hover align-middle" id="eventsTable">
          <thead class="table-light">
            <tr>
              <th class="col-check text-center">
                <input class="form-check-input" type="checkbox" id="checkAll">
              </th>
              <th>Events</th>
              <th>Status</th>
              <th>Room</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <!-- sample rows (replace with PHP loop later) -->
            <?php
              $rows = [
                ["Event name","progress","102","21/09/2025"],
                ["Event name","progress","203","21/09/2025"],
                ["Event name","progress","204","21/09/2025"],
                ["Star Sunday","cancel","102","22/09/2025"],
                ["Event name","progress","203","22/09/2025"],
                ["PUJA","progress","104","22/09/2025"],
                ["Eid","progress","205","22/09/2025"],
                ["Event name","progress","102","23/09/2025"],
                ["Event name","cancel","203","23/09/2025"],
              ];
              foreach($rows as $i=>$r){
                $chip = $r[1] === "cancel"
                  ? '<span class="badge-chip chip-cancel">Cancel</span>'
                  : '<span class="badge-chip chip-progress">in progress</span>';
                echo '<tr>'.
                        '<td class="text-center"><input class="form-check-input row-check" type="checkbox"></td>'.
                        '<td>'.$r[0].'</td>'.
                        '<td>'.$chip.'</td>'.
                        '<td>'.$r[2].'</td>'.
                        '<td>'.$r[3].'</td>'.
                     '</tr>';
              }
            ?>
          </tbody>
        </table>

        <div class="d-flex justify-content-end p-3">
          <button id="btnRemove" class="btn-remove">Remove</button>
        </div>
      </div>

    </div>
  </main>

  <script>
    // select all
    const checkAll = document.getElementById('checkAll');
    const rowChecks = () => Array.from(document.querySelectorAll('.row-check'));

    checkAll?.addEventListener('change', e => {
      rowChecks().forEach(ch => ch.checked = e.target.checked);
    });

    // simple search (client-side demo)
    const searchBox = document.getElementById('searchBox');
    const table = document.getElementById('eventsTable').getElementsByTagName('tbody')[0];

    function filterTable(q){
      const rows = table.querySelectorAll('tr');
      rows.forEach(tr => {
        const text = tr.innerText.toLowerCase();
        tr.style.display = text.includes(q.toLowerCase()) ? '' : 'none';
      });
    }
    document.getElementById('btnSearch')?.addEventListener('click', ()=>filterTable(searchBox.value));
    searchBox?.addEventListener('keyup', ()=>filterTable(searchBox.value));

    // remove action (demo only)
    document.getElementById('btnRemove')?.addEventListener('click', ()=>{
      const selected = rowChecks().filter(ch => ch.checked).map(ch => ch.closest('tr'));
      if(selected.length === 0){ alert('Please select at least one event.'); return; }
      if(confirm(`Remove ${selected.length} selected event(s)?`)){
        selected.forEach(tr => tr.remove());
        checkAll.checked = false;
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
