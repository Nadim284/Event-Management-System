<!-- public/pages/signup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign-Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#fafafa; display:flex; align-items:center; justify-content:center; height:100vh; font-family:Arial,sans-serif; }
    .card { max-width:400px; width:100%; border-radius:15px; padding:25px; }
    .btn-action { background:#6c4cf1; color:#fff; border-radius:25px; }
    .btn-action:hover { background:#5338d4; }
  </style>
</head>
<body>
  <div class="card shadow">
    <h3 class="text-center mb-4">Sign-Up</h3>

    <!-- FIXED: one <form>, correct action path from public/pages/ → backend/registration/ -->
    <form action="/EVENT-MANAGEMENT-SYSTEM/backend/registration/register_backend.php" method="post">
      <div class="mb-3">
        <label class="form-label">Account Type</label>
        <!-- FIXED: name="type" to match backend -->
        <select class="form-select" name="type" required>
          <option value="user">user</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- FIXED: names match backend: user_id, user_name, password -->
      <div class="mb-3">
        <input type="number" class="form-control" name="user_id" placeholder="User ID" required>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="user_name" placeholder="User Name" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-action">Create Account</button>
      </div>

      <p class="text-center">
        Already have an account? <a href="login.php">Login</a>
      </p>
    </form>
  </div>
</body>
</html>
