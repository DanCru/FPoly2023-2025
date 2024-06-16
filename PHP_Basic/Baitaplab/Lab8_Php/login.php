<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>SIGN UP YOUR ACCOUNT</h3>
    <?php 
        session_start();
        include "database.php";
        if(isset($_POST['confirm'])) {
            $dangNhap = htmlspecialchars($_POST['ten_dang_nhap']);
            $matKhau = $_POST['mat_khau'];

            $sql = "INSERT INTO logintk(ten_dang_nhap, mat_khau)
            VALUE('$dangNhap','$matKhau');";

            $result = mysqli_query($connect, $sql);

            // if($result == false){
            //     echo "Ket noi that bai!";
            // }
            // header("location: session.php");

            if($dangNhap == 'admin' && $matKhau == '12345'){
                $_SESSION['admin'] = $dangNhap;

                header("location: fỏm.php");
            }else{
                $_SESSION['user'] = $dangNhap;
                $_SESSION['role'] = $role;
                header("location: user.php");
            }


        }
        
    ?>  
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <label for="">Tên đăng ký:</label><br>
            <input type="text" name="ten_dang_nhap" require>
        </div>
        <div>
            <label for="">Mật khẩu:</label><br>
            <input type="password" name="mat_khau" require>
        </div>
        <p><button type="submit" name="confirm">Xác nhận</button></p>
    </form>
    
</body>
</html>