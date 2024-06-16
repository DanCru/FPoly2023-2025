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
        $sql = "SELECT *FROM san_pham";
        $result = mysqli_query($conn, $sql);
        $sanPhams = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $searchSp = "";
        if(isset($_POST['confirm'])){
            $searchSp = "%". $_POST['search'] . "%";
            $sql_search = "SELECT *FROM SAN_PHAM WHERE TEN_SP LIKE ? OR MA_SP LIKE ?";
            $stmt = mysqli_prepare($conn, $sql_search);
            if($stmt == true){
                mysqli_stmt_bind_param($stmt, "ss", $searchSp, $searchSp);
                if(mysqli_stmt_execute($stmt)){
                    $result_product = mysqli_stmt_get_result($stmt);
                    $sanPhams = mysqli_fetch_all($result_product, MYSQLI_ASSOC);
                }

            }
        }
    ?>

    <form action="" method="post">
        <input type="text" placeholder="Nhap bla bla" name="search" value="<?= str_replace("%", "", $searchSp) ?>">
        <button type="submit" name="confirm">Xac nhan</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Ma san pham</th>
                <th>Ten san pham</th>
                <th>Ngay mua</th>
                <th>Gia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sanPhams as $sp):?>
                <tr>
                    <td><?= $sp['ma_sp'] ?></td>
                    <td><?= $sp['ten_sp'] ?></td>
                    <td><?= $sp['ngay_mua'] ?></td>
                    <td><?= $sp['gia'] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>