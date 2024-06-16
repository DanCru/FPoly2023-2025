<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
        include "header2.php";
        include "database.php";

        $sql = "SELECT *FROM san_pham";
        $result = mysqli_query($conn, $sql);
        $sanPham = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <div class="container">
        <h1 align="center" style="margin: 30px 0;">DANH MỤC SẢN PHẨM</h1>
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
                <?php foreach($sanPham as $sp):?>
                    <tr>
                        <td width="50px"><?= $sp['id'] ?></td>
                        <td width="130px"><?= $sp['ma_sp'] ?></td>
                        <td width=""><?= $sp['ten_sp'] ?></td>
                        <td width="120px"><?= $sp['ngay_mua'] ?></td>
                        <td width="100px"><?= $sp['gia'] ?></td>
                        <!-- <td width="300px" height="200px"><?= $sp['hinh_anh'] ?></td> -->
                        <td width="150px" height="140px"><?php echo '<img  width="100px" height="100px" src="' . $sp['hinh_anh'] .'">'; ?></td>
                        <td width="50px">
                            <div class="logout">
                                <button>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="delete.php?id=<?= $sp['id'] ?>">Xóa<i class="fa-solid fa-trash"></i></a>
                                </button>
                                <button><a href="addCart.php?id=<?= $sp['id'] ?>">Thêm vào giỏ hàng</a></button>
                            </div>
                        </td>
                        
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    




    <div class="clear"></div>
    <?php include "footer.php"?>
</body>
</html>