<h2>Chào mừng đến với MyShop</h2>
<p>Đây là trang chủ được render theo mô hình <b>MVC</b> (không dùng class).</p>
<p>Luồng xử lý: <code>index.php</code> → <code>Controller</code> → gọi <code>Model</code> lấy dữ liệu → đẩy sang <code>View</code>.</p>
<h2 style="margin-top:25px">Sản phẩm nổi bật</h2>
<div class="product-grid">
    <?php foreach ($featured as $p): ?>
        <div class="product-card">
            <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
            <h3><?= htmlspecialchars($p['name']) ?></h3>
            <p class="price"><?= formatPrice($p['price']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
