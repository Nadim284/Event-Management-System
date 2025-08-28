<?php
// public/deshbroad.php
?>
<?php include_once __DIR__ . "/config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body class="with-ems-layout">
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/sidebar.php"); ?>


  <main class="ems-main">
    <div class="container-fluid">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h2 class="h4 mb-3">Dashboard</h2>
          <p>Welcome to the dashboard.</p>
        </div>
      </div>
    </div>
  </main>

  <script> 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  </script>
</body>
</html>
