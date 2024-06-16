<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $errorMess = [];
    $user = '';
      if(isset($_POST['confirm'])){
        if($_POST['ten_dang_nhap'] != "root"){
            $errorMess[] = "Sai tên đăng nhập";
            $user = $_POST['ten_dang_nhap'];
        }

        if($_POST['mat_khau'] != "123"){
            $errorMess[] = "Sai mật khẩu";
        }

        if($_POST['mat_khau'] = ''){
            $_POST['mat_khau'] = null;
            mysqli_stmt_bind_param($stmt, "ss", $ten_dang_nhap, $mat_khau);
        }
        

        header("location:http://".$_SERVER['HTTP_HOST']."Baitaplab/Lab6/Bài2/form.php");
        // Chưa bao giờ em thấy mông lung như lúc này.
      }
    ?>      

    <form action="" method="post">
        <label for="">Tên đăng nhập</label>
        <input type="text" name="ten_dang_nhap" value="<?php echo $user ?>"><br>
        <label for="">Mật khẩu:</label>
        <input type="text" name="mat_khau"><br>
        <button name="confirm">Xác nhận</button>
    </form>

    <?php foreach($errorMess as $ereM):?>
        <p><?= $ereM ?></p>
    <?php endforeach;?>
</body>
</html>