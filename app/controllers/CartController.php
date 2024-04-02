<?php
class CartController{

    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function AddToCart($id) {
        // Khởi tạo một phiên cart nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Lấy sản phẩm từ ProductModel bằng $id
        $product = $this->productModel->getProductById($id);

        // Nếu sản phẩm tồn tại, thêm vào giỏ hàng
        if ($product) {
            // Thêm sản phẩm vào session cart
            $_SESSION['cart'][] = $product;
            
            include_once 'app/views/';
            
        } else {
            echo "Không tìm thấy sản phẩm với ID này!";
        }
    }
}