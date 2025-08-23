<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa;
        }
        .card {
            max-width: 400px;
            margin: 80px auto;
            border-radius: 15px;
            padding: 20px;
        }
        .btn-action {
            background-color: #6c4cf1;
            color: white;
        }
        .btn-action:hover {
            background-color: #5338d4;
        }
    </style>
</head>
<body>
    <div class="card shadow">
        <h3 class="text-center mb-4">LOGIN</h3>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Login as</label>
                <select class="form-select" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="userid" placeholder="User ID" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <p class="text-end">
                <a href="signup.php">Create a new account</a>
            </p>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-action rounded-pill">LOGIN</button>
            </div>

        </form>
    </div>
</body>
</html>