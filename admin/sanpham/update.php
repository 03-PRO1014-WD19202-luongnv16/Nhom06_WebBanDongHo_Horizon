<?php
  if(is_array($sanpham)){
    extract($sanpham);
  }
  $anhsppath="../img/".$anhsp;
  if(is_file($anhsppath)){
    $anhsp="<img src='".$anhsppath."'height='100' width='100'>";
  }else{
    $anhsp="no photo";
  }
?>
<div class="row">
        <div class="row form-title"><h1>CẬP NHẬT LOẠI HÀNG HÓA</h1></div>
        <div class="row form-content">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
            <select name="id_dm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php 
                      foreach($listdanhmuc as $danhmuc){
                        if($id_dm==$danhmuc['id_dm']) $s="selected";else $s="";
                          echo '<option value="'.$danhmuc['id_dm'].'" '.$s.'>'.$danhmuc['tendm'].'</option>';
                      }
                    ?>
            </select>
            </div>
            <div class="row mb10">
              Tên sản phẩm <br />
              <input type="text" name="tensp" id="" value="<?=$tensp?>" />
            </div>
            <div class="row mb10">
              Giá<br />
              <input type="text" name="giasp" id="" value="<?=$giasp?>" />
            </div>
            <div class="row mb10">
              Hình<br />
              <input type="file" name="anhsp" id="" />
              <?=$anhsp?>
            </div>
            <div class="row mb10">
              Mô tả<br />
              <textarea name="mota" id="" cols="30" rows="10"><?=$mota?></textarea>
            </div>
            <div class="row mb10">
              <input type="hidden" name="id" value="<?=$id?>">
              <input type="submit" name="capnhat" value="Cập nhật" />
              <input type="reset" name="nhaplai" value="Nhập lại" />
              <a href="index.php?act=listsp"
                ><input type="button" name="btn_list" value="Danh sách"
              /></a>
            </div>
            <?php
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
          </form>
        </div>
      </div>
    </div>