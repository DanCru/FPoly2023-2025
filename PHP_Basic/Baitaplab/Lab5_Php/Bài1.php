<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Bài 1 -->
    <h2>Form thêm sản phẩm</h2>
    <?php 
        $result = '';
        if(isset($_POST['confirm1'])) {
            $result = "Xác nhận thêm sản phẩm thành công!<br>" .
             "Tên sản phẩm: ".$_POST['ten_sp']."<br>" .
             "Tên sản phẩm: ".$_POST['ma_sp']."<br>".
             "Tên sản phẩm: ".$_POST['so_luong'];
        }
    ?>
    <form action="" method="post">
        <label for="">Tên sản phẩm:</label>
        <input type="text" name="ten_sp" autofocus>
        <label for="">Mã sản phẩm:</label>
        <input type="text" name="ma_sp" require>
        <label for="">Số lượng:</label>
        <input type="text" name="so_luong">
        <label for="">Giá:</label>
        <input type="text" value="12000" readonly>
        <button disabled>Test disabled</button>

        <br>
        <button name="confirm1" type="submit">Xác nhận</button>
    </form>
    <?=  $result ?>

    <h2>Form đăng ký user</h2>
    <?php 
        $ketqua ='';
        if(isset($_POST['confirm2'])) {
            $ketqua = "Xác nhận đăng ký thành công! <br>".
            "Tên đăng nhập:".$_POST['dky']."<br>" .
            "Mật khẩu: ".$_POST['pass'];
        }
    ?>  
    <form action="" method="post">
        <label for="">Tên đăng ký:</label>
        <input type="text" name="dky" require>
        <label for="">Mật khẩu:</label>
        <input type="password" name="pass">
        <p><button type="submit" name="confirm2">Xác nhận</button></p>
    </form>
    <?= $ketqua ?>
</body>
</html>