<?php
require_once "$dir/vendor/autoload.php";
date_default_timezone_set("Africa/Douala");
include("$dir/includes/config.php");
include $dir.'fonctions/database.php';
include $dir.'fonctions/input.php';
include $dir.'fonctions/validator.php';
include $dir.'fonctions/flash.php';
include("$dir/includes/s3-config.php");
include $dir.'fonctions/mes_fonctions.php';
include $dir.'fonctions/config_paypal.php';
$site_url = get_setting($db, 'site_url');

