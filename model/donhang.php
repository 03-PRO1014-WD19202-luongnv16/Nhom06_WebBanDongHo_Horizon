<?php
  function loadAll_donhang(){
    $sql = "SELECT * FROM donhang ORDER BY id DESC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
  }
  function loadOne_donhang($id){
    $sql="select* from donhang where id =".$id;
    $dm=pdo_query_one($sql);
    return $dm;
  }
  function update_donhang($id,$trangthai){
    $sql = "UPDATE donhang SET trangthai='".$trangthai."' WHERE id=".$id;
    pdo_execute($sql);
  }
  function get_ttdh($n){
    switch($n){
        case 1:
            $tt= "Đang xử lý";
            break;
        case 2:
            $tt= "Đang giao";
            break;
        case 3:
            $tt= "Đã giao";
            break;
        case 0:
            $tt= "Đơn Hàng Mới";
            break;
        default:
            $tt= "Đơn Hàng Mới";
            break;   
    }
    return $tt;
};
function get_pttt($n){
  switch($n){
      case 1:
          $get_pttt= "Thanh toán trực tiếp";
          break;
      case 2:
          $get_pttt= "Chuyển khoản";
          break;
      case 3:
          $get_pttt= "Thanh toán online";
          break;
  }
  return $get_pttt;
};
function loadall_cart_coubt($id){
    $sql="select * from giohang where id_bill=".$id;
    $donhang=pdo_query($sql);
    return sizeof($donhang);
}
?>