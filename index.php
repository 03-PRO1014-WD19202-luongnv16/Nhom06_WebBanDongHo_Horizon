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
            if(isset($_POST['kyw']) && $_POST['kyw'] != "") {  
                $kyw = $_POST['kyw'];  
            } else {  
                $kyw = "";  
            }  
            if(isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {  
                $id_dm = $_GET['id_dm'];                               
            } else {  
                $id_dm = 0;  
            }  
            $dssp = loadall_sanpham($kyw, $id_dm);  
            $tendm = loadone_sanpham($id_dm);  
            include "view/sanpham.php";  
            break;  
        case 'hot':  
        case 'famous':  
        case 'limited':  
            include "/view$act.php";  
            $showProductList = false;  
            break;   
        case 'addToCart':  
            if (isset($_GET['id_sp'])) {  
                $id_sp = $_GET['id_sp'];  
                addToCart($id_sp);  
            }  
            break;  
        case 'dangnhap':  
            if (isset($_POST['dangnhap'])) {  
                $user = $_POST['user'];  
                $pass = $_POST['pass'];  
                $checkuser = check_user($user, $pass);  
                if (is_array($checkuser)) {  
                    $_SESSION['user'] = $checkuser;  
                    header("Location: index.php");  
                    exit;  
                } else {  
                    $thongbao = "Tài khoản không tồn tại. Vui lòng đăng ký hoặc đăng nhập lại!";  
                }  
            }  
            include "view/login.php";  
            $showProductList = false;  
            break;  
            case 'dangky':
                if (isset($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Đã đăng ký thành công!";
    
                }
                include "view/dangnhap.php";
                
                break;
            case 'quenmk':
                if (isset($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $checkemail = check_email($email);
                    if (is_array($checkemail)) {
                        $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                    } else {
                        $thongbao = "Email không tồn tại";
                    }
    
                }
                include "view/forgot.php";
                $showProductList = false;
                break;
            case 'dangxuat':
                session_unset();
                header('Location: index.php');
                exit;           
        }  
}  

if ($showProductList) {  
    include "view/sanpham.php";   
}  

include "view/footer.php";  
?>  
<script src="script.js"></script>