<?php
require_once __DIR__ . '/../Model/ProductModel.php';
class Controller
{
    @param string $view
    @param array  $data
    protected function render($view, $data = [])
    {
        extract($data);

        require __DIR__ . '/../Views/header.php';
        require __DIR__ . '/../Views/' . $view . '.php';
        require __DIR__ . '/../Views/footer.php';
    }
}
class HomeController extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $featured = $model->getFeatured();

        $this->render('home', [
            'title'    => 'Trang chủ',
            'featured' => $featured,
        ]);
    }
}

class ProductController extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $products = $model->getAll();

        $this->render('product', [
            'title'    => 'Sản phẩm',
            'products' => $products,
        ]);
    }
}
