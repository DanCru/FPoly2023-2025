<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        include "database.php";

        $id = $_GET['id'];
        // echo $id;
        $sql = "SELECT * FROM san_pham WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            exit();
        }

        if (isset($_POST['edit'])) {
            $maSP = $_POST['ma_sp'];
            $tenSP = $_POST['ten_sp'];
            $giaSP = $_POST['gia'];
            $ngayMua = $_POST['ngay_mua'];
            $sql = "UPDATE san_pham SET ma_sp = '$maSP', ten_sp = '$tenSP', gia = '$giaSP', ngay_mua = '$ngayMua' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index2.php");
                exit();
            } else {
                echo "edit failed";
            }
        }
    ?>


    <form action="" method="post">
        <input type="text" name="ma_sp" value="<?= $product["ma_sp"] ?>"><br>
        <input type="text" name="ten_sp" value="<?= $product["ten_sp"] ?>"><br>
        <input type="text" name="gia" value="<?= $product["gia"] ?>"><br>
        <input type="text" name="ngay_mua" value="<?= $product["ngay_mua"] ?>"><br>
        <button name="edit">edit</button>
        <button><a href="index2.php">back</a></button>
    </form>
</body>
</html>