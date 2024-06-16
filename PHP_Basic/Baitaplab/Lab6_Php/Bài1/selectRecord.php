<?php 

    function getArticle($conn, $id, $columns = '*') {
        
        $sql = "SELECT $columns FROM logintk WHERE id = $id";
    
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        return null;
    }
    
?>