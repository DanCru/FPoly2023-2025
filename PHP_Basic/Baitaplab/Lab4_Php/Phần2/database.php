<?php 
    define("db_host", "localhost");
    define("db_user", "root");
    define("db_password", "Anhduc123@");
    define("db_name", "qly_ban_hang");

    $conn = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
    } 
    // echo "Connect successfull";
?>