<?php
require_once __DIR__ . '/Controller/Controller.php';

$routes = [
    'home'    => 'HomeController',
    'product' => 'ProductController',
];

$key = $_GET['controller'] ?? 'home';
if (!isset($routes[$key])) {
    http_response_code(404);
    echo "404 - Không tìm thấy trang.";
    exit;
}

$className = $routes[$key];
$controller = new $className();
$controller->index();
