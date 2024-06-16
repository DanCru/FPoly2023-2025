<?php session_start();?>

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
// session_start();

include "database.php";
$errMess = [];

if (isset($_POST['submit'])) {
    $dangNhap = htmlspecialchars($_POST['dang_nhap']);
    $matKhau = htmlspecialchars($_POST['mat_khau']);

    function check($dangNhap, $matKhau) {
      $errMess = [];
      if (empty($dangNhap)) {
        $errMess[] = "Tên đăng nhập không được để trống";
      }
      if (empty($matKhau)) {
        $errMess[] = "Mật khẩu không được để trống";
      }
      return $errMess;
    }

  $errMess = check($dangNhap, $matKhau);

  if (empty($errMess)) {
    $sql_login = "SELECT * FROM logintk WHERE ten_dang_nhap = ? AND mat_khau = ?";
    $stmt = mysqli_prepare($conn, $sql_login);

    if ($stmt == false) {
      echo mysqli_error($conn);
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $dangNhap, $matKhau);

      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['role'] = $dangNhap;
          mysqli_free_result($result);
          // echo "<script>window.location.href='session.php'</script>";

          header("location: session.php");
          exit;
        } else {
          // Đăng nhập thất bại
          $errMess[] = "Tên đăng nhập hoặc mật khẩu không hợp lệ!";
        }
      } else {
        // Lỗi thực thi câu lệnh đã chuẩn bị
        error_log("Lỗi khi thực thi truy vấn đăng nhập: " . mysqli_stmt_error($stmt));
      }
    }
  }
}
?>


<?php include "header.php"?>
<div class="container">
    <div class="inner-login">
        <div id = "login">
            <h2>Đăng nhập</h2>
            <form action="" method="post" >
                <label for="">Tên đăng nhập</label>
                <input type="text" placeholder="you@example.com" require name="dang_nhap">
                <label for="">Mật khẩu</label>
                <label class ="forgot" for=""><a href=""><span>Quên mật khẩu?</span></a></label>
                <input type="password" placeholder="Enter 6 characters or more!" require name="mat_khau">
                <button name="submit" type ="submit">Login</button>
            </form>
            <p class="or">OR</p>
            <div class="logo-login">
                <img src="./img/Google__G__logo.svg.png" alt="">
                <span>Login with Google</span>
            </div>
            <div class="logo-login2">
                <img src="./img/githublogo.png" alt="">
                <span>Login with Github</span>
            </div>
            <div class="logo-login3">
                <img src="./img/fb_icon_325x325.png" alt="">
                <span>Login with Facebook</span>
            </div>
            <div class="sign-up">
                <p>Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a></p>
            </div>
        </div>
        
        <div class="img-login">
            <img src="./img/imglogin.webp" alt="">
        </div>
        <div class="errorMess">
            <?php foreach($errMess as $errorMess):?>
                <p><?= $errorMess ?></p>
            <?php endforeach;?>
        </div>
    </div>
    <div class="clear"></div>


</div>
<?php include "footer.php"?>

</body>
</html>