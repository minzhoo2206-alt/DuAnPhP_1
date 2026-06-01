<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Website') ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        header { background: #34495e; color: #fff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        header h1 { font-size: 22px; }
        nav a { color: #fff; text-decoration: none; margin-left: 20px; padding: 6px 12px; border-radius: 4px; }
        nav a:hover, nav a.active { background: #e67e22; }
        main { max-width: 1100px; margin: 20px auto; background: #fff; padding: 25px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,.08); }
        footer { text-align: center; padding: 15px; color: #777; margin-top: 20px; font-size: 14px; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-top: 15px; }
        .product-card { border: 1px solid #eee; border-radius: 6px; padding: 12px; text-align: center; transition: .2s; }
        .product-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,.1); transform: translateY(-2px); }
        .product-card img { width: 100%; height: 160px; object-fit: cover; border-radius: 4px; }
        .product-card h3 { margin: 10px 0 5px; font-size: 16px; }
        .price { color: #e74c3c; font-weight: bold; }
        h2 { color: #2c3e50; border-bottom: 2px solid #e67e22; padding-bottom: 8px; margin-bottom: 15px; }
        .badge { display: inline-block; background: #e67e22; color: #fff; padding: 2px 10px; border-radius: 10px; font-size: 12px; margin-left: 8px; }
    </style>
</head>
<body>
<header>
    <h1>MyShop <span class="badge">OOP</span></h1>
    <nav>
        <?php $current = $_GET['controller'] ?? 'home'; ?>
        <a href="index.php?controller=home"    class="<?= $current === 'home'    ? 'active' : '' ?>">Trang chủ</a>
        <a href="index.php?controller=product" class="<?= $current === 'product' ? 'active' : '' ?>">Sản phẩm</a>
    </nav>
</header>
<main>
