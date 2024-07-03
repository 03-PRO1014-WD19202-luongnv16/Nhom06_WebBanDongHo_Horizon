<div class="content-chinh row">
    <h2>DANH SÁCH TÀI KHOẢN</h2>
</div>
<div class=" row">
    <table border="2">
        <tr>
            <th></th>
            <th>MÃ TÀI KHOẢN</th>
            <th>TÊN ĐĂNG NHẬP</th>
            <th>MẬT KHẨU</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>SỐ ĐIỆN THOẠI</th>
            <th>VAI TRÒ</th>
            <th>ẢNH</th>
            <th>HÀNH ĐỘNG</th>


        </tr>

        <?php 
            foreach ( $listtaikhoan as $tk) {
                extract($tk);
                $suatk ="index.php?act=suatk&id=".$id;
                $xoatk ="index.php?act=xoatk&id=".$id;
                $hinhpath = "../uploads/".$img;
                if(is_file($hinhpath)){
                 $hinh = "<img src='".$hinhpath."' height='80'>";
                }else{
                 $hinh = "no photo";
                }
                echo '<tr>
                <td><input type="checkbox"></td>
                <td>'.$id.'</td>
                <td>'.$user.'</td>
                <td>'.$pass.'</td>
                <td>'.$email.'</td>
                <td>'.$diachi.'</td>
                <td>'.$tel.'</td>
                <td>'.$role.'</td>
                <td>'.$hinh.'</td>


                <td>
                    <a href="'.$suatk.'"><button>Sửa</button></a>
                    <a href="'.$xoatk.'"><button>Xoá</button></a>
                
                </td>
            </tr>';
            }

        ?>


    </table>
</div>
<div class="row btn-danh-sach-hang btn">
    <a href="index.php?act=addtk"><input type="button" value="Thêm mới tài khoản"></a>

</div>