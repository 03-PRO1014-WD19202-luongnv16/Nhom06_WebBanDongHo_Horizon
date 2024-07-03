<div class="content-chinh row">
    <h2>THÊM MỚI TÀI KHOẢN</h2>
</div>
<div class="form-them-moi row">
    <form action="index.php?act=addtk" method="post" enctype="multipart/form-data">
        <div class="row mb ma-loai">
            <label for="">ID khách hàng</label><br>
            <input type="text" name="maloai" disabled placeholder="Auto number"><br>
        </div>
        <div class="row mb ten-loai">
            <label for="">Tên tài khoản</label><br>
            <input type="text" name="user">
        </div>
        <div class="row mb ten-loai-mk" style="">
            <label for="">Mật khẩu</label><br>
            <input type="password" name="pass">
        </div>
        <div class="row mb ten-loai-mk">
            <label for="">Email</label><br>
            <input type="email" name="email">
        </div>
        <div class="row mb ten-loai">
            <label for="">Địa chỉ</label><br>
            <input type="text" name="diachi">
        </div>
        <div class="row mb ten-loai">
            <label for="">Tel</label><br>
            <input type="text" name="tel">
        </div>
        <div class="row mb ten-loai">
            <label for="">Vai trò</label><br>
            <input type="text" name="role">
        </div>
        <div class="row mb ten-loai">
            <label for="">Ảnh</label><br>
            <input type="file" name="hinh">
        </div>
        <div class="row btn">

            <input type="submit" value="Thêm mới" name="themmoi">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=dskh"> <input type="button" value="Danh sách"></a>
        </div>
    </form>
    <h4 style="color:red">
        <?php
        if(isset($thongbao) && $thongbao!=""){
            echo $thongbao;
        }
    ?>
    </h4>
</div>
<?php 
    
?>