<?php

session_start();
$users = [
    ['username' => 'admin',   'password' => '123456'],
    ['username' => 'nguyen',  'password' => 'abc123'],
];

$error   = '';
$success = '';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!';
    } else {
        $found = false;
        foreach ($users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                $found = true;
                break;
            }
        }

        if ($found) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username']  = $username;
            $success = 'Đăng nhập thành công! Xin chào, ' . htmlspecialchars($username) . '!';
        } else {
            $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
        }
    }
}

$isLoggedIn = $_SESSION['logged_in'] ?? false;
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
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 32px rgba(0,0,0,.3);
            padding: 40px 36px;
            width: 100%;
            max-width: 400px;
        }
        .logo {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 6px;
        }
        h2 {
            text-align: center;
            color: #1a1a2e;
            margin-bottom: 28px;
            font-size: 1.3rem;
        }
        label {
            display: block;
            font-size: .85rem;
            color: #555;
            margin-bottom: 5px;
            margin-top: 16px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: .95rem;
            transition: border .2s, box-shadow .2s;
        }
        input:focus {
            outline: none;
            border-color: #0f3460;
            box-shadow: 0 0 0 3px rgba(15,52,96,.12);
        }
        .btn-login {
            width: 100%;
            margin-top: 24px;
            padding: 11px;
            background: #0f3460;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: .5px;
            transition: background .2s;
        }
        .btn-login:hover { background: #1a52b8; }
        .alert {
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 12px;
            font-size: .88rem;
            text-align: center;
        }
        .alert-error   { background: #fdecea; color: #c0392b; border: 1px solid #f5c6cb; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .hint {
            margin-top: 18px;
            font-size: .78rem;
            color: #999;
            text-align: center;
            line-height: 1.6;
        }
        .welcome-box {
            text-align: center;
        }
        .welcome-box .avatar {
            font-size: 4rem;
            margin-bottom: 10px;
        }
        .welcome-box h3 {
            color: #0f3460;
            font-size: 1.2rem;
            margin-bottom: 6px;
        }
        .welcome-box p {
            color: #666;
            font-size: .9rem;
            margin-bottom: 20px;
        }
        .btn-logout {
            padding: 9px 24px;
            background: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: .9rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        .btn-logout:hover { background: #c0392b; }
    </style>
</head>
<body>
<div class="card">

    <?php if ($isLoggedIn): ?>
        <div class="welcome-box">
            <div class="avatar">👤</div>
            <h3>Xin chào, <?= htmlspecialchars($_SESSION['username']) ?>!</h3>
            <p>Bạn đã đăng nhập thành công vào hệ thống.</p>
            <a href="?logout=1" class="btn-logout">🚪 Đăng xuất</a>
        </div>

    <?php else: ?>
        <div class="logo">🔐</div>
        <h2>Đăng Nhập</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-error">❌ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success">✅ <?= $success ?></div>
        <?php endif; ?>

        <form method="POST" action="">

            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username"
                   placeholder="Nhập username..."
                   value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password"
                   placeholder="Nhập mật khẩu...">

            <button type="submit" class="btn-login">Đăng Nhập →</button>
        </form>
    <?php endif; ?>

</div>
</body>
</html>