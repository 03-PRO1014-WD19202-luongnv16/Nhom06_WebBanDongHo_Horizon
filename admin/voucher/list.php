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
        <div class="title">  
            <center>  
                <h1>Danh sách voucher</h1>  
            </center>  
        </div>  
        <div class="container">  
            <table class="table">  
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
                                <td><center>'.$id.'</center></td>  
                                <td><center>'.$ten_voucher.'</center></td>  
                                <td>  
                                    <a href="'.$suavoucher.'"><input type="button" class="button" value="Sửa" /></a>  
                                    <a onclick="return confirm(\'Bạn có chắc muốn xóa?\')" href="'.$xoavoucher.'"><input class="button"  type="button" value="Xóa" /></a>  
                                </td>                           
                            </tr>';  
                }  
                ?>  

            </table>  

            <div class="input-button">  
                <input type="button" class="button" name="btn_all" value="Chọn tất cả" />  
                <input type="button" class="button" name="btn_remove_all" value="Bỏ chọn tất cả" />  
                <input type="button" class="button" name="btn_delete_all" value="Xóa các mục đã chọn" />  
                <a href="index.php?act=addvoucher"><input class="button"  type="button" name="nhapthem" value="Nhập thêm" /></a>  
            </div>  
        </div>  
    </div>  
</body>  

</html>