<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="form-card add-product-card">
        <h2>Thêm sản phẩm</h2>
        <!-- // form nhap san pham -->
        <form class="product-form" action="xuly.php" method="post">
            <input type="hidden" name="action" value="add_product">
            <input type="hidden" name="img" value="">
            <input type="text" name="name" placeholder="Vui lòng nhập tên sản phẩm">
            <textarea name="desc" placeholder="Vui lòng nhập mô tả sản phẩm"></textarea>
            <input type="number" name="price" placeholder="Vui lòng nhập giá sản phẩm">

            <select name="type">
                <option value="laptop">Laptop</option>
                <option value="phone">Điện thoại</option>
                <option value="tablet">Máy tính bảng</option>
            </select>

            <button type="submit">Thêm sản phẩm</button>
        </form>
</div>
