<?php
  session_start();
  if(isset($_SESSION['role'])){
    setcookie("name", "user", time() + 24*3600);
    include "index2.php";
  } else{
    // include "index.php";
    echo "Bạn phải đăng nhập thì mới có quyền sử dụng chức năng này!";
  }
?>