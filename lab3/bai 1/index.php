<?php
require_once __DIR__ . '/Controller/Controller.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        home();
        break;

    case 'product':
        product();
        break;

    default:
        http_response_code(404);
        echo "404 - Không tìm thấy trang.";
        break;
}
