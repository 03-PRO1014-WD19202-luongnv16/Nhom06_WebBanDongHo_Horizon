<?php
  if(is_array($voucher)){
    extract($voucher);
  }
?>
<div class="row">
        <div class="row form-title"><h1>CẬP NHẬT VOUCHER</h1></div>
        <div class="row form-content">
          <form action="index.php?act=updatevoucher" method="post">
            <div class="row mb10">
              Mã Voucher <br />
              <input type="text" name="id" id="" disabled />
            </div>
            <div class="row mb10">
              Tên Voucher <br />
              <input type="text" name="ten_voucher" id="" value ="<?php if(isset($ten_voucher)&&($ten_voucher!="")) echo $ten_voucher;?>" />
            </div>
            <div class="row mb10">
              <input type="hidden" name="id" value ="<?php if(isset($id)&&($id>0)) echo $id;?>">
              <input type="submit" name="capnhat" value="CẬP NHẬT" />
              <input type="reset" name="nhaplai" value="NHẬP LẠI" />
              <a href="index.php?act=listvoucher"
                ><input type="button" name="btn_list" value="DANH SÁCH"
              /></a>
            </div>
            <?php
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
          </form>
        </div>
      </div>
    </div>
    
