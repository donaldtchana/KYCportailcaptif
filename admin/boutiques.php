<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
$page_name='Liste des boutiques';
if(!empty($_GET['id_boutique'])){


    $db->update("boutique",array("status"=>$_GET['status']),array("id"=>$_GET['id_boutique']));
    if ($_GET['status']==1)
    {
        $msg='La boutique a été activée avec succès';
    }else{
        $msg='La boutique a été desactivée avec succès';
    }
    $query = $db->query('SELECT * FROM boutique WHERE id=:id  LIMIT 1', array("id"=>$_GET['id_boutique']));
    if($query->rowCount() > 0){
        $row = $query->fetch();
        if ($_GET['status']==1)
        {
            $action='La boutique #'.$row->id.' '.$row->nom.' a été activée.';
        }else{
            $action='La boutique #'.$row->id.' '.$row->nom.' a été desactivée.';
        }
        save_log($db,$action);
    }

    echo "<script>alert('".$msg."');</script>";
    echo "<script>window.open('boutiques','_self');</script>";




}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>
    <script>
        var print_column = [ 0, 1,4,5];
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
                    <h3 class="page-title mb-0 p-0">Boutiques</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Boutiques</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active"><a href="form_boutique" class="btn btn-success">

                                        <i class="fa fa-plus-circle text-white"></i> <span class="text-white">Ajouter une boutique</span>

                                    </a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Listes des boutiques</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Nom</th>
                        <th>Logo</th>
                        <th>Bannière 1</th>
                        <th>Bannière 2</th>
                        <th>Position</th>
                        <th>Catégorie</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i=1;

                    $get_boutiques = $db->query("select boutique.id as ids , boutique.nom as noms,boutique.logo,boutique.banniere,boutique.banniere2,boutique.status,boutique.logo,boutique.position ,categorie_boutiques.nom as categorie from boutique , categorie_boutiques  where categorie_boutiques.id = boutique.cat  order by noms asc");

                    while($row = $get_boutiques->fetch()){
                        ?>
                        <tr>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $row->noms; ?>
                            </td>
                            <td><img alt="Image du produit" class="product_image" src="<?= $site_url.'/saved_images/boutique/'.$row->logo; ?>"></td>
                            <td><img alt="Image du produit" class="product_image" src="<?= $site_url.'/saved_images/boutique/'.$row->banniere; ?>"></td>
                            <td><img alt="Image du produit" class="product_image" src="<?= $site_url.'/saved_images/boutique/'.$row->banniere2; ?>"></td>

                            <td>
                                <?= $row->position; ?>
                            </td>
                            <td>
                                <?= $row->categorie; ?>
                            </td>
                            <td>
                                <?= ($row->status == 1) ? 'Activée' :'Désactivée'; ?>
                            </td>
                            <td width="150px;">

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="form_boutique?id=<?= $row->ids; ?>">Modifier</a></li>
                                        <?php
                                     if($row->status == 1){
                                        ?>
                                        <li><a class="dropdown-item" href="boutiques?id_boutique=<?= $row->ids; ?>&status=0">Désactiver</a></li>
                                         <?php  } else {?>
                                        <li><a class="dropdown-item" href="boutiques?id_boutique=<?= $row->ids; ?>&status=1">Activer</a></li>
                                        <?php  } ?>
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