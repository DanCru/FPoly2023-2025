<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include "database.php";

        $sql = "SELECT *FROM logintk;";
        $result = mysqli_query($connect, $sql);
        $sanphams = mysqli_fetch_all($result, MYSQLI_ASSOC);


    ?>
    <table>
        <thead>
            <tr>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach($sanphams as $sp):?>
                <tr>
                    <td><?= $sp['ten_dang_nhap'] ?></td>
                    <td><?= $sp['mat_khau'] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <p><button ><a href="addProducts.php">Thêm tài khoản</a></button></p>

</body>
</html>