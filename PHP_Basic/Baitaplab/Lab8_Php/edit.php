<?php session_start()?>
<?php if(isset($_SESSION['admin'])):?>
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
        <?php
            include "database.php";

            $id = $_GET["id"];
            

            $sql_edit = "SELECT *FROM logintk WHERE ten_dang_nhap = '$id' ";
            $result = mysqli_query($connect, $sql_edit);
            $select =  mysqli_fetch_assoc($result);
            // echo $select;


        ?>
        <h1>Form sửa</h1>
        <div class="mb-3 mt-3">
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                
                <label for="">Tên đăng ký:</label>
                <input class=".form-control-plaintext" type="text" name="ten_dang_nhap" value="<?= $select['ten_dang_nhap'] ?>"> <br>
                <label for="">Mật khẩu:</label>
                <input class=".form-control-plaintext" type="password" name="mat_khau" value="<?= $select['mat_khau'] ?>"><br>
                <p><button type="submit" name="confirm">Xác nhận</button></p>
            </form>
        </div>
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
