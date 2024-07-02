
<div class="row">
            <div class="row frmtitle"><h1>SỬA BILL</h1></div>
            <div class="row frmcontent">
            <form action="index.php?act=updatebill" method="POST">
                <div class="row mb10">Đơn Hàng <?php
                $id=$_GET['id'];
                echo "$id" ;
                ?></div>
                    <div class="row mb10">
                    Tình trạng đơn hàng <br>
                    <select name="ttdh" >
                        <option value="0">Đơn hàng mới</option>
                        <option value="1">Đang xử lý</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                    </select>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?=$id?>"> 
                        <input type="submit" name="capnhatbill" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listbill"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                    if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
                    ?>
                </form>
    
            </div>
        </div>
    </div>