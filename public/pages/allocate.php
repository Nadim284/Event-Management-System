<?php
// public/pages/allocate.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Allocate Room | Show Event Management System</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    .page-wrap{padding:24px 28px;}
    .page-title{ text-align:center; font-weight:700; margin:12px 0 28px; }
    .page-title span{ border-bottom:3px solid #000; padding:0 10px 4px; }

    .toolbar{display:flex; justify-content:flex-end; margin-bottom:10px;}
    .search-input{max-width:260px;}

    .card-elev{border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,.08);}
    .table-wrap{border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;}
    .table-wrap .table{margin:0;}
    .table td, .table th{vertical-align:middle;}
    .col-check{width:44px;}
    .col-actions{width:120px; text-align:center;}
    .room-pill{height:22px; width:72px; background:#e5e5e5; border-radius:999px; display:inline-block;}

    .chip{font-size:.75rem; border-radius:10px; padding:.25rem .55rem; display:inline-block;}
    .chip-pending{background:#eee; color:#444;}
    .chip-alloc{background:#d1fae5; color:#065f46;}
    .muted{color:#6b7280;}

    .ems-main .container-fluid{padding:24px;}
  </style>
</head>
<body class="with-ems-layout">

  <?php include("../../includes/header.php"); ?>
  <?php include("../../includes/sidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid page-wrap">

      <h1 class="page-title"><span>Allocate Room</span></h1>

      <div class="toolbar">
        <div class="input-group input-group-sm search-input">
          <input id="searchBox" type="text" class="form-control" placeholder="Search program / email / date">
          <button class="btn btn-outline-secondary" id="btnSearch" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>

      <div class="table-wrap card-elev">
        <table class="table table-hover align-middle" id="allocTable">
          <thead class="table-light">
            <tr>
              <th class="col-check text-center">
                <input class="form-check-input" type="checkbox" id="checkAll">
              </th>
              <th>Program</th>
              <th>Organizer (Email)</th>
              <th>Date</th>
              <th>Time</th>
              <th>Capacity</th>
              <th>Status</th>
              <th>Assigned Room</th>
              <th class="col-actions">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // program, email, date, start, end, capacity, status(pending/allocated), assigned_room (null if none)
              $rows = [
                ["MU Dev Talk",        "organizer1@example.com","21/09/2025","10:00","12:00",120,"pending",null],
                ["Cultural Night",     "culture@example.com",   "21/09/2025","13:00","15:00",200,"pending",null],
                ["Robotics Workshop",  "robo@example.com",      "22/09/2025","11:00","13:00",80, "allocated","102"],
                ["Football Meetup",    "sports@example.com",    "22/09/2025","16:00","18:00",60, "pending",null],
                ["Freshers' Reception","youth@example.com",     "23/09/2025","09:00","11:00",150,"allocated","205"],
                ["Photography 101",    "photo@example.com",     "23/09/2025","14:00","16:00",50, "pending",null],
              ];
              foreach($rows as $r){
                [$prog,$email,$date,$start,$end,$cap,$status,$assigned] = $r;
                $statusChip = $status === "allocated"
                  ? '<span class="chip chip-alloc">Allocated</span>'
                  : '<span class="chip chip-pending">Pending</span>';
                $roomCell = $assigned ? '<span class="room-pill" title="'.htmlspecialchars($assigned).'"></span> <span class="ms-1">'.htmlspecialchars($assigned).'</span>'
                                      : '<span class="muted">—</span>';
                echo '<tr data-prog="'.htmlspecialchars($prog).'" data-email="'.htmlspecialchars($email).'" data-date="'.htmlspecialchars($date).'" data-start="'.htmlspecialchars($start).'" data-end="'.htmlspecialchars($end).'" data-capacity="'.htmlspecialchars($cap).'">'.
                        '<td class="text-center"><input class="form-check-input row-check" type="checkbox"></td>'.
                        '<td>'.htmlspecialchars($prog).'</td>'.
                        '<td>'.htmlspecialchars($email).'</td>'.
                        '<td>'.htmlspecialchars($date).'</td>'.
                        '<td>'.htmlspecialchars($start).'–'.htmlspecialchars($end).'</td>'.
                        '<td>'.htmlspecialchars($cap).'</td>'.
                        '<td class="status-cell">'.$statusChip.'</td>'.
                        '<td class="room-cell">'.$roomCell.'</td>'.
                        '<td class="col-actions">'.
                          '<div class="btn-group btn-group-sm">'.
                            '<button class="btn btn-outline-primary btn-alloc">Allocate</button>'.
                            '<button class="btn btn-outline-secondary btn-unassign">Unassign</button>'.
                          '</div>'.
                        '</td>'.
                     '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </main>

  <!-- Allocate Modal -->
  <div class="modal fade" id="allocModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius:12px;">
        <div class="modal-header">
          <h5 class="modal-title">Allocated Room</h5>
          <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2"><strong>Program:</strong> <span id="mProg"></span></div>
          <div class="mb-2"><strong>Organizer:</strong> <span id="mEmail"></span></div>
          <div class="mb-2"><strong>Date:</strong> <span id="mDate"></span></div>
          <div class="mb-3"><strong>Time:</strong> <span id="mTime"></span></div>

          <div class="mb-3">
            <label class="form-label">Room</label>
            <select id="mRoom" class="form-select">
              <!-- demo rooms with capacity -->
              <option value="">Select room…</option>
              <option value="102" data-cap="120">102 (cap: 120)</option>
              <option value="103" data-cap="80">103 (cap: 80)</option>
              <option value="104" data-cap="60">104 (cap: 60)</option>
              <option value="203" data-cap="120">203 (cap: 120)</option>
              <option value="205" data-cap="150">205 (cap: 150)</option>
            </select>
          </div>

          <div id="mHints" class="small">
            <!-- availability + capacity notices will render here -->
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button id="mAssignBtn" class="btn btn-primary">Assign</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Helpers
    const $ = s => document.querySelector(s);
    const $$ = s => Array.from(document.querySelectorAll(s));

    // Search
    const searchBox = $('#searchBox');
    const tbody = $('#allocTable').querySelector('tbody');
    function filterTable(q){
      const query = q.toLowerCase();
      tbody.querySelectorAll('tr').forEach(tr=>{
        tr.style.display = tr.innerText.toLowerCase().includes(query) ? '' : 'none';
      });
    }
    $('#btnSearch')?.addEventListener('click', ()=>filterTable(searchBox.value));
    searchBox?.addEventListener('keyup', ()=>filterTable(searchBox.value));

    // Select all
    const checkAll = $('#checkAll');
    function updateCheckAll(){
      const rows = $$('.row-check');
      const checked = rows.filter(ch=>ch.checked).length;
      checkAll.checked = checked === rows.length && rows.length>0;
    }
    checkAll?.addEventListener('change', e=>{
      $$('.row-check').forEach(ch => ch.checked = e.target.checked);
    });
    tbody.addEventListener('change', e=>{
      if(e.target.classList.contains('row-check')) updateCheckAll();
    });

    // Modal elements
    const allocModalEl = document.getElementById('allocModal');
    const allocModal = new bootstrap.Modal(allocModalEl);
    const mProg = $('#mProg'), mEmail = $('#mEmail'), mDate = $('#mDate'), mTime = $('#mTime');
    const mRoom = $('#mRoom'), mHints = $('#mHints'), mAssignBtn = $('#mAssignBtn');
    let currentRow = null;

    // Build an in-memory index of current allocations for conflict checking
    function getAllocations(){
      const list = [];
      tbody.querySelectorAll('tr').forEach(tr=>{
        const date  = tr.dataset.date;
        const start = tr.dataset.start;
        const end   = tr.dataset.end;
        const roomSpan = tr.querySelector('.room-cell');
        const roomText = roomSpan?.innerText.trim();
        const assigned = roomText && roomText !== '—' ? roomText.split(/\s+/).pop() : null;
        if(assigned){
          list.push({date, start, end, room: assigned});
        }
      });
      return list;
    }

    // Time overlap checker (HH:MM strings)
    function overlaps(aStart, aEnd, bStart, bEnd){
      return aStart < bEnd && bStart < aEnd;
    }

    function renderHints(room, rqCap, date, start, end){
      mHints.innerHTML = '';
      if(!room) return;
      const cap = parseInt(mRoom.selectedOptions[0].dataset.cap || '0', 10);
      if(cap && rqCap > cap){
        const warn = document.createElement('div');
        warn.className = 'text-danger';
        warn.textContent = `Capacity warning: requested ${rqCap} > room cap ${cap}`;
        mHints.appendChild(warn);
      }

      const conflicts = getAllocations().filter(a => a.room === room && a.date === date && overlaps(start, end, a.start, a.end));
      if(conflicts.length){
        const conf = document.createElement('div');
        conf.className = 'text-danger';
        conf.textContent = `Conflict: ${room} is already booked ${conflicts[0].start}–${conflicts[0].end} on ${date}`;
        mHints.appendChild(conf);
      } else {
        const ok = document.createElement('div');
        ok.className = 'text-success';
        ok.textContent = `Available: No conflicts detected for ${room} on ${date} (${start}–${end})`;
        mHints.appendChild(ok);
      }
    }

    // Open modal for a row
    tbody.addEventListener('click', e=>{
      if(e.target.classList.contains('btn-alloc')){
        currentRow = e.target.closest('tr');
        const prog = currentRow.dataset.prog;
        const email = currentRow.dataset.email;
        const date = currentRow.dataset.date;
        const start = currentRow.dataset.start;
        const end = currentRow.dataset.end;
        const cap = parseInt(currentRow.dataset.capacity || '0', 10);

        mProg.textContent = prog;
        mEmail.textContent = email;
        mDate.textContent = date;
        mTime.textContent = `${start}–${end}`;
        mRoom.value = '';
        mHints.innerHTML = '<span class="text-muted">Pick a room to check availability and capacity.</span>';

        mRoom.onchange = () => renderHints(mRoom.value, cap, date, start, end);

        mAssignBtn.onclick = () => {
          const room = mRoom.value;
          if(!room){ alert('Please select a room'); return; }
          // (Optional) block on hard conflict:
          // If you want to strictly block, check mHints for text-danger and stop.
          const roomCell = currentRow.querySelector('.room-cell');
          roomCell.innerHTML = `<span class="room-pill" title="${room}"></span> <span class="ms-1">${room}</span>`;
          currentRow.querySelector('.status-cell').innerHTML = '<span class="chip chip-alloc">Allocated</span>';
          allocModal.hide();
        };

        allocModal.show();
      }
    });

    // Unassign
    tbody.addEventListener('click', e=>{
      if(e.target.classList.contains('btn-unassign')){
        const tr = e.target.closest('tr');
        if(confirm('Unassign room from this program?')){
          tr.querySelector('.room-cell').innerHTML = '<span class="muted">—</span>';
          tr.querySelector('.status-cell').innerHTML = '<span class="chip chip-pending">Pending</span>';
        }
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
