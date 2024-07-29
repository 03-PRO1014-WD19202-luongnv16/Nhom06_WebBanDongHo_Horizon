<?php
if (is_array($donhang_one)) {
    extract($donhang_one);
    $bill_items=load_all_cart_items($bill_id);
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
        <div class="title">SỬA BILL</div>
        <div class="container">
            <form action="index.php?act=updatebill" method="POST">
                <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>TRẠNG THÁI</th>
                    </tr>
                    <tr>
                        <td>HORIZON-<?= $bill_id ?></td>
                        <td>
                            <div class="input">
                                <center><select class="input-data" name="ttdh">
                                        <option value="0" <?= $trangthai == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                                        <option value="1" <?= $trangthai == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                                        <option value="2" <?= $trangthai == 2 ? 'selected' : '' ?>>Đang giao hàng
                                        </option>
                                        <option value="3" <?= $trangthai == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                                    </select>
                                </center>
                            </div>
                        </td>
                    </tr>
                    <table>
                        <th>
                            <center>
                                <h4>Thông tin User: </h4>
                            </center>
                        </th>
                        <tr>
                            <td>Người đặt hàng:</td>
                            <td><input class="input-data" type="text" name="bill_name" value="<?= $bill_name ?>"
                                    disabled></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input class="input-data" type="text" name="diachi" value="<?= $diachi ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input class="input-data" type="text" name="tel" value="<?= $tel ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Email liên hệ:</td>
                            <td><input class="input-data" type="text" name="email" value="<?= $email ?>" disabled></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                        <?php 
                        foreach($bill_items as $item){
                            echo' 
                            <tr>
                                <td><center>' .$item['tensp'] . '</center></td>
                                <td><img src="../img/' . $item['anhsp'] . '" height="100" width="100" ></center></td>
                                <td><center>' .$item['giasp'] . ' VNĐ</center></td>
                                <td><center>' .$item['quantity'] . '</center></td>
                            </tr>';
                        }
                        ?>
                    </table>
                    <tr>
                        <td colspan="2">
                            <div class="input-button">
                                <input type="hidden" name="bill_id" value="<?= $bill_id ?>">
                                <input type="submit" class="button" name="capnhat" value="Cập nhật">
                                <input type="reset" class="button" value="Nhập lại">
                                <a href="index.php?act=listdonhang"><input type="button" class="button"
                                        value="Danh sách"></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>