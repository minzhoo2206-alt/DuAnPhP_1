<?php
$products = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = $_POST['name']        ?? '';
    $description = $_POST['description'] ?? '';
    $price       = $_POST['price']       ?? '';

    $error = '';
    if (empty($name)) {
        $error = 'Vui lòng nhập tên sản phẩm!';
    } elseif (empty($price) || !is_numeric($price) || $price < 0) {
        $error = 'Vui lòng nhập giá hợp lệ!';
    }

    if (empty($error)) {
        $products[] = [
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
        ];
        $success = 'Thêm sản phẩm "' . htmlspecialchars($name) . '" thành công!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tạo Sản Phẩm</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            padding: 40px 16px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,.1);
            padding: 32px 36px;
            width: 100%;
            max-width: 520px;
        }
        h2 {
            color: #2d6cdf;
            margin-bottom: 24px;
            font-size: 1.4rem;
        }
        label {
            display: block;
            font-size: .85rem;
            color: #555;
            margin-bottom: 4px;
            margin-top: 16px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: .95rem;
            transition: border .2s;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #2d6cdf;
        }
        textarea { resize: vertical; height: 80px; }
        .btn-row { display: flex; gap: 10px; margin-top: 24px; }
        .btn {
            padding: 9px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: .95rem;
            font-weight: 600;
        }
        .btn-save  { background: #2d6cdf; color: #fff; }
        .btn-save:hover { background: #1a52b8; }
        .btn-back  { background: #e0e0e0; color: #333; text-decoration: none; display: inline-flex; align-items: center; }
        .btn-back:hover { background: #c8c8c8; }
        .alert {
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: .9rem;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error   { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        /* Bảng hiển thị sản phẩm đã lưu */
        table { width: 100%; border-collapse: collapse; margin-top: 28px; }
        th, td { text-align: left; padding: 9px 12px; border-bottom: 1px solid #eee; font-size: .9rem; }
        th { background: #f5f7ff; color: #2d6cdf; }
        .comment { color: #888; font-size: .82rem; }
    </style>
</head>
<body>
<div class="card">
    <h2>Tạo Sản Phẩm</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">

        <label for="name">Tên sản phẩm</label>
        <input type="text" id="name" name="name"
               placeholder="Ninja Sticker"
               value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">

        <label for="description">Mô tả</label>
        <textarea id="description" name="description"
                  placeholder="The best Ninja Sticker in the world"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>

        <label for="price">Giá (VNĐ)</label>
        <input type="number" id="price" name="price"
               placeholder="9.99" min="0" step="0.01"
               value="<?= htmlspecialchars($_POST['price'] ?? '') ?>">

        <div class="btn-row">
            <button type="submit" class="btn btn-save">💾 Lưu</button>
            <a href="" class="btn btn-back">🔄 Nhập mới</a>
        </div>
    </form>

    <?php if (!empty($products)): ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= number_format($p['price'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="comment">123</p>
    <?php endif; ?>
</div>
</body>
</html>