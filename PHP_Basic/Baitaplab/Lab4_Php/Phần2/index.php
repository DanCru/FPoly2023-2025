<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    require 'database.php';

    $sql = "SELECT * FROM san_pham;";
    
    $results = mysqli_query($conn, $sql);
    
    if ($results === false) {
        echo mysqli_error($conn);
    }
    else {
        $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    ?> 
<div class=container>
    
        <?php require 'header.php'; ?>
        
            <?php if (empty ($articles)): ?>        
                <p>No articles found.</p>
            <?php else: ?>        
                <ul>           
                    <?php foreach ($articles as $article): ?>
                    <li>
                        <article>
                            <h2><a href="article.php?id=<?= $article['ma_sp']; ?>"><?= $article['ten_sp']; ?></a></h2>
                            <p><img width=50px src="<?= $article['hinh_anh']; ?>" alt=""></p>
                         </article>
                    </li>
                   <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php require 'footer.php'; ?>
</div>
    
    
</body>
</html>