    <?php
include '../model/pdo.php';
 include "../model/taikhoan.php";
  include "../model/danhmuc.php";
  include "../model/sanpham.php";
  include "../model/donhang.php";
  include "../model/voucher.php";
  include "sidebar.php";

  //controller
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
      case 'adddm':
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $tendm = $_POST['tendm'];
          insert_danhmuc($tendm);
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
          $tendm=$_POST['tendm'];
          $id_dm=$_POST['id_dm'];
          update_danhmuc($id_dm,$tendm);
          $thongbao="Cập nhật thành công";
        }
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;
      case 'addsp':
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $id_dm=$_POST['id_dm'];
          $tensp=$_POST['tensp'];
          $giasp=$_POST['giasp'];
          $soluong=$_POST['soluong'];
          $mota=$_POST['mota'];
          $luotxem=$_POST['luotxem'];
          $date=$_POST['date'];
          $target_dir = "../img/";
          $anhsp=$_FILES['anhsp']['name'];
          $target_file = $target_dir . basename($_FILES['anhsp']['name']);
          if(move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file)){
          }else{
             echo 'Lỗi';
          }
          insert_sanpham($tensp,$giasp,$anhsp,$soluong,$mota,$id_dm,$luotxem,$date);
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
        if(isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)){  
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
            $soluong=$_POST['soluong'];
            $mota=$_POST['mota'];
            $luotxem=$_POST['luotxem'];
            $date=$_POST['date'];
            $hinh=$_FILES['hinh']['name'];
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES['hinh']['name']);
            if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
              
            }else{
              
            }
            update_sanpham($id_sp,$tensp, $hinh, $giasp,$soluong, $mota, $id_dm, $luotxem,$date);
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
        case 'addvoucher':
          if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
            $ten_voucher=$_POST['ten_voucher'];
            insert_danhmuc($ten_voucher);
            $thongbao="Thêm thành công";
          }
          include './voucher/add.php';
          break;  
        case 'listvoucher':
          $listvoucher=loadAll_voucher();
          include './voucher/list.php';
          break;
        case 'xoavoucher':
          if(isset($_GET['id'])&&($_GET['id']>0)){
            delete_voucher($_GET['id']);
          }
          $listvoucher=loadAll_voucher();
          include './voucher/list.php';
          break;
        case 'suavoucher':
          if(isset($_GET['id'])&&($_GET['id']>0)){
            $voucher= loadOne_voucher($_GET['id']);
          }
          include "./voucher/update.php";
          break;
        case 'updatevoucher':
          if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            $id=$_POST['id'];
            $ten_voucher=$_POST['ten_voucher'];
            update_voucher($id,$ten_voucher);
            $thongbao="Cập nhật thành công";
          }
          $listvoucher=loadAll_voucher();
          include './voucher/list.php';
          break;     
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
                  $target_dir ="../img/";
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
                  $target_dir ="../img/";
                  $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
                  move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
                  insert_taikhoan_admin($user,$pass,$email,$diachi,$tel,$role,$hinh);
                  $thongbao ="Thêm mới thành công!";
                  }
                  
                  include "taikhoan/add.php"; 
                  break;
      default:
      include "home.php";
      break;     
    }
  }
?>