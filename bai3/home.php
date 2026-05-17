<?php

session_start();

function daDangNhap() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}


if (!daDangNhap()) {
    header('Location: login.php');
    exit;
}

$tenUser = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang Chủ</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f7;
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
        }
        .card {
            background: #fff; border-radius: 14px;
            box-shadow: 0 6px 24px rgba(0,0,0,.1);
            padding: 48px 40px; width: 100%; max-width: 460px;
            text-align: center;
        }
        .avatar { font-size: 3.5rem; margin-bottom: 16px; }
        h2 { color: #1a3c6e; font-size: 1.5rem; margin-bottom: 8px; }
        .sub { color: #888; font-size: .95rem; margin-bottom: 30px; }
        .info-box {
            background: #f4f7fb; border: 1px solid #dde4ef;
            border-radius: 10px; padding: 16px 20px;
            text-align: left; margin-bottom: 28px;
            font-size: .9rem; color: #444; line-height: 2;
        }
        .info-box strong { color: #1a3c6e; }
        .btn-logout {
            display: inline-block; padding: 11px 32px;
            background: #e74c3c; color: #fff; border-radius: 8px;
            text-decoration: none; font-weight: 700; font-size: .95rem;
        }
        .btn-logout:hover { background: #c0392b; }
    </style>
</head>
<body>
<div class="card">
    <div class="avatar"></div>

    <h2>Xin chào, <?= htmlspecialchars($tenUser) ?>!</h2>
    <p class="sub">Bạn đã đăng nhập thành công vào hệ thống.</p>

    <div class="info-box">
        <strong>Tên đăng nhập:</strong> <?= htmlspecialchars($_SESSION['username']) ?><br>
        <strong>Trạng thái:</strong> Đã đăng nhập<br>
        <strong>Session ID:</strong> <?= session_id() ?>
    </div>

    <a href="logout.php" class="btn-logout">Đăng Xuất</a>
</div>
</body>
</html>