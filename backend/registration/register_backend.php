<?php
require __DIR__ . '/db.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn->set_charset('utf8mb4');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type      = trim($_POST['type']      ?? '');
    $user_id   = trim($_POST['user_id']   ?? '');
    $user_name = trim($_POST['user_name'] ?? '');
    $password  = trim($_POST['password']  ?? '');

    if ($type === '' || $user_id === '' || $user_name === '' || $password === '') {
        exit('⚠️ All fields are required.');
    }
    if (!ctype_digit($user_id)) {
        exit('⚠️ user_id must be an integer.');
    }
    $user_id = (int)$user_id;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare('INSERT INTO users (type, user_id, user_name, password) VALUES (?,?,?,?)');
        $stmt->bind_param('siss', $type, $user_id, $user_name, $hash);
        $stmt->execute();

        // ✅ Show success message and redirect with JavaScript
        echo "<div style='text-align:center; margin-top:50px; font-family:Arial;'>
                <h2 style='color:green;'>✅ Registration Successful!</h2>
                <p>You will be redirected to your dashboard in 2 seconds...</p>
              </div>";
        echo "<script>
                setTimeout(function() {
                  window.location.href = '/EVENT-MANAGEMENT-SYSTEM/userDashboard/home.php?user_id={$user_id}';
                }, 2000);
              </script>";
        exit;

    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            exit('❌ This user_id already exists!');
        } else {
            exit('⚠️ DB Error ['.$e->getCode().']: '.$e->getMessage());
        }
    } finally {
        if (isset($stmt)) $stmt->close();
        $conn->close();
    }
}
