<?php session_start()?>
<?php if(isset($_SESSION['admin'])):?>

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
          header("Location: admin.php");
          
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

<?php else:?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <h2>Chỉ có ADMIN mới có quyền truy cập chức năng này! Vui lòng truy cập để xác minh!</h2>
        <button ><a href="login.php" class="btn btn-light">Đăng nhập</a></button>
    </body>
    </html>
    
<?php endif;?>
