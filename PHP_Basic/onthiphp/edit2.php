<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      session_start();
      include "database.php";

      $id = $_GET['id'];
      $sql = "SELECT *FROM SAN_PHAM WHERE ID = '$id' ";
      $result = mysqli_query($conn, $sql);
      $product = mysqli_fetch_assoc($result);


      if(isset($_POST['confirm'])){
        $maSP = $_POST['ma_sp'];
        $tenSP = $_POST['ten_sp'];
        $gia = $_POST['gia'];
        $ngayMua = $_POST['ngay_mua'];

        $sql_update = "UPDATE SAN_PHAM SET MA_SP = '$maSP' , ten_sp = '$tenSP', gia = '$gia', ngay_mua = '$ngayMua'
        where id = '$id' ";
        $result_update = mysqli_query($conn, $sql_update);
        header("location: index2.php");


      }
    ?>

    <form action="" method="post">
        <input type="text" name="ma_sp" value="<?= $product['ma_sp'] ?>">
        <input type="text" name="ten_sp" value="<?= $product['ten_sp'] ?>">
        <input type="text" name="gia" value="<?= $product['gia'] ?>">
        <input type="text" name="ngay_mua" value="<?= $product['ngay_mua'] ?>">
        <button name="confirm">Sua</button>
    </form>
</body>
</html>