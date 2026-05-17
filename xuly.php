<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

// Nếu chưa có mảng sản phẩm trong session thì khởi tạo
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if (!empty($_POST['action'])) {
    switch ($_POST['action']) {
        // Xử lý thêm sản phẩm
        case "add_product":
            $tenSP = trim($_POST['name']);
            $moTa = trim($_POST['desc']);
            $gia = trim($_POST['price']);
            $loai = trim($_POST['type']);
            $img = trim($_POST['img']); // link ảnh sản phẩm

            if ($tenSP !== "") {
                $_SESSION['products'][] = [
                    "name" => $tenSP,
                    "price" => $gia,
                    "img" => $img,
                    "desc" => $moTa,
                    "type" => $loai
                ];
            }
            // Quay lại trang nhập sản phẩm
            header("Location: index.php");
            break;
    }
}

// đăng nhập
if (!empty($_POST['action']) && $_POST['action'] === "login") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kiểm tra tài khoản mẫu
    if ($username === "admin" && $password === "123456") {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        echo "<h3>Đăng nhập thất bại!</h3>";
        echo '<a href="login.php">Thử lại</a>';
    }
}

if (!empty($_POST['action']) && $_POST['action'] === "logout") {
    unset($_SESSION['is_logged_in'], $_SESSION['username']);
    header("Location: index.php");
    exit;
}
