<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
    </style>
</head>

<body>
    <header>
        <div class="header-logo hidden">
            <a href="index.php"><img class="web-logo" src="./img/logo.png" alt="Grand Team Logo"></a>
        </div>
        <nav class="header-menu hidden">
            <a class="items-link" href="index.php">
                <ion-icon class="menu-items" name="home-outline"></ion-icon>
                <span class="text">Trang chủ</span>
            </a>
            <a class="items-link" href="index.php?act=sanpham">
                <ion-icon class="menu-items" name="watch-outline"></ion-icon>
                <span class="text">Sản Phẩm</span>
            </a>
            <a class="items-link" href="index.php?act=cart">
                <ion-icon class="menu-items" name="cart-outline"></ion-icon>
                <span class="text">Giỏ Hàng</span>
            </a>
            <a class="items-link" href="index.php?act=login">
                <ion-icon class="menu-items" name="person-outline"></ion-icon>
                <span class="text">Đăng Nhập</span>
            </a>
        </nav>
    </header>
    <div class="test"></div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>