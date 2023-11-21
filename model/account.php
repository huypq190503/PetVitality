<?php
function insert_account($user,$pass,$email,$address,$tel){
    $sql="INSERT INTO user(user,pass,email,address,tel) VALUES('$user','$pass','$email','$address','$tel')";
    pdo_execute($sql);
}
function select_account($email){
    $sql="SELECT * FROM user WHERE email='".$email."'  ";
    $email=pdo_query_one($sql);
    return $email; 
}
function delete_account($id_user){
    $sql="DELETE FROM user WHERE id_user=".$id_user;
    pdo_query($sql);
}
function login_account($email,$pass){
    $sql="SELECT * FROM user WHERE email='".$email."' AND pass='".$pass."' ";
    $acc=pdo_query_one($sql);
    return $acc; 
}

function update_account($id_user,$user,$pass,$email,$address,$tel){
        $sql="UPDATE user SET user='".$user."', pass='".$pass."', email='".$email."',address='".$address."',tel='".$tel."'  WHERE id_user=".$id_user  ;
        pdo_execute($sql);
    }
function list_acc(){
        $sql="SELECT * FROM user order by id_user ASC";
        $list_account=pdo_query($sql);
        return $list_account;
    }
?>