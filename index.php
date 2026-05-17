<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="text1">Danh sách sản phẩm</h1>

    <div class="container">
        <?php
        include 'lab1-bai1.php';
        ?>
        <div class="product-list">
            <?php foreach ($product as $item) : ?>
                <div class="product-item">
                    <h2><?php echo $item['name']; ?></h2>
                    <b>Giá: $<?php echo $item['price']; ?></b>
                    <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>">
                    <h4><?php echo $item['desc']; ?></h4>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="forms-layout">
        <?php
        include 'lab1-bai2.php';
        include 'lab1-bai3.php';
        ?>
    </div>
</body>

</html>
