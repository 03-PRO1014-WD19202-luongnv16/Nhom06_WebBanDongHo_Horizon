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
        case 'new':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                 }else{
                     $kyw="";
                 }
                 if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
                     $id_dm=$_GET['id_dm'];                               
                     
                 }else{
                     $id_dm=0;
                 }
                 $dssp=loadall_sanpham($kyw, $id_dm);
                 $tendm = loadone_sanpham($id_dm);
                 include "view/sanpham.php";
                 break;
        case 'hot':
                include "/view/hot.php";
                $showProductList = false;
                break;
        case 'famous':
                include "/view/famous.php";
                $showProductList = false;
                break;
        case 'limited';
                include "/view/limited.php";
                $showProductList = false;
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
