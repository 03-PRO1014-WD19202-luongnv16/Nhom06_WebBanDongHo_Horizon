
<?php
 include 'model/pdo.php';
 function checkuser($user,$pass){
    $sql="select * from taikhoan where user='".$user."' AND pass='".$pass."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
 if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $checkuser=checkuser($user,$pass);
    if(is_array($checkuser)){
        $_SESSION['user']=$checkuser;
        // $thongbao="Bạn đã đăng nhập thành công!";
        header('Location:admin/index.php');
        
    }else{
        $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra lại !";
    }                   
        
    }
?>
<div class="login-container">
<h2>Đăng Nhập ADMIN</h2>
<form action="login.php" method="post">
   <label for="user">user:</label><br>
   <input type="text" id="user" name="user"><br>
   <label for="pass">pass:</label><br>
   <input type="pass" id="pass" name="pass"><br>
   <input type="submit" value="Đăng Nhập" name="dangnhap">
</form>
</div>


