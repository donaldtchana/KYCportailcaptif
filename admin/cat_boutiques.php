<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
$page_name='Catégories de boutiques';
if(!empty($_GET['del'])){
    $query = $db->query('SELECT * FROM categorie_boutiques WHERE id=:id  LIMIT 1', array("id"=>$_GET['del']));
    if($query->rowCount() > 0){
        $row = $query->fetch();

            $action='La catégorie de boutique #'.$row->id.' '.$row->nom.' a été supprimée.';
        save_log($db,$action);
    }
    $db->delete("categorie_boutiques",array("id"=>$_GET['del']));
    $db->update("boutique",array("cat"=>1),array("cat"=>$_GET['del']));

    echo "<script>alert('La catégorie de boutique supprimée avec succès.');</script>";
    echo "<script>window.open('cat_boutiques','_self');</script>";




}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <script>
        var print_column = [ 0, 1];
    </script>
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
                <div class="col-md-9 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Catégories Des Boutiques</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Catégories Des Boutiques</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active"><a href="form_boutique_categorie" class="btn btn-success">

                                        <i class="fa fa-plus-circle text-white"></i> <span class="text-white">Ajouter une catégorie de boutiques</span>

                                    </a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Listes des catégories des boutiques</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i=1;

                    $get_cat_boutiques = $db->query("select * from categorie_boutiques where id <> 1 order by nom asc");

                    while($row = $get_cat_boutiques->fetch()){

                        ?>
                        <tr>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $row->nom; ?>
                            </td>

                            <td width="150px;">
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="form_boutique_categorie?id=<?= $row->id; ?>">Modifier</a></li>
                                            <li><a class="dropdown-item" href="cat_boutiques?del=<?= $row->id; ?>">Supprimer</a></li>
                                        </ul>
                                    </div>
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