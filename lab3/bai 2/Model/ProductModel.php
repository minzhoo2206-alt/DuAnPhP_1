<?php
class ProductModel
{
    private $products = [
        ['id' => 1, 'name' => 'iPhone 15',   'price' => 25000000, 'image' => 'https://cdn.tgdd.vn/Products/Images/42/303891/iphone-15-plus-128gb-den-thumb-600x600.jpg'],
        ['id' => 2, 'name' => 'Samsung S24', 'price' => 22000000, 'image' => 'https://cdn.tgdd.vn/Products/Images/42/319665/samsung-galaxy-s24-256gb-5g-thumb-600x600.jpg'],
        ['id' => 3, 'name' => 'Xiaomi 14',   'price' => 15000000, 'image' => 'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/42/332938/xiaomi-redmi-note-14-pro-5g-tim-1-638726321720654152-750x500.jpg'],
        ['id' => 4, 'name' => 'Oppo Find X7','price' => 18000000, 'image' => 'https://cdn.tgdd.vn/Products/Images/42/309849/oppo-find-x7-600x600.jpg'],
    ];
    public function getAll()
    {
        return $this->products;
    }
    public function getFeatured()
    {
        return array_slice($this->products, 0, 2);
    }
    public static function formatPrice($price)
    {
        return number_format($price, 0, ',', '.') . ' đ';
    }
}
