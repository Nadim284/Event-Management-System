<?php

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 450px;
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
        <h3 class="text-center mb-4">Sign-Up</h3>
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Account Type</label>
                <select class="form-select" name="account_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="userid" placeholder="User ID" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="User Name" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-action">Create Account</button>
            </div>
            <p class="text-center">
                <a href="login.php">Login</a>
            </p>
        </form>
    </div>
</body>
</html>
