<?php
  session_start();
  include "database2.php";
  if(isset($_SESSION['user'])){
    echo 'Welcome master: '.$_SESSION['user'];
    echo '<a href="logout2.php">Dang xuat</a>';

    $sql_delete = "DELETE FROM KHACH_HANG WHERE DANG_NHAP = 'user' ";
    $result = mysqli_query($conn, $sql_delete);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $sql_select = "SELECT *FROM san_pham";
      $result_select = mysqli_query($conn, $sql_select);
      $products = mysqli_fetch_all($result_select, MYSQLI_ASSOC);

      // search
      $searchSP = "";
      if(isset($_POST['confirm'])){
        $searchSP = "%". $_POST['search'] . "%";

        $sql_search = "SELECT *FROM SAN_PHAM WHERE MA_SP LIKE ? OR TEN_SP LIKE ?";
        $stmt = mysqli_prepare($conn, $sql_search);
        if($stmt == true){
            mysqli_stmt_bind_param($stmt, "ss", $searchSP, $searchSP);
            if(mysqli_stmt_execute($stmt) == true){
                $result_search = mysqli_stmt_get_result($stmt);
                $products = mysqli_fetch_all($result_search, MYSQLI_ASSOC);
            }
        }
      }

    ?>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Nhap tu khoa tim kiem" value="<?= str_replace("%", "", $searchSP) ?>">
        <button type="submit" name="confirm">Xac nhan</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ma san pham</th>
                <th>Ten san pham</th>
                <th>Gia</th>
                <th>Thao tac</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $pr):?>
                <tr>
                    <td><?= $pr['id'] ?></td>
                    <td><?= $pr['ma_sp'] ?></td>
                    <td><?= $pr['ten_sp'] ?></td>
                    <td><?= $pr['gia'] ?></td>
                    <td>
                        <button><a href="">Xoa</a></button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>