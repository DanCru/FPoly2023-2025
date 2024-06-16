<?php 
    function getDV() {

        define("host","localhost");
        define("user","root");
        define("pass","Anhduc123@");
        define("data","khach_hang");

        $connect = mysqli_connect(host, user, pass, data);
        if(mysqli_connect_error()){
            echo mysqli_connect_error();
        }
        // echo "connect success";
    }
?>