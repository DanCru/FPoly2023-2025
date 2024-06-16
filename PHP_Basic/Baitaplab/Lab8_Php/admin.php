<?php session_start()?>
<?php if(isset($_SESSION['admin'])):?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        </head>
    <body>
    <h1 align="center">WELCOME TO ADMIN</h1>

        <?php 
            include "database.php";
            // Ở đây em sẽ xóa tài khoản admin luôn để không bị lỗi lặp tài khoản tiện cho lần đăng nhập sau
            $sql_delete = "DELETE FROM logintk WHERE ten_dang_nhap = 'admin' ";
            $result = mysqli_query($connect, $sql_delete);
    
            $sql = "SELECT *FROM logintk;";
            $result = mysqli_query($connect, $sql);
            $sanphams = mysqli_fetch_all($result, MYSQLI_ASSOC);
     
        ?>
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach($sanphams as $sp):?>
                        <tr>
                            <td><?= $sp['ten_dang_nhap'] ?></td>
                            <td><?= $sp['mat_khau'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $sp['ten_dang_nhap'] ?>" class="btn btn-success">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" href="delete.php?id=<?= $sp['ten_dang_nhap'] ?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <button ><a href="addproducts.php" class="btn btn-light">Thêm tài khoản</a></button>
            <button ><a href="logout.php" class="btn btn-light">Đăng xuất</a></button>
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
        <h2>Bạn không có quyền truy cập vào tài khoản admin, vui lòng đăng nhập để xác minh!</h2>
        <button ><a href="login.php" class="btn btn-light">Đăng nhập</a></button>
    </body>
    </html>
    
<?php endif;?>
