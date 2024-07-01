<div class="row">
    <div class="row frmtitle mb">
        <h1>Danh sách đơn hàng</h1>
    </div>
    <form action="index.php?act=listdonhang" method="post">
        <input type="text" name="kyw" placeholder="Nhập mã đơn" id="">
        <input type="submit" name="listok" value="GO">
    </form>
    <div class="row mb10 frmdsloai">
    <table>

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
            <td><input type="checkbox"></td>
            <td>'.$id.'</td>
            <td>'.$id_sp.'</td>
            <td>'.$tensp.'</td>
            <td>'.$anhsp.'</td>
            <td>'.get_ttdh($trangthai).'</td>
            <td>'.get_pttt($pttt).'</td>
            <td>'.$gia.'</td>
            <td>'.$soluong.'</td>
            <td>'.$gia * $soluong.'</td>
            <td><a href="'.$suabill.'"><input type="button" value="Sửa"></a>
            </tr>';
            
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