<?php

  include "../model/danhmuc.php";
  include "../model/sanpham.php";
  include "../model/donhang.php";
  include '../model/pdo.php';
  include "header.php";


  //controller
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
      case 'adddm':
        //Kiểm tra người dùng có click vào nút Add hay không
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $tenloai=$_POST['tenloai'];
          insert_danhmuc($tenloai);
          $thongbao="Thêm thành công";
        }
        include './danhmuc/add.php';
        break;
      case 'listdm':
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;
      case 'xoadm':
        if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
          delete_danhmuc($_GET['id_dm']);
        }
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;
      case 'suadm':
        if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
          $dm= loadOne_danhmuc($_GET['id_dm']);
        }
        include "./danhmuc/update.php";
        break;
      case 'updatedm':
        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
          $tenloai=$_POST['tenloai'];
          $id=$_POST['id_dm'];
          update_danhmuc($id,$tenloai);
          $thongbao="Cập nhật thành công";
        }
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;




        // SẢN PHẨM




      case 'addsp':
        //Kiểm tra người dùng có click vào nút Add hay không
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $id_dm=$_POST['id_dm'];
          $tensp=$_POST['tensp'];
          $giasp=$_POST['giasp'];
          $mota=$_POST['mota'];
          $target_dir = "../img/";
          $anhsp=$_FILES['anhsp']['name'];
          $target_file = $target_dir . basename($_FILES['anhsp']['name']);
          if(move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file)){
          }else{
             echo 'Lỗi';
          }
          insert_sanpham($tensp,$giasp,$anhsp,$mota,$id_dm);
          $thongbao="Thêm thành công";
        }
        $listdanhmuc=loadAll_danhmuc();
        include './sanpham/add.php';
        break;
      case 'listsp':
        if(isset($_POST['listOK'])&&($_POST['listOK'])){
          $kyw=$_POST['kyw'];
          $id_dm=$_POST['id_dm'];
        }else{
          $kyw='';
          $id_dm=0;
        }
        $listdanhmuc=loadAll_danhmuc();
        $listsanpham=loadAll_sanpham($kyw,$id_dm);
        include './sanpham/list.php';
        break;
      case 'xoasp':
        if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
          delete_sanpham($_GET['id_sp']);
        }
        $listsanpham=loadAll_sanpham("",0);
        include './sanpham/list.php';
        break;
      case 'suasp':
        if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
          $sanpham= loadOne_sanpham($_GET['id_sp']);
        }
        $listdanhmuc=loadAll_danhmuc();
        include "./sanpham/update.php";
        break;
      case 'updatesp':
        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
          $id_sp=$_POST['id_sp'];
          $id_dm=$_POST['id_dm'];
          $tensp=$_POST['tensp'];
          $giasp=$_POST['giasp'];
          $mota=$_POST['mota'];
          $anhsp=$_FILES['anhsp']['name'];
          $target_dir = "../img/";
          $target_file = $target_dir . basename($_FILES['anhsp']['name']);
          if(move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file)){
            // echo 'The file'. htmlspecialchars( basename( $_FILES['anhsp']['name'])). 'has been uploaded.';
          }else{
            // echo 'Sorry, there was an error uploading your file.';
          }
          update_sanpham($id_sp,$id_dm,$tensp,$giasp,$mota,$anhsp);
        }
        $listdanhmuc=loadAll_danhmuc();
        $listsanpham=loadAll_sanpham("",0);
        include './sanpham/list.php';
        break;
        case 'listdonhang':
          $listdonhang=loadAll_donhang();
          include './donhang/list.php';
          break;
        case 'suadonhang':
          if(isset($_GET['id'])&&($_GET['id']>0)){
            $dm= loadOne_donhang($_GET['id']);
          }
          include "./donhang/update.php";
          break;
        case 'updatedonhang':
          if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            $trangthai=$_POST['trangthai'];
            $id=$_POST['id'];
            update_donhang($id,$trangthai);
            $thongbao="Cập nhật thành công";
          }
          $listdonhang=loadAll_donhang();
          include './donhang/list.php';
          break;    
        default:
          include 'home.php';
          break;
    }
  }else{
    
  }


  
?>