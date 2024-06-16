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
        if(isset($_POST['confirm'])){

            $dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];

            $sql = "INSERT INTO logintk(ten_dang_nhap, mat_khau)
            VALUES('$dang_nhap', '$mat_khau')";

            $result = mysqli_query($connect, $sql);

            if($result == false){
                echo "K the ket noi";
            }
            header("location: products.php");
        }
    ?>


    <form action="" method="post">
        <label for="">Ten dang nhap:</label>
        <input type="text" name="ten_dang_nhap">
        <label for="">Mat khau:</label>
        <input type="text" name="mat_khau">
        <button type="submit" name="confirm">Xac nhan</button>
    </form>
</body>
</html>