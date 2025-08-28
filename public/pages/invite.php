<?php
// public/pages/invite.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Invitation | Show Event Management System</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    .page-wrap{padding:24px 28px;}
    .page-title{ text-align:center; font-weight:700; margin:12px 0 28px; }
    .page-title span{ border-bottom:3px solid #000; padding:0 10px 4px; }
    .ems-main .container-fluid{padding:24px;}

    .card-elev{border-radius:12px; box-shadow:0 3px 10px rgba(0,0,0,.08);}
    .section-title{font-weight:600; display:flex; gap:.5rem; align-items:center;}

    /* Dropzone */
    .dropzone{
      background:#e9e9e9; border-radius:8px; padding:18px; text-align:center;
      border:1px dashed #c9c9c9; cursor:pointer; position:relative;
    }
    .dropzone:hover{background:#e6e6e6;}
    .btn-purple{background:#6b5bf1; color:#fff; border:0; font-weight:600;}
    .btn-purple:hover{background:#584ae3;}
    .preview-wrap{margin-top:10px; display:none;}
    .preview-wrap img{max-width:100%; border-radius:8px;}

    /* Email pills */
    .email-pills{display:flex; flex-wrap:wrap; gap:8px; margin-top:10px;}
    .pill{
      background:#f8e7ff; color:#6b2ed6; padding:.3rem .55rem; border-radius:999px;
      display:flex; align-items:center; gap:.4rem; font-size:.9rem;
      border:1px solid #e3cfff;
    }
    .pill button{border:0; background:transparent; line-height:1; color:#6b2ed6;}
    .pill.invalid{background:#ffdede; color:#b10000; border-color:#ffc3c3;}
    .input-smx{height:36px; padding:.375rem .75rem; font-size:.9rem;}
    .toolbar{display:flex; justify-content:flex-end; margin-bottom:10px;}
    .search-input{max-width:230px;}
  </style>
</head>
<body class="with-ems-layout">

  <?php include("../../includes/header.php"); ?>
  <?php include("../../includes/sidebar.php"); ?>

  <main class="ems-main">
    <div class="container-fluid page-wrap">

      <h1 class="page-title"><span>Invitation</span></h1>

      <div class="toolbar">
        <div class="input-group input-group-sm search-input">
          <input type="text" class="form-control" placeholder="Search">
          <button class="btn btn-outline-secondary" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>

      <div class="card card-elev">
        <div class="card-body">
          <div class="section-title mb-1">
            <i class="bi bi-envelope-paper"></i>
            Invitation
          </div>
          <div class="text-muted mb-3" style="font-size:.9rem;">Invite people into the event</div>

          <!-- Import image -->
          <label class="dropzone w-100" id="dropzone">
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-purple px-4" id="btnPick">Import</button>
            </div>
            <input type="file" id="imageInput" accept="image/*" hidden>
            <div class="preview-wrap" id="previewWrap">
              <div class="text-muted small mt-2">Selected image preview</div>
              <img id="imgPreview" alt="Program image preview">
            </div>
          </label>

          <!-- Email invite -->
          <div class="mt-4">
            <div class="text-muted mb-1" style="font-size:.9rem;">Invite people using email</div>
            <div class="d-flex gap-2 align-items-center">
              <input id="emailInput" type="text" class="form-control input-smx"
                     placeholder="Type email(s). Use comma or space to separate" />
              <button id="btnAddEmail" type="button" class="btn btn-outline-dark btn-sm">Add people</button>
            </div>
            <div id="emailPills" class="email-pills"></div>
          </div>

          <!-- Optional group name (kept minimal; can ignore if you want only email) -->
          <div class="mt-4">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-plus"></i></span>
              <input id="groupName" type="text" class="form-control" placeholder="Create a group (optional)">
            </div>
          </div>

          <div class="d-flex justify-content-end mt-4">
            <button id="btnSend" class="btn btn-purple px-4" disabled>Send</button>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script>
    // ===== Image import (click or drag & drop) =====
    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('imageInput');
    const btnPick = document.getElementById('btnPick');
    const previewWrap = document.getElementById('previewWrap');
    const imgPreview = document.getElementById('imgPreview');

    function setPreview(file){
      if(!file || !file.type.startsWith('image/')) return;
      const reader = new FileReader();
      reader.onload = e => {
        imgPreview.src = e.target.result;
        previewWrap.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }

    btnPick.addEventListener('click', ()=> imageInput.click());
    imageInput.addEventListener('change', (e)=> setPreview(e.target.files[0]));

    ;['dragover','drop'].forEach(ev=>{
      dropzone.addEventListener(ev, (e)=>{
        e.preventDefault();
        if(ev === 'drop'){
          const file = e.dataTransfer.files?.[0];
          if(file) setPreview(file);
        }
      });
    });

    // ===== Email invite (chips) =====
    const emailInput = document.getElementById('emailInput');
    const btnAddEmail = document.getElementById('btnAddEmail');
    const emailPills = document.getElementById('emailPills');
    const btnSend = document.getElementById('btnSend');

    let emails = []; // valid list

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function renderPills() {
      emailPills.innerHTML = '';
      emails.forEach((em, idx) => {
        const pill = document.createElement('span');
        pill.className = 'pill';
        pill.innerHTML = `${em} <button type="button" aria-label="remove">&times;</button>`;
        pill.querySelector('button').addEventListener('click', ()=>{
          emails.splice(idx,1);
          renderPills();
        });
        emailPills.appendChild(pill);
      });
      btnSend.disabled = emails.length === 0;
    }

    function addEmailsFromInput() {
      const raw = emailInput.value.trim();
      if(!raw) return;
      const parts = raw.split(/[,\s]+/).filter(Boolean);
      parts.forEach(p => {
        const em = p.toLowerCase();
        if(emailRegex.test(em) && !emails.includes(em)) emails.push(em);
        else {
          // show invalid pill feedback
          const pill = document.createElement('span');
          pill.className = 'pill invalid';
          pill.textContent = p;
          emailPills.appendChild(pill);
          setTimeout(()=> pill.remove(), 1500);
        }
      });
      emailInput.value = '';
      renderPills();
    }

    btnAddEmail.addEventListener('click', addEmailsFromInput);
    emailInput.addEventListener('keydown', (e)=>{
      if(e.key === 'Enter'){ e.preventDefault(); addEmailsFromInput(); }
    });

    // ===== Send (demo only) =====
    btnSend.addEventListener('click', ()=>{
      const group = document.getElementById('groupName').value.trim();
      const imgChosen = !!imgPreview.src;
      alert(
`Sending invitations…
Emails: ${emails.join(', ')}
Group: ${group || '(none)'}
Image selected: ${imgChosen ? 'Yes' : 'No'}

(Backend wiring pending)`
      );
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
