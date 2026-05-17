<?php

session_start();

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    header('Location: home.php');
    exit;
}

$error = '';

function kiemTraTaiKhoan($username, $password) {
    $danhSachTaiKhoan = [
        ['username' => 'admin',  'password' => '123456'],
        ['username' => 'nguyen', 'password' => 'abc123'],
    ];

    foreach ($danhSachTaiKhoan as $taiKhoan) {
        if ($taiKhoan['username'] === $username && $taiKhoan['password'] === $password) {
            return true;
        }
    }
    return false;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Vui lòng nhập đầy đủ thông tin!';

    } elseif (kiemTraTaiKhoan($username, $password)) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['username']     = $username;
        header('Location: home.php');
        exit;

    } else {
        $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
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
            padding: 42px 38px; width: 100%; max-width: 400px;
        }
        h2 { text-align: center; color: #1a3c6e; margin-bottom: 28px; font-size: 1.4rem; }
        label { display: block; font-size: .85rem; color: #555;
                margin: 14px 0 5px; font-weight: 600; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid #ddd; border-radius: 8px;
            font-size: .95rem; transition: border .2s;
        }
        input:focus { outline: none; border-color: #1a3c6e; }
        .btn {
            width: 100%; margin-top: 24px; padding: 11px;
            background: #1a3c6e; color: #fff; border: none;
            border-radius: 8px; font-size: 1rem; font-weight: 700; cursor: pointer;
        }
        .btn:hover { background: #245299; }
        .error {
            background: #fdecea; color: #c0392b;
            border: 1px solid #f5c6cb;
            padding: 10px 14px; border-radius: 8px;
            font-size: .88rem; margin-bottom: 12px; text-align: center;
        }
        .hint { margin-top: 16px; font-size: .78rem; color: #aaa; text-align: center; line-height: 1.8; }
    </style>
</head>
<body>
<div class="card">
    <h2>Đăng Nhập</h2>

    <?php if (!empty($error)): ?>
        <div class="error">❌ <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">

        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="username"
               placeholder="Nhập username..."
               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password"
               placeholder="Nhập mật khẩu...">

        <button type="submit" class="btn">Đăng Nhập →</button>
    </form>
</div>
</body>
</html>