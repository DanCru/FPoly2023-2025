<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Bài 1: -->

    <?php // Kết nối cơ sở dữ liệu
     define("db_host", "localhost");
     define("db_user", "root");
     define("db_password", "");
     define("db_name", "qly_ban_hang");
 
    $connect = mysqli_connect(db_host, db_user, db_password, db_name);
    
    if(mysqli_connect_error()):
        echo mysqli_connect_error();
    else:
        echo "connect success";
    endif;

    // Hiển thị danh sách
    $sql = "SELECT *FROM san_pham;";
    $result = mysqli_query($connect, $sql);
    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <header>
        <h1>My blog</h1>
    </header>

    <div class="main">
        <?php if(empty($articles)):?>
            <p>No articles found.</p>
        <?php else:?>
            <ul>
                <?php foreach($articles as $atcl):?>
                    <li>
                        <article>
                            <h2><?= $atcl['ten_sp']; ?></h2>
                            <p><?= $atcl['gia']; ?></p>
                        </article>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
    </div>
    
    <?php // Hiển thị chi tiết sản phẩm
    $sql = "SELECT *FROM san_pham
    WHERE ma_sp = " .$_GET['ma_sp'];

    $result = mysqli_query($connect, $sql);

    if($result === false):
        echo mysqli_error($connect);
    else:
        $article = mysqli_fetch_assoc($result);
    endif;
    ?>

    <article>
        <h2><?= $atcl['ten_sp']; ?></h2>
        <p><?= $atcl['gia']; ?></p>
    </article>

    <!-- Bài 2 -->

    <?php 
    if(isset($_GET['ma_sp']) && is_numeric($_GET['ma_sp'])):
        $id = $_GET['ma_sp'];
        echo $ma_sp;
    else:
        $article = null;
    endif;
    ?>
</body>
</html>