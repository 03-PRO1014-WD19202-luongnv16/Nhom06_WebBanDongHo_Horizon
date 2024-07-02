<?php
function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO taikhoan(email,user,pass) VALUES ('$email','$user','$pass')";
    pdo_execute($sql);
}

function insert_taikhoan_admin($user,$pass,$email,$diachi,$tel,$role,$hinh)
{
    $sql = "INSERT INTO taikhoan(email,user,pass,diachi,tel,role,img) VALUES ('$email','$user','$pass','$diachi','$tel','$role','$hinh')";
    pdo_execute($sql);
}
function check_user( $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE   pass = '" . $pass . "'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}


function update_taikhoan($id,  $pass, $email, $diachi, $tel,$hinh)
{
    if($hinh!=""){
        $sql = "UPDATE taikhoan SET pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' ,img = '" . $hinh . "' Where id=" . $id;
    }
    else{
        $sql = "UPDATE taikhoan SET  pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' Where id=" . $id;
    }

  
    pdo_execute($sql);
}

function update_taikhoan_admin($id, $user, $pass, $email, $diachi, $tel, $role, $hinh)
{
    if($hinh!=""){
        $sql = "UPDATE taikhoan SET user = '" . $user . "' ,pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' ,role = '" . $role . "' ,img = '" . $hinh . "' Where id=" . $id;
    }

    else{
        $sql = "UPDATE taikhoan SET user = '" . $user . "' ,pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' ,role = '" . $role . "'  Where id=" . $id;
    }
    pdo_execute($sql);
}

function check_email($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '" . $email . "'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function loadall_taikhoan(){
    $sql = "SELECT * FROM taikhoan order by id desc";
    $taikhoan =pdo_query($sql);
    return $taikhoan;
}

function delete_taikhoan($id){
    $sql = "DELETE FROM taikhoan WHERE id =".$id;
    pdo_execute($sql);
}

function loadone_taikhoan($id){
    $sql = "SELECT * from taikhoan where id =".$id;
    $taikhoan_one =pdo_query_one($sql);
    return $taikhoan_one;
}
?>