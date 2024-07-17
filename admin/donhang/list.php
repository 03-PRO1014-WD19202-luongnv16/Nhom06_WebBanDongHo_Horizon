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
    <div class="main-content"> <div class="title">
        <h1>Danh sách đơn hàng</h1>
        <form action="index.php?act=listdonhang" method="post">
            <input class="button" type="text" name="kyw" placeholder="Nhập mã đơn" id="">
            <input class="button" type="submit" name="listok" value="Tìm kiếm">
        </form>
    </div>
    <div class="container">
        <table class="table">
            <tr>
                <th></th>
                <th>MÃ</th>
                <th>MÃ SP</th>
                <th>TÊN SP</th>
                <th>ẢNH SP</th>
                <th>TRẠNG THÁI</th>
                <th>PTTT</th>
                <th>GIÁ SP</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
                <th></th>
            </tr>
            <?php foreach($listdonhang as $list): ?>
            <?php
                extract($list);
                $suabill = "index.php?act=suadonhang&id=" . $id;
                $anhsppath = "../img/" . $anhsp;
                if (is_file($anhsppath)) {
                    $anhsp = "<img src='" . $anhsppath . "' height='100' width='100'>";
                } else {
                    $anhsp = "no photo";
                }
            ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><center><?= $id ?></center></td>
                <td><center><?= $id_sp ?></center></td>
                <td><center><?= $tensp ?></center></td>
                <td><center><?= $anhsp ?></center></td>
                <td><center><?= get_ttdh($trangthai) ?></center></td>
                <td><center><?= get_pttt($pttt) ?></center></td>
                <td><center><?= $gia ?></center></td>
                <td><center><?= $soluong ?></center></td>
                <td><center><?= $gia * $soluong ?></center></td>
                <td><a href="<?= $suabill ?>"><input class="button" type="button" class="button" value="Sửa"></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div></div>
</body>

</html>