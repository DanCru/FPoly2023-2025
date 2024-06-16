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
      include "database2.php";

      if(isset($_POST['confirm'])){
        $dangNhap = $_POST['dangnhap'];
        $matKhau = $_POST['matkhau'];

        $sql = "INSERT INTO khach_hang VALUES('$dangNhap','$matKhau')";
        $result = mysqli_query($conn, $sql);

        if($dangNhap == "user" && $matKhau == "111"){
            $_SESSION['user'] = $dangNhap;
            header("location: index1.php");
        }else{
            echo "Sai ten dang nhap hoac mat khau!";
        }
      }
    ?>
    <form action="" method="post">
        <input type="text" placeholder="Ten dang nhap" name="dangnhap">
        <input type="text" placeholder="Mat khau" name="matkhau">
        <button name="confirm">Xac nhan</button>
    </form>
</body>
</html>