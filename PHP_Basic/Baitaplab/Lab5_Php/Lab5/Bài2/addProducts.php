<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include "database.php";
        if(isset($_POST['confirm'])) {
            $dangNhap = $_POST['ten_dang_nhap'];
            $matKhau = $_POST['mat_khau'];

            $sql = "INSERT INTO logintk(ten_dang_nhap, mat_khau)
            VALUE('$dangNhap','$matKhau');";

            $result = mysqli_query($connect, $sql);

            if($result == false){
                echo "Ket noi that bai!";
            }
            header("location: products.php");
        }
    ?>  
    <form action="addProducts.php" method="post">
        <label for="">Tên đăng ký:</label>
        <input type="text" name="ten_dang_nhap" require>
        <label for="">Mật khẩu:</label>
        <input type="password" name="mat_khau">
        <p><button type="submit" name="confirm">Xác nhận</button></p>
    </form>
    
</body>
</html>