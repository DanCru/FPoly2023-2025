<?php 
    define("host","localhost");
    define("user","root");
    define("pass","Anhduc123@");
    define("name","khach_hang");

    $connect = mysqli_connect(host, user, pass, name);
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
    }
    // echo "connect success";

?>

    
