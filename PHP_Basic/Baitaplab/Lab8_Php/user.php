<?php session_start()?>
<?php if(isset($_SESSION['user'])):?>

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
        <h1>WELCOME TO USER: <?php echo $_SESSION['user']?></h1>
        <button ><a href="logout.php" class="btn btn-light">Đăng xuất</a></button>
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
        <h2>Bạn không có quyền truy cập vào tài khoản user, vui lòng đăng nhập để xác minh!</h2>
        <button ><a href="login.php" class="btn btn-light">Đăng nhập</a></button>
    </body>
    </html>

<?php endif;?>