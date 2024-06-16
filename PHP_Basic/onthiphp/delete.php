<?php
  session_start();
  include "database.php";
  $id = $_GET['id'];
//   echo $id;

  $sql_delete = "DELETE FROM SAN_PHAM WHERE id = '$id' ";
  $result = mysqli_query($conn, $sql_delete);
  header("location: index2.php");  

?>