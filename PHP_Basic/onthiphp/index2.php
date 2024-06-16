<?php
  session_start();
  if(isset($_SESSION['user'])){
    echo "Welcome: ".$_SESSION['user'];
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
    include "database.php";
    //Delete 
    $sql_delete = "DELETE FROM LOGINTK WHERE TEN_DANG_NHAP = 'admin' ";
    $result_delete = mysqli_query($conn, $sql_delete);

    //In san pham

    $sql = "SELECT *FROM SAN_PHAM";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>

  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ma san pham</th>
        <th>Ten san pham</th>
        <th>Gia</th>
        <th>Ngay mua hang</th>
        <th>Thao tac</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($products as $pro):?>
        <tr>
          <td><?= $pro['id'] ?></td>
          <td><?= $pro['ma_sp'] ?></td>
          <td><?= $pro['ten_sp'] ?></td>
          <td><?= $pro['gia'] ?></td>
          <td><?= $pro['ngay_mua'] ?></td>
          <td>
            <button><a onclick="return alert('Are you sure?')" href="delete.php?id=<?= $pro['id'] ?>">Xoa</a></button>
            <button><a href="edit2.php?id=<?= $pro['id'] ?>">Sửa</a></button>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <button><a href="logout.php">Dang xuat</a></button>
</body>
</html>