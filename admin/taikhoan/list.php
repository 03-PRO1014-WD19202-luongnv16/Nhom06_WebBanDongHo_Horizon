<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>List of Accounts</title>  
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS file here -->  
</head>  

<body>  
    <div class="main-content">
    <div class="title">  
        <center>  
            <h2>DANH SÁCH TÀI KHOẢN</h2>  
        </center>  
    </div>  
    <div class="container">  
        <table>  
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
            foreach ($listtaikhoan as $tk) {  
                extract($tk);  
                $suatk = "index.php?act=suatk&id=" . $id;  
                $xoatk = "index.php?act=xoatk&id=" . $id;  
                $hinhpath = "../img/" . $hinh;  
                $hinh = (is_file($hinhpath)) ? "<img src='" . $hinhpath . "' height='80'>" : "no photo";  
                echo '<tr>  
                    <td><input type="checkbox"></td>  
                    <td><center>' . $id . '</center></td>  
                    <td><center>' . $user . '</center></td>  
                    <td><center>' . $pass . '</center></td>  
                    <td><center>' . $email . '</center></td>  
                    <td><center>' . $diachi . '</center></td>  
                    <td><center>' . $tel . '</center></td>  
                    <td><center>' . $role . '</center></td>  
                    <td><center>' . $hinh . '</center></td>  
                    <td>  
                        <a href="' . $suatk . '"><input type="button" class="button" value="Sửa"></a>  
                        <a href="' . $xoatk . '"><input type="button" class="button" value="Xoá"></a>  
                    </td>  
                </tr>';  
            }  
            ?>  
            
        </table>  
        <div class="input-button">  
            <a href="index.php?act=addtk"><input class="button" type="button" value="Thêm mới tài khoản"></a>  
        </div>  
    </div>  
    </div>
        
</body>  
</html>