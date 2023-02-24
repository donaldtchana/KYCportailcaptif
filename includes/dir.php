<?php
define('ROOTPATH',str_replace(array("includes"),'',__DIR__));
$dir = str_replace(array("includes"),'',__DIR__);
include("$dir/includes/include.php");
if (!empty($_GET['lang'])){
    if ($_GET['lang']=='en'){
        $_SESSION['lang']='en';
    }else{
        $_SESSION['lang']='fr';
    }
    if (!empty($_GET['url'])){
        $url = $_GET['url'];
        echo "<script>window.open('$url','_self');</script>";
        exit();
    }
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url_page = "https://";
else
    $url_page = "http://";

$url_page .= $_SERVER['HTTP_HOST'];


$url_page .= $_SERVER['REQUEST_URI'];


