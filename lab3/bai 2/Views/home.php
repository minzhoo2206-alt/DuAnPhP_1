<h2>Chào mừng đến với MyShop</h2>
<p>Trang chủ render bởi <code>HomeController::index()</code>.</p>
<p>Luồng: <code>index.php</code> tạo <code>HomeController</code> gọi <code>$model = new ProductModel()</code> render view.</p>

<h2 style="margin-top:25px">Sản phẩm nổi bật</h2>
<div class="product-grid">
    <?php foreach ($featured as $p): ?>
        <div class="product-card">
            <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
            <h3><?= htmlspecialchars($p['name']) ?></h3>
            <p class="price"><?= ProductModel::formatPrice($p['price']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
