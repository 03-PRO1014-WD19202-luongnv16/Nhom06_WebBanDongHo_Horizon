<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mk</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-container">
        <div class="tieude-login">
            <h2>Quên mật khẩu</h2>
        </div>
        <div class="form-login quen-mk">
            <form action="index.php?act=quenmk" method="post">
                <input type="text" placeholder="Email" required name="email">
                <!-- <input type="password" placeholder="Mật khẩu" required> -->
                <input type="submit" value="Gửi" name="guiemail">
                <?php
                if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>


        </div>

        <div class=" links">
            <!-- <a href="#">Quên mật khẩu?</a> |  -->
            <a href="index.php?act=dangnhap">Đăng nhập</a>
        </div>
    </div>
</body>

</html>