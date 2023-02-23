<?php
session_start();
include("includes/dir.php");

$msg='Votre commande a été enregistrée avec succès!';
$data = $_SESSION['post_values'];
if(!empty($_SESSION['commande_id'])){
$query = $db->query('SELECT commande.id as ids , commande.total,boutique.nom as nom_boutique,boutique.position as position_boutique FROM commande,boutique WHERE commande.id=:id and commande.id_boutique = boutique.id  LIMIT 1', array("id"=>$_SESSION['commande_id']));
    $commande = $query->fetch();
    if($data['method'] =='Paypal'){
        $db->update("commande",array("transaction_id"=>$_GET['paymentId'],'payer' =>1),array("id"=>$_SESSION['commande_id']));
        $msg='Votre paiement a été éffectué avec succès!';
    }
    unset($_SESSION['commande_id']);
}else{

    echo "<script>window.open('$site_url','_self');</script>";
    exit();

}

?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }
    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }
    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
    }
    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>
<body>
<div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
    </div>
    <h1>Succès</h1>
    <p>Commande #<?=$commande->ids?> pour <?=$commande->nom_boutique?></p>
    <p>Situé au <?=$commande->position_boutique?></p>
    <a href="<?=$site_url?>">Revenir à l´acceuil.</a>
</div>
</body>
</html>