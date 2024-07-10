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
    foreach ($products as $product) {
        echo '<div class="product-box">';
        echo '<img src="img/' . $product['anhsp'] . '" alt="" class="product-img">';
        echo '<h3 class="tensp">' . $product['tensp'] . '</h3>';
        echo '<p class="giasp">' . $product['giasp'].'VNĐ' . '</p>';
        echo '<p class="desc">' . $product['mota'] . '</p>';
        echo '<div class="button">Thêm Vào Giỏ Hàng</div>';
        echo '</div>';

        $count++;
        if ($count % 4 == 0) {
            echo '</div><div class="row ">';
        }
        if ($count == 12) {
            echo '</div>'; // Close the previous row
            echo '<center><a href="tongsp.php"><div class="see-more">Xem thêm ?</div></a></center>'; 
            echo '<center><h1 class="title">Sản Phẩm Hot</h1></center><tr></tr><div class="row ">';
        }
    }
    echo '</div>';
    ?>
</main>
</body>
</html>
