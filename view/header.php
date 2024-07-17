    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
        </style>
        <style>
            .total-box{
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            border-top:1px solid #36454f;
            padding:10px 0;
            bottom:10%
            }
        </style>
    </head>

    <body>
        <div class="container">
            <header>
                <div class="header-logo hidden">
                    <a href="index.php"><img class="web-logo" src="./img/logo.png" alt="Grand Team Logo"></a>
                </div>
                <nav class="header-menu hidden">
                    <a class="items-link" href="index.php">
                        <ion-icon class="menu-items" name="home-outline"></ion-icon>
                        <span class="text">Trang chủ</span>
                    </a>
                    <a class="items-link" href="index.php?act=sanpham">
                        <ion-icon class="menu-items" name="watch-outline"></ion-icon>
                        <span class="text">Sản Phẩm</span>
                    </a>
                    <div class="items-link"  onclick="showGioHang()">
                        <ion-icon class="menu-items" name="cart-outline"></ion-icon>
                        <span class="text">Giỏ Hàng</span>
                    </div>
                    <?php
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                            echo ' <a class="items-link" href="index.php?act=dangxuat">
                                        <span>  '.$user.'</span>
                                        <span class="text">Thoát</span>

                                </a>';
                        } else {
                                    echo ' <a class="items-link" href="index.php?act=dangnhap">
                                        <ion-icon class="menu-items" name="person-outline"></ion-icon>
                                        <span class="text">Đăng Nhập</span>

                                    </a>';
                                }
                    ?>
                </nav>
            </header>
            <div class="sidecart">
            <div class="cart-title-container">
                <ion-icon class="menu-items" name="bag-outline"></ion-icon>
                <h1 class="title">Giỏ Hàng</h1>
            </div>
                <?php
                    $conn = pdo_get_connection();
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cart'])) {
                    $id_cart = $_POST['id_cart'];
                    $quantity = $_POST['quantity'] - 1;
                    if ($quantity > 0) {
                        $sql = "UPDATE cart SET quantity = :quantity WHERE id_cart = :id_cart";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                        $stmt->bindParam(':id_cart', $id_cart, PDO::PARAM_INT);
                        $stmt->execute();
                    } else {
                        $sql = "DELETE FROM cart WHERE id_cart = :id_cart";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':id_cart', $id_cart, PDO::PARAM_INT);
                        $stmt->execute();
                    }
                    unset($conn);
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                    }
                    $sql = "SELECT cart.id_cart, cart.quantity, sanpham.tensp, sanpham.giasp, sanpham.anhsp
                            FROM cart
                            INNER JOIN sanpham ON cart.id_sp = sanpham.id_sp";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $totalPrice = 0;
                        foreach ($cartItems as $item) {
                            echo '<div class="cart-product-container">';
                            echo '<h5 class="cart-product-name">' . $item['tensp'] . '</h5>';
                            echo '<img class="cart-product-img" src="img/' . $item['anhsp'] . '" alt="' . $item['tensp'] . '">';
                            echo '<div class="quantity-box">';
                            echo '</div>';
                            echo '<p class="cart-product-price">'."Số lượng: " . $item['quantity'] .'</p>';
                            echo '<p class="cart-product-price">' . $item['giasp'] . ' VNĐ</p>';
                            echo '<form method="POST" action="">';
                            echo '<input type="hidden" name="id_cart" value="' . $item['id_cart'] . '">';
                            echo '<input type="hidden" name="quantity" value="' . $item['quantity'] . '">';
                            echo '<input type="submit" class="decrease" value="Xoá" ></input>';
                            echo '</form>';
                            echo '</div>';
                            
                            foreach ($cartItems as $item) {
                            $totalPrice += $item['giasp'] * $item['quantity'];
                        }
                        }
                        unset($conn);
                    echo '<div class="total-box">';
                    echo '<h3>Tổng số tiền là: </h3>';
                    echo '<p class="total-price">' . ($totalPrice) . ' VNĐ</p>';
                    echo '</div>';
                    
                    echo '<div class="button bottom-button">Mua</div>';
                ?>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>