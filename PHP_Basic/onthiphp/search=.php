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
      $sql = "SELECT *FROM san_pham;";
      $result = mysqli_query($conn, $sql);
      $sanPhams = mysqli_fetch_all($result, MYSQLI_ASSOC);

      $searchTo = "";
      if(isset($_POST['confirm'])){
        $searchTo =  $_POST['search'];

        $sql_search = "SELECT *FROM san_pham WHERE ma_sp = ? OR ten_sp = ?;";
        $stmt = mysqli_prepare($conn, $sql_search);

        if($stmt == false){
            echo mysqli_errno($conn);
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $searchTo, $searchTo);
            if(mysqli_stmt_execute($stmt)){
                
                $result_products = mysqli_stmt_get_result($stmt);
                $sanPhams = mysqli_fetch_all($result_products, MYSQLI_ASSOC);
            }
        }
      }
    ?>
    <form action="" method="post">
        <input type="text" placeholder="Nhập từ khóa" name="search" value="<?= htmlspecialchars(isset($_POST['search']) ? $_POST['search'] : '') ?>">
        <button type="submit" name="confirm">Xác nhận</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Ngày mua</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sanPhams as $sp):?>
                <tr>
                    <td><?= $sp['ten_sp'] ?></td>
                    <td><?= $sp['ma_sp'] ?></td>
                    <td><?= $sp['ngay_mua'] ?></td>
                    <td><?= $sp['gia'] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>