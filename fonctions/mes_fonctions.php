<?php

function is_connected()
{
    $connected = @fsockopen("www.example.com", 80);
    if ($connected){
        $is_conn = true;
        fclose($connected);
    }else{
        $is_conn = false;
    }
    return $is_conn;

}
function money_format($price,$devise="FCFA")
{

    return  number_format($price,0,",",".")." ".$devise;

}
function is_boutique()
{

    if( !empty($_SESSION['id_boutique'])){
        Return true;
    }
    return false;

}
function is_admin()
{

    if( !empty($_SESSION['email_admin'])){
        Return true;
    }
    return false;

}
function type_user()
{

    if( !empty($_SESSION['id_boutique'])){
        Return 'boutique';
    }else{
        Return 'administrateur';
    }

}
function get_user_name($db)
{

    if(!empty($_SESSION['id_boutique'])){
        $query = $db->query('SELECT * FROM boutique WHERE id=:id  LIMIT 1', array("id"=>$_SESSION['id_boutique']));
        if($query->rowCount() > 0){
            $row = $query->fetch();
            Return 'La boutique '.$row->nom;
        }

    }else{
        $admin_email = $_SESSION['email_admin'];
        $get_admin = $db->query("select * from administrateur where email=:a_email OR user_name=:a_user_name limit 1",array("a_email"=>$admin_email,"a_user_name"=>$admin_email));
        $row_admin = $get_admin->fetch();
        Return 'L´administrateur '.$row_admin->user_name;
    }
    Return 'Inconnu';
}
function save_log($db,$action)
{

        $db->insert("historique",array("action"=>$action,"auteur"=>get_user_name($db),"dates"=>date('Y-m-d H:i:s')));

}
function save_setting($db,$cle,$valeur)
{
    $query = $db->query("select * from parametres where cle =:cle limit 1",array("cle"=>$cle));
    if ($query->rowCount())
    {
        $db->update("parametres",array("valeur"=>$valeur),array("cle"=>$cle));
    }else{
        $db->insert("parametres",array("cle"=>$cle,"valeur"=>$valeur));
    }
}
function get_setting($db,$cle,$check_active = false)
{
    $query = $db->query("select * from parametres where cle =:cle limit 1",array("cle"=>$cle));
    if ($query->rowCount())
    {
        $row = $query->fetch();
        $valeur = $row->valeur;
    }else{
        $valeur = null;
    }
    if ($check_active){
        if (intval($valeur) == 1){
            return true;
        }else{
            return false;
        }

    }else{
        return $valeur;
    }
}
function slugify($text, string $divider = '_')
{

    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = preg_replace('~[^-\w]+~', '', $text);

    $text = trim($text, $divider);

    $text = preg_replace('~-+~', $divider, $text);

    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}