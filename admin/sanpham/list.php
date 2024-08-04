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
    <div class="title">DANH SÁCH LOẠI HÀNG HÓA</div>
    <form action="index.php?act=listsp" method="post">
      <input type="text" name="kyw" id="">
      <select name="id_dm" id="">
        <option value="0" selected>Tất cả</option>
        <?php 
          foreach($listdanhmuc as $danhmuc){
            extract($danhmuc);
            echo '<option value="'.$id_dm.'">'.$name.'</option>';
          }
        ?>
      </select>
      <input type="submit" name="listOK" value="Go">
    </form>
    <div class="">
      <form action="index.php?act=listsp" method="post">
        <div class="button-group">
          <a  href="index.php?act=addsp"><input class="button" type="button" value="Nhập thêm" /></a>
        </div>
        <div class="container">
          <table border="0" class="table">
            <thead>
              <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN SẢN PHẨM</th>
                <th>HÌNH</th>
                <th>GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>MÔ TẢ</th>
                <th>LƯỢT XEM</th>
                <th>Ngày</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="product-list">
              <?php
                foreach($listsanpham as $sanpham){
                  extract($sanpham);
                  $suasp="index.php?act=suasp&id_sp=".$id_sp;
                  $xoasp="index.php?act=xoasp&id_sp=".$id_sp;
                  $hinhpath="../img/".$anhsp;
                  if(is_file($hinhpath)){
                    $hinh="<img src='".$hinhpath."' height='200' width='200'>";
                  }else{
                    $hinh="no photo";
                  }
                  echo ' <tr class="table-data">
                          <td><input type="checkbox" name="" id="" /></td>
                          <td><center>'.$id_sp.'</center></td>
                          <td><center>'.$tensp.'</center></td>
                          <td><center>'.$hinh.'</center></td>
                          <td><center>'.$giasp.'</center></td>
                          <td><center>'.$soluong.'</center></td>
                          <td><center>'.$mota.'</center></td>
                          <td><center>'.$luotxem.'</center></td>
                          <td><center>'.$date.'</center></td>
                          <td>
                            <center>
                              <a href="'.$suasp.'"><input class="button" type="button" value="Sửa" /></a>
                              <a onclick="return confirm(\'Bạn có chắc muốn xóa?\')" href="'.$xoasp.'"><input class="button" type="button" value="Xóa" /></a>
                            </center>
                          </td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
      </form> 
    </div>
  </div>
</body>
</html>
