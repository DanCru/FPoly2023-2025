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
      if(isset($_POST['confirm'])){
        $dangNhap = $_POST['dang_nhap'];
        $matKhau = $_POST['mat_khau'];
        $confirmMk = $_POST['confirmPass'];

        $sql_login = "INSERT INTO LOGINTK(TEN_DANG_NHAP, MAT_KHAU, XAC_NHAN_MK)
        VALUES('$dangNhap','$matKhau','$confirmMk')";

        $result = mysqli_query($conn, $sql_login);

        if($dangNhap == "admin" && $matKhau == "1111" && $confirmMk == "1111"){
            $_SESSION['user'] = $dangNhap;
            header("location: index2.php");
        }
      }
    ?>
    <form action="" method="post">
        <input type="text" placeholder="Ten dang nhap" name="dang_nhap">
        <input type="text" placeholder="Mat khau" name="mat_khau">
        <input type="text" placeholder="Xac nhan mat khau" name="confirmPass">
        <button type="submit" name="confirm">Xac nhan</button>
    </form>
</body>
</html>