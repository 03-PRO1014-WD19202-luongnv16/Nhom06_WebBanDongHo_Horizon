<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row">
    <div class="row frmtitle mb">
        <center><h1>Danh sách đơn hàng</h1></center>
    </div>
    <form action="index.php?act=listdonhang" method="post">
        <input type="text" name="kyw" placeholder="Nhập mã đơn" id="">
        <input type="submit" name="listok" value="Tìm kiếm">
    </form>
    <div class="row mb10 frmdsloai">
    <table >

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
           
        </tr>

        <?php
        foreach($listdonhang as $list){
            extract($list);
            $suabill="index.php?act=updatebill&id=".$id;
            $anhsppath="../img/".$anhsp;
                    if(is_file($anhsppath)){
                      $anhsp="<img src='".$anhsppath."'height='100' width='100'>";
                    }else{
                      $anhsp="no photo";
                    }
            // $kh=$bill["bill_name"].'
            // <br>'.$bill["bill_email"].'</br>'.$bill["bill_address"].' '.$bill["bill_tel"];
            // $ttdh=get_ttdh($bill['bill_status']);
            // $countsp=loadall_cart_coubt($bill['id']);
            echo '<tr>
            <th><input type="checkbox"></th>
            <th>'.$id.'</th>
            <th>'.$id_sp.'</th>
            <th>'.$tensp.'</th>
            <th>'.$anhsp.'</th>
            <th>'.get_ttdh($trangthai).'</th>
            <th>'.get_pttt($pttt).'</th>
            <th>'.$gia.'</th>
            <th>'.$soluong.'</th>
            <th>'.$gia * $soluong.'</th>
            
            <th><a href="'.$suabill.'"><input type="button" value="Sửa"></a></th>
            </th>';
            
        }
        ?>
        </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
        </div>
    
    </div> 
</div>  
</body>
</html>