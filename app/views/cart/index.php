<?php
include_once 'app/views/share/header.php';

// Kiểm tra xem session cart có tồn tại không
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Giỏ hàng trống!";
} else {
    // Hiển thị danh sách sản phẩm trong giỏ hàng
    echo "<h2>Danh sách giỏ hàng</h2>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li class='m-3'>$item->id - $item->name - 
            <form method='post' action='/chieu2/cart/updateQuality/$item->id'>
                <input name='quality' type='number' value=".$item->quantity."         />
                <input type='submit' value='update' class='btn btn-info' />
            </form>
            </li>";
    }
    echo "</ul>";

    // Hiển thị nút Checkout
    echo "<form action='checkout.php' method='post'>";
    echo "<input type='submit' value='Checkout'>";
    echo "</form>";
}


include_once 'app/views/share/footer.php';
?>
