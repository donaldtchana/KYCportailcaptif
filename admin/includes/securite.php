<?php

session_start();
if(!isset($_SESSION['email_admin']) && !isset($_SESSION['id_boutique'])  ){
    echo "<script>window.open('login','_self');</script>";
}

if((time() - $_SESSION['loggedin_time_admin']) > 9800){
    echo "<script>window.open('logout?session_expired','_self');</script>";
}
if(isset($_SESSION['id_boutique'])  ){
    $id_boutique = intval($_SESSION['id_boutique']);
    $get_boutique = $db->query("select * from boutique where id=:id  limit 1",array("id"=>$id_boutique));
    if($get_boutique->rowCount() == 0){
        echo "<script>window.open('logout','_self');</script>";
        exit();
    }
    $row_boutique = $get_boutique->fetch();
    $user_id = $row_boutique->id;
    $user_name = $row_boutique->nom;
}else{
    $admin_email = $_SESSION['email_admin'];
    $get_admin = $db->query("select * from administrateur where email=:a_email OR user_name=:a_user_name limit 1",array("a_email"=>$admin_email,"a_user_name"=>$admin_email));
    if($get_admin->rowCount() == 0){
        echo "<script>window.open('logout','_self');</script>";
        exit();
    }
    $row_admin = $get_admin->fetch();
    $user_id = $row_admin->id;
    $user_name = $row_admin->user_name;
}
