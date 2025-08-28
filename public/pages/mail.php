<?php
// public/pages/mail.php
include_once __DIR__ . "/../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mail | Show Event Management System</title>

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
    .table td, .table th{vertical-align:middle;}
    .table-wrap{border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;}
    .table-wrap .table{margin:0;}
    .col-actions{width:56px;}
    .badge-chip{font-size:.75rem; border-radius:10px; padding:.25rem .5rem; background:#f8e7ff; color:#a128e6;}
    .badge-chip.gray{ background:#eee; color:#444; }
    .ems-main .container-fluid{padding:24px;}
    .row-click{cursor:pointer;}
  </style>
</head>
<body class="with-ems-layout">

  <?php include("../../includes/header.php"); ?>
  <?php include("../../includes/sidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid page-wrap">

      <h1 class="page-title"><span>mail</span></h1>

      <div class="toolbar">
        <div class="input-group input-group-sm search-input">
          <input id="searchBox" type="text" class="form-control" placeholder="Search Mail">
          <button class="btn btn-outline-secondary" id="btnSearch" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>

      <div class="table-wrap card-elev">
        <table class="table table-hover align-middle" id="mailTable">
          <thead class="table-light">
            <tr>
              <th>Email</th>
              <th>Subject</th>
              <th>Date</th>
              <th class="col-actions text-center"><i class="bi bi-three-dots"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $mails = [
                ["email"=>"Email1@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"21/09/2025","from"=>"Sender One","to"=>"Receiver A","body"=>"Sir,\nPermission letter for our upcoming event.\nThank you,\nSender One"],
                ["email"=>"Email2@gmail.com","subject"=>"Room allocated","tag"=>"room","date"=>"21/09/2025","from"=>"Admin Office","to"=>"Organizer Team","body"=>"Room 102 has been allocated for the program."],
                ["email"=>"Email3@gmail.com","subject"=>"Event joined","tag"=>"joined","date"=>"21/09/2025","from"=>"Member Rahim","to"=>"Youth Team","body"=>"I have joined as a volunteer for the event."],
                ["email"=>"Email4@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"22/09/2025","from"=>"Sender Two","to"=>"Receiver B","body"=>"Request for event organization permission letter."],
                ["email"=>"Email5@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"22/09/2025","from"=>"Sender Three","to"=>"Receiver C","body"=>"Details about the event schedule and tasks."],
                ["email"=>"Email6@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"22/09/2025","from"=>"Sender Four","to"=>"Receiver D","body"=>"Please confirm the list of invitees."],
                ["email"=>"Email7@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"22/09/2025","from"=>"Sender Five","to"=>"Receiver E","body"=>"Sharing the draft of permission letter for review."],
                ["email"=>"Email8@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"23/09/2025","from"=>"Sender Six","to"=>"Receiver F","body"=>"Kindly approve the budget for decorations."],
                ["email"=>"Email9@gmail.com","subject"=>"Event organization","tag"=>"event","date"=>"23/09/2025","from"=>"Sender Seven","to"=>"Receiver G","body"=>"Final checklist attached."],
              ];

              foreach($mails as $m){
                $tagClass = $m["tag"] === "event" ? "badge-chip" : "badge-chip gray";
                echo '<tr class="row-click" '.
                       'data-from="'.htmlspecialchars($m["from"]).'" '.
                       'data-to="'.htmlspecialchars($m["to"]).'" '.
                       'data-subject="'.htmlspecialchars($m["subject"]).'" '.
                       'data-body="'.htmlspecialchars($m["body"]).'" '.
                     '>'.
                      '<td>'.htmlspecialchars($m["email"]).'</td>'.
                      '<td><span class="'.$tagClass.'">'.htmlspecialchars($m["subject"]).'</span></td>'.
                      '<td>'.htmlspecialchars($m["date"]).'</td>'.
                      '<td class="text-center">'.
                        '<button class="btn btn-sm btn-link p-0 view-btn" title="View"><i class="bi bi-eye"></i></button>'.
                      '</td>'.
                    '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </main>

  <!-- Preview Modal -->
  <div class="modal fade" id="mailPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius:12px;">
        <div class="modal-body">
          <div class="text-center fw-bold mb-3">Show Event Management System</div>
          <div class="text-center mb-4"><span style="border-bottom:3px solid #000; padding:0 10px 4px;">mail</span></div>

          <div class="p-4" style="background:#e9e9e9; border-radius:6px;">
            <p class="mb-1"><strong>From :</strong> <span id="pvFrom"></span></p>
            <p class="mb-3"><strong>To :</strong> <span id="pvTo"></span></p>
            <p class="mb-3"><strong>Subject :</strong> <span id="pvSubject"></span></p>
            <pre id="pvBody" class="mb-0" style="white-space:pre-wrap; font-family:inherit;"></pre>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // helpers
    const $ = s => document.querySelector(s);
    const tbody = document.querySelector('#mailTable tbody');

    // search
    const searchBox = $('#searchBox');
    function filterTable(q){
      tbody.querySelectorAll('tr').forEach(tr => {
        const text = tr.innerText.toLowerCase();
        tr.style.display = text.includes(q.toLowerCase()) ? '' : 'none';
      });
    }
    document.getElementById('btnSearch')?.addEventListener('click', ()=>filterTable(searchBox.value));
    searchBox?.addEventListener('keyup', ()=>filterTable(searchBox.value));

    // preview (row click or eye button)
    function openPreview(tr){
      const from = tr.dataset.from || '';
      const to   = tr.dataset.to || '';
      const subj = tr.dataset.subject || '';
      const body = tr.dataset.body || '';

      document.getElementById('pvFrom').textContent = from;
      document.getElementById('pvTo').textContent = to;
      document.getElementById('pvSubject').textContent = subj;
      document.getElementById('pvBody').textContent = body;

      const modal = new bootstrap.Modal(document.getElementById('mailPreview'));
      modal.show();
    }

    tbody.addEventListener('click', e=>{
      const tr = e.target.closest('tr');
      if(!tr) return;
      if(e.target.closest('.view-btn') || tr){ openPreview(tr); }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
