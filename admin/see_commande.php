<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_boutique()){
    echo "<script>window.open('index','_self');</script>";
}

if(!empty($_GET['id'])){

    $query = $db->query("select commande.methode,commande.payer,commande.cloturer, commande.id as id_cmd , commande.total as total , commande.dates as dates ,commande.transaction_id as transaction_id , client.nom as noms , client.email as email, client.tel as tel from commande , client  where commande.id_client = client.id and commande.id_boutique=:boutique and commande.id=:id  LIMIT 1",array("boutique"=>$_SESSION['id_boutique'],"id"=>$_GET['id']));
    if($query->rowCount() > 0){

        $row = $query->fetch();
    }else{
        echo "<script>window.open('index','_self');</script>";
        exit();
    }



}else{
    echo "<script>window.open('index','_self');</script>";
    exit();
}
$page_name='Voir la commande';
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>

</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <?php include("views/partial/admin_header.php"); ?>

    <?php include("views/partial/sidebar.php"); ?>

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Details commande</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="commande">Retour</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details commande</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="col-md-6">
                <h2 class="mb-5 black_title">Details commande</h2>
                <div class="card">
                    <div class="card-header">

                        <h4 class="h4">Détails commande #<?=$row->id_cmd?> éffectuée le <?= date("d-m-Y H:i:s", strtotime($row->dates)); ?></h4>
                        <label class=" control-label"> Numéro de la transaction : <b><?=$row->transaction_id?></b> </label>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class=" control-label"> Noms du clients : <b><?=$row->noms?></b> </label>
                            </div>
                            <div class="col-md-6">
                                <label class=" control-label"> Email : <b><?=$row->email?></b> </label>
                            </div>
                            <div class="col-md-6">
                                <label class=" control-label"> Téléphone : <b><?=$row->tel?></b> </label>
                            </div>

                        </div>
                        <br/>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Article</th>
                                <th scope="col">Image</th>
                                <th scope="col">Qte</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Sous Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ligne_commandes = $db->query("select ligne_commande.qte_commande as qte,ligne_commande.prix as price,article.nom,article.image from ligne_commande,article where id_commande =:id_commande and ligne_commande.id_article = article.id",array("id_commande"=>$row->id_cmd));

                            while($ligne = $ligne_commandes->fetch()){


                                ?>
                                <tr>
                                    <th><?=$ligne->nom?></th>
                                    <td><img alt="Image du produit" class="product_image" src="<?= $site_url.'/saved_images/article/'.$ligne->image; ?>"></td>
                                    <td><?=$ligne->qte?></td>
                                    <td><?=money_format($ligne->price)?></td>
                                    <td><?=money_format($ligne->price*$ligne->qte)?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <label class=" control-label"> Total : <b><?=money_format($row->total)?> </b> </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
</body>

</html>
