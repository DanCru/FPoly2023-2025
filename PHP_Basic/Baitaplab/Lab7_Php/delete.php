<?php
    include "database.php";
    $id = $_GET['id'];
    

    $sql_delete = "DELETE FROM logintk WHERE ten_dang_nhap = '$id' ";

    $result = mysqli_query($connect, $sql_delete);
    
    header("Location: products.php");
?> 