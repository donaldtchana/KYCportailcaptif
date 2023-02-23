<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
$page_name='Liste des offres';
if(!empty($_GET['del'])){
    $query = $db->query('SELECT * FROM new_offers WHERE id=:id  LIMIT 1', array("id"=>$_GET['del']));
    if($query->rowCount() > 0){
        $row = $query->fetch();

        $action='L´offre #'.$row->id.' '.$row->nom.' a été supprimée.';
        save_log($db,$action);
    }
    $db->delete("new_offers",array("id"=>$_GET['del']));

    echo "<script>alert('L´offre a été supprimée avec succès.');</script>";
    echo "<script>window.open('offres','_self');</script>";




}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>
    <script>
        var print_column = [1,2,3,4];
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
                    <h3 class="page-title mb-0 p-0">Offres</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Offres</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active"><a href="form_offre" class="btn btn-success">

                                        <i class="fa fa-plus-circle text-white"></i> <span class="text-white">Ajouter une offre</span>

                                    </a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Listes des offres</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Titre</th>
                        <th>Première description</th>
                        <th>Deuxième description</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i=1;

                    $get_offres = $db->query("select * from new_offers  order by nom asc");

                    while($row = $get_offres->fetch()){
                        ?>
                        <tr>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $row->nom; ?>
                            </td>
                            <td>
                                <?= $row->detail1; ?>
                            </td>
                            <td>
                                <?= $row->detail2; ?>
                            </td>
                            <td>
                                <?=money_format($row->price); ?>
                            </td>

                            <td width="150px;">

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="form_offre?id=<?= $row->id; ?>">Modifier</a></li>

                                        <li><a class="dropdown-item" href="offres?del=<?= $row->id; ?>">Supprimer</a></li>

                                    </ul>
                                </div>
                            </td>

                        </tr>

                    <?php $i++; } ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
</body>

</html>