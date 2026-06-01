<?php
require_once __DIR__ . 'Model/ProductModel.php';

function home() {
    $title = 'Trang chủ';
    $featured = getFeaturedProducts();
    require __DIR__ . 'Views/header.php';
    require __DIR__ . 'Views/home.php';
    require __DIR__ . 'Views/footer.php';
}

function product() {
    $title = 'Sản phẩm';
    $products = getAllProducts();
    require __DIR__ . 'Views/header.php';
    require __DIR__ . 'Views/product.php';
    require __DIR__ . 'Views/footer.php';
}
