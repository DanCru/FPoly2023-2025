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
            $id = $_GET['id'];
            

            $sql_delete = "DELETE FROM logintk WHERE ten_dang_nhap = '$id' ";

            $result = mysqli_query($connect, $sql_delete);
            
            header("Location: admin.php");
        ?> 
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

