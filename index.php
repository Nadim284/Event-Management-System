<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c4cf1, #00c6ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .welcome-box {
            background: #fff;
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            max-width: 1000px;   /* increased width */
            width: 90%;          /* responsive */
        }
        .welcome-box h1 {
            font-weight: 700;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 2.5rem;
        }
        .welcome-box p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
        }
        .btn-custom {
            background-color: #6c4cf1;
            color: #fff;
            border-radius: 30px;
            padding: 12px 40px;
            font-size: 1.1rem;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #5338d4;
            color: #fff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="welcome-box">
        <h1>Show Event Management System</h1>
        <p>Welcome! Manage and explore your events with ease.  
           Simple, modern and efficient event handling platform.</p>
        <a href="public/login.php" class="btn btn-custom">Start Now</a>
    </div>

</body>
</html>
