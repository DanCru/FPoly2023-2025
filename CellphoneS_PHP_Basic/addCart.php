<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem đã có session giỏ hàng hay chưa
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Lấy thông tin sản phẩm từ URL và thêm vào giỏ hàng nếu id không rỗng
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id !== null) {
    // Thêm id sản phẩm vào giỏ hàng
    $_SESSION['cart'][] = $id;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/content.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/system.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
    <link rel="manifest" href="./favicon_io/site.webmanifest">
</head>
<body>
    <?php include "header2.php"?>
    <?php include "database.php"?>
    <h1 align="center">GIỎ HÀNG</h1>
    <div class="container">
        <table class="san_pham">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Ngày mua</th>
                    <th>Giá</th>
                    <th height="30px">Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                // Lặp qua danh sách sản phẩm trong giỏ hàng và hiển thị chúng
                foreach($_SESSION['cart'] as $productId):
                    // Truy vấn thông tin sản phẩm từ cơ sở dữ liệu dựa trên id
                    $sql_select = "SELECT * FROM san_pham WHERE id = '$productId'";
                    $result = mysqli_query($conn, $sql_select);
                    $cart = mysqli_fetch_assoc($result);
                ?>
                <tr>
                    <td width="50px"><?= $cart['id'] ?></td>
                    <td width="100px"><?= $cart['ma_sp'] ?></td>
                    <td width=""><?= $cart['ten_sp'] ?></td>
                    <td width="120px"><?= $cart['ngay_mua'] ?></td>
                    <td width="100px"><?= $cart['gia'] ?></td>
                    <td width="120px"><?php echo '<img width="100px" height="100px" src="' . $cart['hinh_anh'] .'">'; ?></td>
                    <td width="50px">
                        <div class="logout">
                            <button>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="deleteCart.php?id=<?= $cart['id'] ?>">Xóa</a>
                            </button>
                            <button><a href="products.php">Quay lai</a></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mua">
            <button><a href="">Mua</a></button>
        </div>
    </div>
    
    
    <div class="clear"></div>
    <?php include "footer.php"?>

</body>
</html>
