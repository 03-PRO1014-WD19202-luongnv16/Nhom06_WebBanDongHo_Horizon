<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
      </style>
</head>
<body>
<main>
    <div class="container">
        <?php
        if (isset($_GET['id_sp'])) {
            $product_id = $_GET['id_sp'];
            $product = loadone_sanpham($product_id);

            if ($product) {
                echo '<div class="detail-container">';
                echo '<center><h1 class="title-ct">Chi Tiết Sản Phẩm</h1></center>';
                echo '<div class="detail-box">';
                echo '<div class="img-box">';
                echo '<img src="img/' . $product['anhsp'] . '" alt="" class="detail-img">';
                echo '</div>';
                echo '<div class="text-box">';
                echo '<center><h1 class="cttensp">' . $product['tensp'] . '</h1></center>';
                echo '<div class="desc-box">';
                echo '<p class="ctdesc">' . $product['mota'] . '</p>';
                echo '</div>';
                echo '<div class="price-box">';
                echo '<h2 class="ctgiasp">' . $product['giasp'] . ' VNĐ</h2>';
                echo '<p class="soluong">' . 'Số lượng còn lại: ' . $product['soluong'] . '</p>';
                echo '</div>';
                echo '<a href="index.php?act=addToCart&id_sp=' . $product['id_sp'] . '">';
                echo '<div class="button">Thêm Vào Giỏ Hàng</div>'; 
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } 
        } 
        ?>
    </div>
</main>
</body>
</html>
