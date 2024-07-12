<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "view/header.php";
    include "view/banner.php";
    include "view/sanpham.php";  
    include "view/footer.php";

    if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case 'addToCart':
        if(isset($_GET['id_sp'])){
          $id_sp = $_GET['id_sp'];
          addToCart($id_sp);
          
        }
        break;
    }
}
?>
<script src="script.js"></script>