<?php
if(is_array($sanpham)){
  extract($sanpham);
}
$hinhpath="../img/".$anhsp;

if(is_file($hinhpath)){
  $hinh="<img src='".$hinhpath."' height='100' width='100'>";
}else{
  $hinh="no photo";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');

  </style>
</head>
<body>
  <div class="main-content">
    <div class="title">CẬP NHẬT LOẠI HÀNG HÓA</div>
    <div class="container">
      <form class="input-form" action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        <div class="input-data-text">
          
          <div class="input">
            Tên sản phẩm <br />
            <input class="input-data" type="text" name="tensp" value="<?=$tensp?>" />
          </div>
          <div class="input">
            Giá<br />
            <input class="input-data" type="text" name="giasp" value="<?=$giasp?>" />
          </div>
          <div class="input">
            Số Lượng<br />
            <input class="input-data" type="number" name="soluong" value="<?=$soluong?>" />
          </div>
          <div class="input">
            Mô tả<br />
            <textarea class="input-data" name="mota" cols="30" rows="10"><?=$mota?></textarea>
          </div>
          <div class="input">
            <input type="hidden" name="id_sp" value="<?=$id_sp?>" />
          </div>
        </div>
        <div class="input-data-file">
          <div class="input">
            Danh mục <br />
            <select class="input-data select-data" name="id_dm" id="">
              <?php 
                foreach($listdanhmuc as $danhmuc){
                  extract($danhmuc);
                  $selected = ($id_dm == $danhmuc['id_dm']) ? 'selected' : '';
                  echo '<option value="'.$id.'">'.$name.'</option>';
                }
              ?>
            </select>
          </div>   
          <div class="input">
            Hình<br />
            <input class="input-data" type="file" name="hinh" />
            <?=$hinh?>
          </div> 
          <div class="input">
            Ngày<br />
            <input class="input-data" type="date" name="date" value="<?=$date?>" />
          </div>
          <div class="input">
            Lượt xem<br />
            <input class="input-data" type="number" name="luotxem" value="<?=$luotxem?>" />
          </div>      
        </div>
        <div class="input-button">
          <input type="submit" class="button" name="capnhat" value="Cập nhật" />
          <input type="reset" class="button" name="nhaplai" value="Nhập lại" />
          <a href="index.php?act=listsp">
            <input type="button" class="button" name="btn_list" value="Danh sách" />
          </a>
        </div>
        <?php
        if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
      </form>
    </div>
  </div>
</body>
</html>
