<?php
function insert_sanpham($tensp,$giasp,$anhsp,$mota,$id_dm,$luotxem,$date){
    $sql="insert into sanpham(tensp,giasp,anhsp,mota,id_dm,luotxem,date) values('$tensp','$giasp','$anhsp','$mota','$id_dm','$luotxem','$date')";
    pdo_execute($sql);
}
function delete_sanpham($id_sp){
    $sql="delete from sanpham where id_sp=".$id_sp;
    pdo_execute($sql);
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,9";
    $listsp=pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id_sp desc limit 0,9";
    $listsp=pdo_query($sql);
    return $listsp;
}



function loadall_sanpham($kyw="", $id_dm=0){
    $sql="select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($id_dm>0){
        $sql.=" and id_dm ='".$id_dm."'";
    }
    $sql.=" order by id_sp desc";
    $listsp=pdo_query($sql);
    return $listsp;
}

function loadone_sanpham($id_sp){
    $sql="select * from sanpham where id_sp=".$id_sp;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id_sp,$id_dm){
    $sql="select * from sanpham where id_dm=".$id_dm." AND id_sp <>".$id_sp;
    $listsp=pdo_query($sql);
    return $listsp;
}
function update_sanpham($id_sp,$tensp, $anhsp, $giasp, $mota, $id_dm, $luotxem,$date){  
    if($anhsp !== ""){  
        $sql = "update sanpham set tensp='$tensp', anhsp='$anhsp', giasp='$giasp', mota='$mota', id_dm='$id_dm', luotxem='$luotxem', date='$date' where id_sp=$id_sp";  
    } else {  
        $sql = "update sanpham set tensp='$tensp', anhsp='$anhsp', giasp='$giasp', mota='$mota', id_dm='$id_dm', luotxem='$luotxem',date='$date' where id_sp=$id_sp";  
    }  
    pdo_execute($sql);  
}  
 ///bộ lọc
function loadall_sanpham_new(){  
    $sql= "SELECT * FROM sanpham ORDER BY date DESC LIMIT 10";  
    $listsp=pdo_query($sql);  
    return $listsp;  
}   

function loadall_sanpham_view(){  
    $sql= "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 10";  
    $listsp=pdo_query($sql);  
    return $listsp;  
}  
function addToCart($id_sp) {
    $conn = pdo_get_connection();
    
    $sql = "SELECT id_cart, quantity FROM cart WHERE id_sp = :id_sp";
    $addToCart = $conn->prepare($sql);
    $addToCart->bindParam(':id_sp', $id_sp);
    $addToCart->execute();
    $cartItem = $addToCart->fetch(PDO::FETCH_ASSOC);

    if ($cartItem) {
        $id_cart = $cartItem['id_cart'];
        $newQuantity = $cartItem['quantity'] + 1;

        $sql = "UPDATE cart SET quantity = :newQuantity WHERE id_cart = :id_cart";
        $addToCart = $conn->prepare($sql);
        $addToCart->bindParam(':newQuantity', $newQuantity);
        $addToCart->bindParam(':id_cart', $id_cart);
        $addToCart->execute();
    } else {
        $sql = "INSERT INTO cart (id_sp, quantity) VALUES (:id_sp, 1)";
        $addToCart = $conn->prepare($sql);
        $addToCart->bindParam(':id_sp', $id_sp);
        $addToCart->execute();
    }
    unset($conn); 
}

function loadall_cart(){
    $sql="select * from cart ";
    $listcart=pdo_query($sql);
    return $listcart;
}
function update_view_count($id_sp) {  
    $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id_sp = :id_sp";  
    pdo_execute($sql, [':id_sp' => $id_sp]);  
}


?>
