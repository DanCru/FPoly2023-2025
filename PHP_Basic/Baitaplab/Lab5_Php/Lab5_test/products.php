<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include "database.php";

        $sql = "SELECT *FROM logintk;";
        $result = mysqli_query($connect, $sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);


    ?>

    <?php foreach($products as $pr):?>
        <h2>
            <span><?= $pr['ten_dang_nhap'] ?></span>
            <span><?= $pr['mat_khau'] ?></span>
        </h2>
    <?php endforeach;?>
    <button><a href="addProducts.php">Them tai khoan</a></button>

</body>
</html>