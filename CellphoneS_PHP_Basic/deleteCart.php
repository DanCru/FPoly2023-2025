<?php
session_start();

// Kiểm tra xem sản phẩm được xóa đã được truyền qua biến GET 'id' hay không
if(isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Tìm vị trí của sản phẩm trong giỏ hàng của session
    $key = array_search($idToDelete, $_SESSION['cart']);

    // Nếu sản phẩm tồn tại trong giỏ hàng, xóa nó
    if($key !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

// Chuyển hướng người dùng trở lại trang giỏ hàng
header("Location: addCart.php");
exit();
?>
