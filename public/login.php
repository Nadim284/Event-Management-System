<?php
// If form is submitted, redirect to dashboard
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .card {
            max-width: 400px;
            width: 100%;
            border-radius: 15px;
            padding: 25px;
        }
        .btn-action {
            background-color: #6c4cf1;
            color: white;
            border-radius: 25px;
        }
        .btn-action:hover {
            background-color: #5338d4;
        }
    </style>
</head>
<body>
    <div class="card shadow">
        <h3 class="text-center mb-4">LOGIN</h3>
        <form method="POST">
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
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-action">LOGIN</button>
            </div>
            <p class="text-center">
                <a href="signup.php">Create a new account</a>
            </p>
        </form>
    </div>
</body>
</html>
