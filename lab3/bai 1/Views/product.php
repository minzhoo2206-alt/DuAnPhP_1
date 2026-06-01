<h2>Danh sách sản phẩm</h2>
<p>Tổng cộng <b><?= count($products) ?></b> sản phẩm.</p>

<div class="product-grid">
    <?php foreach ($products as $p): ?>
        <div class="product-card">
            <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
            <h3><?= htmlspecialchars($p['name']) ?></h3>
            <p class="price"><?= formatPrice($p['price']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
