<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
      </style>
      <style>
.detail-container{
  width: 100vw;
  height: 100vh;
  display: grid;
  place-items: center;
}
.title-ct{
  color:#36454f;
  margin:3vh 0;
}
.detail-box{
  display: flex;
  align-items:center;
  width: 80vw;
  height: 80vh;
  background-color:white;
  border-radius:20px;
    color:#36454f;
    transition: 0.3s ease-in;
}
.img-box{
  width: 40%;
  height: 60%;
display: flex;
align-items:center;
justify-content: center;
}
.detail-img{
  width: 60%;
  border-radius:20px;
  transition: 0.3s ease-in;
  cursor: pointer;
}
.detail-img:hover{
    transform: scale(1.15);
    transition: 0.3s ease-out;
    -webkit-box-shadow: 0px 9px 24px 11px rgba(0,0,0,0.27);
-moz-box-shadow: 0px 9px 24px 11px rgba(0,0,0,0.27);
box-shadow: 0px 9px 24px 11px rgba(0,0,0,0.27);
}
.text-box{
  display: grid;
  place-items: center;
  height: 80%;
  width: 60%;
  background-color:white;
  transition: 0.3s ease-in;
}
.text-box:hover{
    height: 100%;
    border-right:1px solid white;
    border-radius:20px;
    background-color: #d3f1f8;
    transition: 0.3s ease-out;
}
.cttensp{
  font-weight: bold;
  text-transform: uppercase;

}
.price-box{
    display: grid;
}
      </style>
</head>
<body>
<main>
<header>
        <div class="header-logo hidden">
            <a href="index.php"><img class="web-logo" src="../img/logo.png" alt="Grand Team Logo"></a>
        </div>
        <nav class="header-menu hidden">
            <a class="items-link" href="../index.php">
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    });
    const hiddenElement = document.querySelectorAll(".hidden");
    hiddenElement.forEach((el) => observer.observe(el));
    </script>
<?php
include "../model/pdo.php";
include "../model/sanpham.php";

if (isset($_GET['id_sp'])) {
    $product_id = $_GET['id_sp'];
    $product = loadone_sanpham($product_id);

    if ($product) {
        echo '<div class="detail-container">';
        echo '<center><h1 class="title-ct">Chi Tiết Sản Phẩm</h1></center>';
            echo '<div class="detail-box">';
            echo '<div class="img-box">';
                echo '<img src="../img/' . $product['anhsp'] . '" alt="" class="detail-img">';
            echo '</div>';
            echo ' <div class="text-box">';
                echo '<center><h1 class="cttensp">' . $product['tensp'] . '</h1></center>';
                echo ' <div class="desc-box">';
                    echo '<p class="ctdesc">' . $product['mota'] . '</p>';
                echo '</div>';
                echo ' <div class="price-box">';
                    echo '<h2 class="ctgiasp">' . $product['giasp'] . 'VNĐ' . '</h2>';
                    echo '<p class="soluong">' . 'Số lượng còn lại:'.$product['soluong']  . '</p>';
                echo '</div>';
                
                echo '<div class="button">Thêm Vào Giỏ Hàng</div>';
            echo '</div>';
            echo '</div>';
        echo '</div>';
    } else {
        echo 'Lỗi';
    }
} else {
    echo 'Không thấy ID';
}
?>
<div class="footer">
                Copyright Nhom6Horizon@ 2024
</div>
</main>
</body>
</html>
