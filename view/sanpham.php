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
<main>
    <?php

    $products = pdo_query("SELECT * FROM sanpham");
    $count = 0;

    echo '<center><h1 class="title">Sản Phẩm Nổi Bật</h1></center><tr></tr><div class="row ">';
    foreach ($products as $sp) {
        echo '<div class="product-box hidden">';
        echo '<a href="view/sanphamct.php?id_sp=' . $sp['id_sp'] . '">';
        echo '<img src="img/' . $sp['anhsp'] . '" alt="" class="product-img">';
        echo '</a>';
        echo '<h3 class="tensp">' . $sp['tensp'] . '</h3>';
        echo '<p class="giasp">' . $sp['giasp'].'VNĐ' . '</p>';
        echo '<p class="desc">' . $sp['mota'] . '</p>';
        echo '<a href="index.php?act=addToCart&id_sp=' . $sp['id_sp'] . '">';
        echo '<div class="button" >Thêm Vào Giỏ Hàng</div>'; 
        echo '</a>';
        echo '</div>';
        $count++;
        if ($count % 4 == 0) {
            echo '</div><div class="row ">';
        }
        if ($count == 12) {
            echo '</div>';
            echo '<center><a href="tongsp.php"><div class="see-more">Xem thêm ?</div></a></center>'; 
            echo '<center><h1 class="title">Sản Phẩm Hot</h1></center><tr></tr><div class="row ">';
        }
    }
    echo '</div>';
    ?>
</main>
</body>
</html>