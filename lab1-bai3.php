<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="form-card auth-card">
    <?php if (!empty($_SESSION['is_logged_in'])) : ?>
        <h2>Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <p class="auth-message">Bạn đang đăng nhập vào hệ thống.</p>

        <form class="logout-form" action="xuly.php" method="POST">
            <input type="hidden" name="action" value="logout">
            <button type="submit">Đăng xuất</button>
        </form>
    <?php else : ?>
        <h2>Đăng nhập</h2>

        <form class="login-form" action="xuly.php" method="POST">
            <input type="hidden" name="action" value="login">

            <label>Tên đăng nhập:</label>
            <input type="text" name="username" placeholder="Tên đăng nhập">

            <label>Mật khẩu:</label>
            <input type="password" name="password" placeholder="Mật khẩu">

            <button type="submit">Đăng nhập</button>
        </form>
    <?php endif; ?>
</div>
