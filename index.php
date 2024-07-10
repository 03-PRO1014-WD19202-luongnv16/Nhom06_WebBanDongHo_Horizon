<?php
    include "./model/pdo.php";
    include "./model/danhmuc.php";
    include "./view/header.php";  
    include "./model/sanpham.php";
    include "./global.php";


    $spnew = loadall_sanpham_top10();
    if((isset($_GET['act'])&&($_GET['act'] != ""))){
        $act = $_GET['act'];
        switch($act)
        {
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
            case 'used':
                include "./view/used.php";
                break;
            case 'hot':
                include "./view/hot.php";
                break;
            case 'famous':
                include "./view/famous.php";
                break;
            case 'limited';
                include "./view/limited.php";
                break;
            case 'sanphamct':
                include "./view/sanphamct.php";
                break;
            default:
                echo "Không có chức năng này";
            break;
        }
        
    }
    else {
        include "./view/sanpham.php";
    }

    
    include "./view/footer.php";

?>