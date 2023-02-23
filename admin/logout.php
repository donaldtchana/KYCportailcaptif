<?php

session_start();

unset($_SESSION['email_admin']);
unset($_SESSION['id_boutique']);
if(isset($_GET['session_expired'])){
	
echo "<script>window.open('login?session_expired','_self');</script>";
	
}else{

echo "<script>window.open('login','_self');</script>";

}

?>