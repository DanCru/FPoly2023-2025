<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật người dùng</title>
</head>
<body>
  <?php
    include "database.php";

    if (isset($_POST['confirm'])) {
      
      $id = $_POST['id']; 

      $dangNhap = mysqli_real_escape_string($connect, $_POST['ten_dang_nhap']); 
      $matKhau = mysqli_real_escape_string($connect, $_POST['mat_khau']);  
      

      $sql_update = "UPDATE logintk SET ten_dang_nhap = ?, mat_khau = ? WHERE ten_dang_nhap = ?"; 
      $stmt = mysqli_prepare($connect, $sql_update);
      mysqli_stmt_bind_param($stmt, "sss", $dangNhap, $matKhau, $id); 

      if (mysqli_stmt_execute($stmt)) {
        echo "Cập nhật thành công!";
        header("Location: products.php");
        
      } else {
        echo "Lỗi cập nhật: " . mysqli_error($connect);
      }
      mysqli_stmt_close($stmt);
    }
  ?>

  <form action="update.php" method="post">
    <label for="">Tên đăng ký:</label>
    <input type="text" name="ten_dang_nhap" required>
    <label for="">Mật khẩu:</label>
    <input type="password" name="mat_khau">
    <p><button type="submit" name="confirm">Xác nhận</button></p>
  </form>

</body>
</html>
