<?php
function insert_sanpham($tensp,$giasp,$anhsp,$mota,$id_dm){
    $sql="insert into sanpham(name,price,anhsp,mota,id_dm) values('$tensp','$giasp','$anhsp','$mota','$id_dm')";
    pdo_execute($sql);
}
function delete_sanpham($id_sp){
    $sql="delete from sanpham where id_sp=".$id_sp;
    pdo_execute($sql);
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id_sp desc limit 0,9";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
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
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadone_ten_dm($id_dm){
    if($id_dm>0){
    $sql="select * from danhmuc where id_sp=".$id_dm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }else{
        return "";
    }
}
function loadone_sanpham($id_sp){
    $sql="select * from sanpham where id_sp=".$id_sp;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id_sp,$id_dm){
    $sql="select * from sanpham where id_dm=".$id_dm." AND id_sp <>".$id_sp;
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id_sp,$id_dm,$tensp,$giasp,$mota,$anhsp){
    if($anhsp!="")
       $sql="update sanpham set id_dm='".$id_dm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',anhsp='".$anhsp."' where id_sp=".$id_sp;
    else
       $sql="update sanpham set id_dm='".$id_dm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id_sp=".$id_sp;
    pdo_execute($sql);
}

?>