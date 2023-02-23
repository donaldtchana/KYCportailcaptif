<?php
session_start();
include("includes/dir.php");

if($_POST['action']=='payer'){
    $db->update("commande",array('payer' =>intval($_POST['valeur'])),array("id"=>$_POST['id']));

}
if($_POST['action']=='cloturer'){
    $db->update("commande",array('cloturer' =>intval($_POST['valeur'])),array("id"=>$_POST['id']));

}
?>