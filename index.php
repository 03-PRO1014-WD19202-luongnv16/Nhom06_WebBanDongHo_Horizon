<?php

  include "../model/danhmuc.php";
  include "../model/sanpham.php";
  include "../model/donhang.php";
  include '../model/pdo.php';
  include "../model/taikhoan.php";
  include "header.php";


  //controller
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
     

          case 'dskh':
                        
            $listtaikhoan =loadall_taikhoan();
            include "taikhoan/list.php"; 
            break;           
           
            case 'xoatk':
               if(isset($_GET['id']) && ($_GET['id']>0)){
                   delete_taikhoan($_GET['id']);
               }
               $listtaikhoan =loadall_taikhoan();
                include "taikhoan/list.php";
                break;        

        case 'suatk':
           if(isset($_GET['id']) && ($_GET['id']>0)){
               $taikhoan_one = loadone_taikhoan($_GET['id']);
           }
           
           include "taikhoan/update.php"; 
       break;
       
       case 'updatetk':
           if(isset($_POST['capnhat']) &&($_POST['capnhat'])){
           $id =$_POST['id'];
           $user =$_POST['user'];
           $pass=$_POST['pass'];
           $email =$_POST['email'];
           $diachi =$_POST['diachi'];
           $tel=$_POST['tel'];
           $role =$_POST['role'];
           $hinh = $_FILES['hinh']['name'];
           $target_dir ="../uploads/";
           $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
           move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
           
           update_taikhoan_admin($id,$user,$pass,$email,$diachi,$tel,$role,$hinh);
           // $thongbao ="Cập nhậttài khoản thành công!";
           }
           $listtaikhoan =loadall_taikhoan();
           include "taikhoan/list.php";
           break;
       case'addtk':
          if(isset($_POST['themmoi']) && ($_POST['themmoi'] )){
           $user =$_POST['user'];
           $pass =$_POST['pass'];
           $email =$_POST['email'];
           $diachi =$_POST['diachi'];
           $tel =$_POST['tel'];
           $role =$_POST['role'];
           $hinh = $_FILES['hinh']['name'];
           $target_dir ="../uploads/";
           $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
           move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
           insert_taikhoan_admin($user,$pass,$email,$diachi,$tel,$role,$hinh);
           $thongbao ="Thêm mới thành công!";
          }
           
          include "taikhoan/add.php"; 
           break;

          
        default:
          include 'home.php';
          break;
          
    }
  }else{
    
  }


  
?>