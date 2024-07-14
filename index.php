<?php
include "model/pdo.php";  
include "model/sanpham.php";  
include "model/danhmuc.php";  
include "view/header.php";  
include "view/banner.php";  

// Default to show the product list
$showProductList = true;

if (isset($_GET['act'])) {  
    $act = $_GET['act'];  
    switch ($act) { 
        case 'xemChiTiet':  
            if (isset($_GET['id_sp'])) {  
                $id_sp = $_GET['id_sp']; 
                update_view_count($id_sp); 
                include "view/sanphamct.php";  
                $showProductList = false;
            }
            break; 
            
        case 'addToCart':  
            if (isset($_GET['id_sp'])) {  
                $id_sp = $_GET['id_sp'];  
                addToCart($id_sp);  
                
            }  
            break;       
    }  
}

if ($showProductList) {
    include "view/sanpham.php"; 
}

include "view/footer.php";  
?>
<script src="script.js"></script>
