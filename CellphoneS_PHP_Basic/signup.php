<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/content.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/system.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
    <link rel="manifest" href="./favicon_io/site.webmanifest">

</head>
<body>
    <?php
        include "header.php";
        include "database.php";
        $errMess = [];
        if(isset($_POST['confirm'])){
            $dangKy = $_POST['username'];
            $matKhau = $_POST['pass'];
            $rpMatKhau = $_POST['repeat-pass'];

            function checkValid($dangKy, $matKhau, $rpMatKhau){
                $errMess = [];
                if(empty($dangKy)) {
                    $errMess[] = "Tên đăng ký không đc để trống";
                };
                if(empty($matKhau)) {
                    $errMess[] = "Mật khẩu không đc để trống";
                };
                if(empty($rpMatKhau)) {
                    $errMess[] = "Xác nhận mật khẩu không đc để trống";
                };
                if($matKhau != $rpMatKhau){
                    $errMess[] = "Xác nhận mật khẩu không trùng khớp!";
                }

                global $conn;
                $sql_check_username = "SELECT * FROM logintk WHERE ten_dang_nhap = ?";
                $stmt = mysqli_prepare($conn, $sql_check_username);
                if ($stmt == false) {
                    echo mysqli_error($conn);
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $dangKy);
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    if (mysqli_num_rows($result) > 0) {
                        $errMess[] = "Tên đăng nhập này đã tồn tại!";
                    }
                    mysqli_free_result($result);
                    }
                }
                return $errMess;
            };
            $errMess = checkValid($dangKy, $matKhau, $rpMatKhau);



            if(empty($errMess)){
                $sql_signup = "INSERT INTO logintk  VALUES (?,?,?)";
                $stmt = mysqli_prepare($conn, $sql_signup);
                if ($stmt == false) {
                    echo mysqli_error($conn);
                } else {
                    mysqli_stmt_bind_param($stmt, "sss", $dangKy, $matKhau, $rpMatKhau);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>window.alert('Đăng ký thành công!')</script>";
                        // echo "<script>window.location.href='login.php'</script>";
                        header("location: login.php");
                    }
                }
            }
            
        } 
    ?>
    


    <div class="container">
        <div class="img-signup">
            <img src="./img/setupchil.webp" alt="">
        </div>
        <h2 id="signup">FORM ĐĂNG KÝ</h2>
        <div class="inner-signup">
            <form action="" method="post" class="form-signup">
                <input class="input-sign-up" type="text" placeholder="Nhập tên đăng nhập" name="username"> <br>
                <input class="input-sign-up" type="password" placeholder="Nhập mật khẩu" name="pass"> <br>
                <input class="input-sign-up" type="password" placeholder="Xác nhận mật khẩu" name="repeat-pass"> <br>
                <!-- <input class="input-sign-up" type="checkbox" name="v" require>  -->
                <!-- <label for="">Tôi đồng ý với các quy định!</label> <br> -->
                <button type="submit" name="confirm">Sign up</button>
                <div class="sign-up2">
                    <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                </div>
            </form>
            
            <div class="errMess">
                <?php foreach($errMess as $errorMess):?>
                    <p><?= $errorMess ?></p>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    

    <div class="clear"></div>
    <?php include "footer.php"?>

</body>
</html>
