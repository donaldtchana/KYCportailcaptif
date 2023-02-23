<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
$update=false;
$action='Ajouter';
if(!empty($_GET['id'])){

    $query = $db->query('SELECT * FROM categorie_articles WHERE id=:id  LIMIT 1', array("id"=>$_GET['id']));
    if($query->rowCount() > 0){
        $update=true;
        $action='Modifier';
    }
    $row = $query->fetch();


}

$page_name=$action.' une catégorie d´articles';
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
                    <h3 class="page-title mb-0 p-0"><?=$page_name?></h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="cat_articles">Retour</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?=$page_name?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="col-md-6">
                <h2 class="mb-5 black_title"><?=$page_name?></h2>
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="post">
                            <?php
                            include("views/partial/flash_errors.php");
                            ?>
                            <?php
                            if($update){ ?>

                                <input type="hidden" name="id" class="form-control" value="<?=$row->id?>">

                            <?php }
                            ?>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Nom de la catégorie</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=($update) ? $row->nom : null?>" name="nom" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button type="submit" name="save" class="btn btn-success mx-auto mx-md-0 text-white"><?=$action?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
</body>

</html>
<?php

if(isset($_POST['save'])){

    $values = ["nom"=>$input->post('nom')];
    if( !empty($input->post('id'))){

        $exec= $db->update("categorie_articles",$values,array("id"=>$input->post('id')));
        $msg='La catégorie d´articles a été modifiée avec succes.';
        $action='La catégorie d´articles #'.$input->post('id').' '.$input->post('nom').' a été modifiée.';
    }else{
        $exec= $db->insert("categorie_articles",$values);
        $msg='La catégorie d´articles a été ajoutée avec succes.';
        $action='La catégorie d´articles #'.$db->lastInsertId().' '.$input->post('nom').' a été ajoutée.';

    }
    if($exec){
        save_log($db,$action);
        echo "<script>alert('".$msg."');</script>";
        echo "<script>window.open('cat_articles','_self');</script>";

    }else{

        echo "<script>alert('Erreur de sauvegade');</script>";

    }

}

?>
