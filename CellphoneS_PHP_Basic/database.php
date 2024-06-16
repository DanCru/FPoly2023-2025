<?php

    define("host","localhost");
    define("user","root");
    define("pass","Anhduc123@");
    define("database","khach_hang");

    // define("host","localhost");
    // define("user","id21922320_root");
    // define("pass","Anhduc123@");
    // define("database","id21922320_duc_market");


    $conn = mysqli_connect(host, user, pass, database);
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
    }
    // echo "Ok";
?>