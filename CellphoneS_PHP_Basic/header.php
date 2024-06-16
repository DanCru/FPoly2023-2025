<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DucMarket</title>
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/content.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
    <link rel="manifest" href="./favicon_io/site.webmanifest">


</head>
<body>
<div class="anti">
    <p>Sản phẩm nói không với Jquery, Bootstrap và các thư viện hỗ trợ khác.</p>
</div>
<nav>
    <div class="nav">
        <div class="logo">
            <a href="index.php">
                <span>DucMarket</span>
                <img src="./img/Logo.png" alt="">
            </a>
        </div>

        <div class="list">
            <a href="session.php">
                <p>
                    <i class="fa-solid fa-list"></i> Danh mục
                    <ul class="h-nav">
                        <li><a href="">Nội trợ - Nấu ăn</a></li>
                        <li><a href="">Thiết bị gia dụng</a></li>
                        <li><a href="">Đồ công nghệ</a></li>
                        <li><a href="">Laptop - PC - Desktop</a></li>
                    </ul>
                </p>
            </a>
        </div>

        <div class="adress">
            <a href=""><p><i class="fa-solid fa-location-dot"></i> Thanh Hoa</p></a>
        </div>

        <div class="search">
            <form action="" method="post">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="search" placeholder="Bạn cần tìm gì?" required>
            </form>
        </div>

        <div class="pls">
            <div class="buy-product">
                <a href="session.php">
                    <i class="fa-solid fa-phone"></i>
                    <div class="sub-buy">
                        <p>Gọi mua hàng</p>
                        <p>0822153447</p>
                    </div>
                </a>
            </div>
    
            <div class="truck-kun">
                <a href="session.php">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>Tra cứu <br> đơn hàng</span>
                </a>
            </div>
    
            <div class="cart-bag">
                <a href="session.php">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>Giỏ <br>hàng</span>
                </a>
            </div>
    
            <div class="near-shop">
                <a href="https://www.google.com/maps/@9.779349,105.6189045,11z?hl=vi-VN&entry=ttu" target="_blank">
                    <i class="fa-solid fa-location-crosshairs"></i>
                    <span>Cửa hàng <br>gần bạn</span>
                </a>
            </div>
        </div>

        <div class="login">
            <a href="./login.php">
                <p><i class="fa-solid fa-user-tie"></i> Đăng nhập</p>
            </a>
        </div> 
        
    </div>
</nav>
</body>
</html>
<script src="/JS/icon.js"></script>