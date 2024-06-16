<?php session_start()?>
<?php if(isset($_SESSION['admin'])):?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h3>THÊM TÀI KHOẢN</h3>
        <?php 
            include "database.php";
            if(isset($_POST['confirm'])) {
                $dangNhap = htmlspecialchars($_POST['ten_dang_nhap']);
                $matKhau = $_POST['mat_khau'];

                $sql = "INSERT INTO logintk(ten_dang_nhap, mat_khau)
                VALUE('$dangNhap','$matKhau');";

                $result = mysqli_query($connect, $sql);

                if($result == false){
                    echo "Ket noi that bai!";
                }
                header("location: admin.php");

                
            }
            
        ?>  
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div>
                <label for="">Tên đăng ký:</label><br>
                <input type="text" name="ten_dang_nhap" require>
            </div>
            <div>
                <label for="">Mật khẩu:</label><br>
                <input type="password" name="mat_khau">
            </div>
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
