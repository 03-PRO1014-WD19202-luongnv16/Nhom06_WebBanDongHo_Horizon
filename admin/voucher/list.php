<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row">
  <div class="row frmtitle"><center><h1>Danh sách voucher</h1></center></div>
  <div class="row form-content">
    <form action="" method="post">
      <div class="row mb10 frmdsloai">
        <table>
          <tr>
            <th></th>
            <th>MÃ VOUCHER</th>
            <th>TÊN VOUCHER</th>
            <th></th>
          </tr>
          <?php
            foreach($listvoucher as $voucher){
              extract($voucher);
              $suavoucher="index.php?act=suavoucher&id=".$id;
              $xoavoucher="index.php?act=xoavoucher&id=".$id;
              echo ' <tr>
                      <td><input type="checkbox" name="" id="" /></td>
                      <td>'.$id.'</td>
                      <td>'.$ten_voucher.'</td>
                      <td>
                        <a href="'.$suavoucher.'"><input type="button" value="Sửa" /></a>
                        <a onclick="return confirm(\'Bạn có chắc muốn xóa?\')" href="'.$xoavoucher.'"><input type="button" value="Xóa" /></a>
                      </td>
                                        
                    </tr>';
            }
          ?>
          
        </table>
        
      </div>
      <div class="row mb10">
        <input type="button" name="btn_all" value="Chọn tất cả" />
        <input type="button" name="btn_remove_all" value="Bỏ chọn tất cả" />
        <input type="button" name="btn_delete_all" value="Xóa các mục đã chọn" />
        <a href="index.php?act=addvoucher"><input type="button" btn="nhapthem" value="Nhập thêm" /></a>
      </div>
    </form> 
  </div>
</div>
</body>
</html>
