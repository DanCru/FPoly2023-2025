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
      $sql = "SELECT *FROM SAN_PHAM";
      $result = mysqli_query($conn, $sql);
      $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

      $searchSp ="";
      if(isset($_POST['confirm'])){
        $searchSp = "%". $_POST['search'] . "%";
        $sql_search = "SELECT *FROM SAN_PHAM WHERE MA_SP LIKE ? OR TEN_SP LIKE ?";
        $stmt = mysqli_prepare($conn, $sql_search);
        if($stmt == true){
            mysqli_stmt_bind_param($stmt, "ss", $searchSp, $searchSp);
            if(mysqli_stmt_execute($stmt)){
                $result_product = mysqli_stmt_get_result($stmt);
                $products = mysqli_fetch_all($result_product, MYSQLI_ASSOC);
            }
        }
      }
    ?>
</body>
</html> 