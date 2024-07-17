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
    <div class="title">SỬA BILL</div>
    <div class="container">
      <form action="index.php?act=updatebill" method="POST">
        <center>
          <div class="title">Đơn Hàng 
            <?php
            $id = $_GET['id'];
            echo "$id";
            ?>
          </div>
        </center>
        <div class="input">
          Tình trạng đơn hàng <br>
          <select class="input-data" name="ttdh">
            <option value="0">Đơn hàng mới</option>
            <option value="1">Đang xử lý</option>
            <option value="2">Đang giao hàng</option>
            <option value="3">Đã giao hàng</option>
          </select>
        </div>
        <div class="input-button">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="submit" class="button" name="capnhatbill" value="Cập nhật">
          <input type="reset" class="button" value="Nhập lại">
          <a href="index.php?act=listbill"><input type="button" class="button" value="Danh sách"></a>
        </div>
      </form>
      <?php
      if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
      ?>
    </div>
  </div>
</body>

</html>