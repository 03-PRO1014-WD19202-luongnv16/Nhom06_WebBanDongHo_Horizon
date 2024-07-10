<main>
        <h1>Danh sách mới nhất</h1><br><br>
        <div class="banner-product">
            <img src="./img/2.webp" alt="">
            <p>Vẻ đẹp mang tính đột phá và sang trọng</p>
            <a href=""><button>Xem chi tiết</button></a>
        </div>

        <div class="menu-product">
            <ul>
                <li><a href="index.php?act=new">New</a></li>
                <li><a href="index.php?act=used">Used</a></li>
                <li><a href="index.php?act=hot">Hot</a></li>
                <li><a href="index.php?act=famous">Famous</a></li>
                <li><a href="index.php?act=limited">Limited</a></li>
            </ul>
        </div>
<div class="row-sp">
    <?php
        $i=0;
            foreach($spnew as $sp){
                extract($sp);
                $hinh=$img_path.$anhsp;
                if(($i==2)||($i==5)||($i==8)){
                    $mr="";
                }else{
                    $mr="mr";
                }
                echo ' <div class="box-product">
                        <div class="product">
                            <a href="sanphamct.php?act='.$id_sp.'"><img src="'.$hinh.'" alt=""></a>
                            <a href=""><h3>'.$tensp.'</h3></a>
                            <strong>'.$giasp.'</strong>
                            <div class="btnadd">
                            <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="'.$id_sp.'">
                            <input type="hidden" name="name" value="'.$tensp.'">
                            <input type="hidden" name="img" value="'.$hinh.'">
                            <input type="hidden" name="price" value="'.$giasp.'">
                            <input type="submit" name="addtocart" value="THÊM VÀO GIỎ HÀNG">
                            </form>
                            </div>
                            </div>
                        
                        </div></br>' ;
            $i+=1;
            }
    ?>
    <div class="btn-more">
            <button>Xem Thêm >>></button>
    </div>   
</main>