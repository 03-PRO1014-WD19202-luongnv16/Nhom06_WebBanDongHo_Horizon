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

        <div>
            <h3></h3>
            <h3>MÃ</h3>
            <h3>MÃ SP</h3>
            <h3>TÊN SP</h3>
            <h3>ẢNH SP</h3>
            <h3>TRẠNG THÁI</h3>
            <h3>PTTT</h3>
            <h3>GIÁ SP</h3>
            <h3>SỐ LƯỢNG</h3>
            <h3>THÀNH TIỀN</h3>
           
        </div>

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
            echo '<div>
            <input type="checkbox">
            <div>'.$id.'</div>
            <div>'.$id_sp.'</div>
            <div>'.$tensp.'</div>
            <div>'.$anhsp.'</div>
            <div>'.get_ttdh($trangthai).'</div>
            <div>'.get_pttt($pttt).'</div>
            <div>'.$gia.'</div>
            <div>'.$soluong.'</div>
            <div>'.$gia * $soluong.'</div>
            <div><a href="'.$suabill.'"><input type="button" value="Sửa"></a>
            </div>';
            
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