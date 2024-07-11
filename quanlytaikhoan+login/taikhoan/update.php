<?php
  
   if(is_array($taikhoan_one)){
    extract($taikhoan_one);
   }
                $hinhpath = "../uploads/".$img;
                if(is_file($hinhpath)){
                 $hinh = "<img src='".$hinhpath."' height='80'>";
                }else{
                 $hinh = "no photo";
                }
                // var_dump($taikhoan_one);
                // var_dump($hinhpath);
?>
<div class="content-chinh row">
    <h2>Update tài khoản</h2>
</div>
<div class="form-them-moi row">
    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
        <div class="row mb ma-loai">
            <label for="">ID khách hàng</label><br>
            <input type="text" name="maloai" disabled placeholder="Auto number"><br>
        </div>
        <div class="row mb ten-loai">
            <label for="">Tên tài khoản</label><br>
            <input type="text" name="user" value="<?php if(isset($user)&& ($user!="")) echo $user  ?>">
        </div>
        <div class="row mb ten-loai-mk" style="">
            <label for="">Mật khẩu</label><br>
            <input type="password" name="pass" value="<?php if(isset($pass)&& ($pass!="")) echo $pass  ?>">
        </div>
        <div class="row mb ten-loai-mk">
            <label for="">Email</label><br>
            <input type="email" name="email" value="<?php if(isset($email)&& ($email!="")) echo $email  ?>">
        </div>
        <div class="row mb ten-loai">
            <label for="">Địa chỉ</label><br>
            <input type="text" name="diachi" value="<?php if(isset($diachi)&& ($diachi!="")) echo $diachi  ?>">
        </div>
        <div class="row mb ten-loai">
            <label for="">Tel</label><br>
            <input type="text" name="tel" value="<?php if(isset($tel)&& ($tel!="")) echo $tel  ?>">
        </div>
        <div class="row mb ten-loai">
            <label for="">Vai trò</label><br>
            <input type="text" name="role" value="<?php if(isset($role)&& ($role!="")) echo $role  ?>">
        </div>
        <div class="row mb ten-loai">
            <label for="">Ảnh</label><br>
            <input type="file" name="hinh">
            <?php echo $hinh ?>
        </div>
        <div class="row btn">
            <input type="hidden" name="id" value="<?php if(isset($id)&& ($id>0)) echo $id  ?>">
            <input type="submit" value="Cập nhật" name="capnhat">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=dskh"> <input type="button" value="Danh sách"></a>
        </div>
    </form>
</div>
<?php 
    
?>