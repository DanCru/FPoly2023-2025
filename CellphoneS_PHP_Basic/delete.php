<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
?>

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
    
        $id = $_GET['id'];
        // echo $id;
        $sql_delete = "DELETE FROM san_pham WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql_delete);
            
        header("Location: products.php");
    ?>
</body>
</html>