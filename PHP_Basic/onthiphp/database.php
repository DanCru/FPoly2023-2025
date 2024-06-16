<?php
    define("host","localhost");
    define("user","root");
    define("pass","Anhduc123@");
    define("database","khach_hang");

    $conn = mysqli_connect(host, user, pass, database);
    if(mysqli_connect_error()){
        echo "lỗi";
    } 
?>