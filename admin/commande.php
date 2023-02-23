<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_boutique()){
    echo "<script>window.open('index','_self');</script>";
}
$page_name='Liste des commandes';

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>

    <script>
        var print_column = [0,1,2,3,4,5,6,7];
    </script>

</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <?php include("views/partial/admin_header.php"); ?>

    <?php include("views/partial/sidebar.php"); ?>

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-9 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Commandes</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Commandes</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Listes des commandes</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Noms du client</th>
                        <th>Téléphone</th>
                        <th>Total</th>
                        <th>Methode de paiement</th>
                        <th>Payé</th>
                        <th>Cloturé</th>
                        <th>Date commande</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php


                    $get_commandes = $db->query("select commande.methode,commande.payer,commande.cloturer, commande.id as id_cmd , commande.total as total , commande.dates as dates ,commande.transaction_id as transaction_id , client.nom as noms , client.email as email, client.tel as tel from commande , client  where commande.id_client = client.id and commande.id_boutique=:boutique   order by commande.id desc",array("boutique"=>$_SESSION['id_boutique']));

                    while($row = $get_commandes->fetch()){
                        ?>
                        <tr>
                            <td>
                                <?= $row->id_cmd; ?>
                            </td>
                            <td>
                                <?= $row->noms; ?>
                            </td>
                            <td>
                                <?= $row->tel; ?>
                            </td>
                            <td>
                                <?= $row->total; ?>
                            </td>
                            <td>
                                <?= $row->methode; ?>
                            </td>
                            <td>

                                    <input class="commande_action" type="checkbox" action="payer" ids="<?=$row->id_cmd?>" <?= ($row->payer == 1) ? ' checked' :''; ?>>

                            </td>
                            <td>

                                    <input class="commande_action" type="checkbox" action="cloturer" ids="<?=$row->id_cmd?>" <?= ($row->cloturer == 1) ? ' checked' :''; ?>>

                            </td>
                            <td>
                                <?= date("d-m-Y H:i:s", strtotime($row->dates)); ?>
                            </td>
                            <td width="150px;">

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="see_commande?id=<?= $row->id_cmd; ?>">Voir les details</a></li>

                                    </ul>
                                </div>
                            </td>

                        </tr>

                    <?php  } ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
<script>
    var page = 1;
    $(document).ready(function() {

        $("body").on("click", ".commande_action", function(e) {
            if ($(this).is(':checked')) {
                var check = 1;
            }else {
                var check = 0;
            }
            $.ajax({
                type: "POST",
                url: "<?=$site_url?>"+'/admin/ajax_commandes',
                data: {
                    action: $(this).attr('action'),
                    id:$(this).attr('ids'),
                    valeur:check
                },
                success: function (data) {

                },
                error: function(err) {

                },
            });
        });

    } );




</script>
</body>

</html>