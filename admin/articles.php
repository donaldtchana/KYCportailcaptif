<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_boutique()){
    echo "<script>window.open('index','_self');</script>";
}
$page_name='Liste des articles';
if(!empty($_GET['id_article'])){

    $query = $db->query('SELECT * FROM article WHERE id=:id  LIMIT 1', array("id"=>$_GET['id_article']));
    if($query->rowCount() > 0){
        $row = $query->fetch();
        if ($row->id_boutique!=$_SESSION['id_boutique'])
        {
            echo "<script>window.open('index','_self');</script>";
            exit();
        }
        if ($_GET['status']==1)
        {
            $action='L´article #'.$row->id.' '.$row->nom.' a été activée.';
        }else{
            $action='L´article #'.$row->id.' '.$row->nom.' a été desactivée.';
        }
        save_log($db,$action);
    }else{
        echo "<script>window.open('index','_self');</script>";
        exit();
    }
    $db->update("article",array("status"=>$_GET['status']),array("id"=>$_GET['id_article']));
    if ($_GET['status']==1)
    {
        $msg='L´article a été activé avec succès';
    }else{
        $msg='L´article a été desactivé avec succès';
    }


    echo "<script>alert('".$msg."');</script>";
    echo "<script>window.open('articles','_self');</script>";




}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>
    <script>
        var print_column = [ 0, 1,3,4,5];
    </script>
<style>
    .red_class{
        background-color: red!important;
        color: white!important;
    }
    .yellow_class{
        background-color: yellow!important;
        color:black!important;
    }
</style>
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
                    <h3 class="page-title mb-0 p-0">Articles</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Articles</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active"><a href="form_article" class="btn btn-success">

                                        <i class="fa fa-plus-circle text-white"></i> <span class="text-white">Ajouter un article</span>

                                    </a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Listes des articles</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i=1;

                    $get_articles = $db->query("select article.id as ids , article.nom as noms,article.image,article.prix,article.stock,article.status,categorie_articles.nom as categorie from article , categorie_articles  where categorie_articles.id = article.cat and id_boutique=:boutique  order by noms asc",array("boutique"=>$_SESSION['id_boutique']));

                    while($row = $get_articles->fetch()){
                        $class = "";
                        if ($row->stock == 0) {
                            $class = "red_class";
                        } elseif ($row->stock < get_setting($db, "stock_alert")) {
                            $class = "yellow_class";
                        }

                        ?>
                        <tr class="<?= $class; ?>">
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $row->noms; ?>
                            </td>
                            <td><img alt="Image du produit" class="product_image" src="<?= $site_url.'/saved_images/article/'.$row->image; ?>"></td>

                            <td>
                                <?= $row->categorie; ?>
                            </td>
                            <td>
                                <?= money_format($row->prix); ?>
                            </td>
                            <td>
                                <?= $row->stock; ?>
                            </td>
                            <td>
                                <?= ($row->status == 1) ? 'Activé' :'Désactivé'; ?>
                            </td>
                            <td width="150px;">

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="form_article?id=<?= $row->ids; ?>">Modifier</a></li>
                                        <?php
                                     if($row->status == 1){
                                        ?>
                                        <li><a class="dropdown-item" href="articles?id_article=<?= $row->ids; ?>&status=0">Désactiver</a></li>
                                         <?php  } else {?>
                                        <li><a class="dropdown-item" href="articles?id_article=<?= $row->ids; ?>&status=1">Activer</a></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            </td>

                        </tr>

                    <?php $i++; } ?>

                    <! test alerte>


                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
</body>

</html>