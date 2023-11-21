<?php

function delete_taikhoan($id){
    $sql="delete from user where id=".$id;
    pdo_execute($sql);
}
function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO `user`(`email`, `user`, `pass`) VALUES ('$email','$user','$pass')";
    pdo_execute($sql);
}

function loadall_taikhoan(){
$sql="select *from taikhoan order by id desc";
$listtaikhoan=pdo_query($sql);
return $listtaikhoan;
}

// function checkuser($user,$pass){
//     $sql = "select *from taikhoan where user='" . $user."' AND pass='".$pass."'";
//     $sp = pdo_query_one($sql);
//     return $sp;
// }

function checkemail($email,$pass){
    $sql = "select * from user where email='" . $email."' AND pass='".$pass."'" ;
    $sp = pdo_query_one($sql);
    return $sp;
    
}
function  update_taikhoan($id,$user,$pass,$email,$address,$tel){
    $sql="UPDATE `taikhoan` SET `user` = '$user', `pass` = '$pass', `email` = '$email', `address` = '$address  ', 
    `tel` = '$tel' WHERE `taikhoan`.`id` = {$id}";
    pdo_execute($sql);

}
// Kiểm tra tồn tại email ko
function checkEmailExists($email) {
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE email='" . $email."'";

    $result = pdo_query_one($sql);
    // Lấy giá trị đếm từ kết quả truy vấn
    $count = $result['COUNT(*)'];

    return $count > 0;
}
?>