<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_boutique()){
    echo "<script>window.open('index','_self');</script>";
}
$update=false;
$action='Ajouter';
if(!empty($_GET['id'])){

    $query = $db->query('SELECT * FROM article WHERE id=:id  LIMIT 1', array("id"=>$_GET['id']));
    if($query->rowCount() > 0){
        $update=true;
        $action='Modifier';
        $row = $query->fetch();
        if ($row->id_boutique!=$_SESSION['id_boutique'])
        {
            echo "<script>window.open('index','_self');</script>";
            exit();
        }
    }


}
$page_name=$action.' un article';
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
                                <li class="breadcrumb-item"><a href="articles">Retour</a></li>
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
                        <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data">
                            <?php
                            include("views/partial/flash_errors.php");
                            ?>
                            <?php
                            if($update){ ?>

                                <input type="hidden" name="id" class="form-control" value="<?=$row->id?>">

                            <?php }
                            ?>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Nom de l´article</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=($update) ? $row->nom : null?>" name="nom" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 mb-0">Catégorie</label>
                                <div class="col-md-12">
                                    <select name="cat" required class="form-select" aria-label="Default select example">
                                        <option value="">Sélectionner une catégorie</option>
                                        <?php
                                        $get_cat_articles = $db->query("select * from categorie_articles  order by nom asc");

                                        while($cat = $get_cat_articles->fetch()){

                                        ?>
                                        <option
                                            <?php if ($update){
                                                if ($cat->id==$row->cat){
                                                    echo 'selected';
                                                }
                                            }?>
                                           value="<?= $cat->id; ?>"><?= $cat->nom; ?></option>
                                            <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Prix</label>
                                <div class="col-md-12">
                                    <input required type="number" value="<?=($update) ? $row->prix : null?>" name="prix" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Stock</label>
                                <div class="col-md-12">
                                    <input required type="number" value="<?=($update) ? $row->stock : null?>" name="stock" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 control-label">Image : </label>

                                <div class="col-md-9">

                                    <input type="file" <?=(!$update) ? 'required' : null?> name="image" class="form-control">

                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 control-label">Activé : </label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" <?php if ($update){
                                            if ($row->status == 1){
                                               echo 'checked';
                                            }
                                        }?> name="status" type="checkbox" value="" id=""/>
                                    </div>
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

    $allowed = allowed_image_extensions();
    $rules = array(
        "nom" => "required",
        "cat" => "required",
        "prix" => "required",
        "stock" => "required");
    if (isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    $messages = array("nom" => "Le nom est obligatoire.","prix" => "Le prix est obligatoire.","stock" => "Le stock est obligatoire.","cat" => "La catégorie est obligatoire.");

    $val = new Validator($_POST,$rules,$messages);

    if($val->run() == false){

        Flash::add("form_errors",$val->get_all_errors());
        Flash::add("form_data",$_POST);
        echo "<script> window.open('form_article','_self');</script>";

    }else{
        $upload_image=false;
        if( !empty($input->post('id'))){
            $id = $input->post('id');
            if(file_exists($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])){
                $image= $_FILES['image']['name'];
                $tmp_image = $_FILES['image']['tmp_name'];
                $upload_image=true;
            }

        }else{
            $upload_image=true;
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];

        }

        $nom = $input->post('nom');
        $prix = $input->post('prix');
        $stock = $input->post('stock');
        $cat = $input->post('cat');
        if($upload_image){

            $image_extension = pathinfo($image, PATHINFO_EXTENSION);
            if(!in_array($image_extension,$allowed) && !empty($image) ){
                echo "<script>alert('Extension non supportée.')</script>";
                exit();
            }
        }

        $values = ["nom"=>$nom,"prix"=>$prix,"stock"=>$stock,"cat"=>$cat,"status"=>$status,"id_boutique"=>$_SESSION['id_boutique']];

        if($upload_image){
            $new_name_image=slugify(time().'_'.$image);
            uploadToS3("saved_images/article/".$new_name_image,$tmp_image);
            $values += ['image' => $new_name_image];
        }

        if( !empty($input->post('id'))){

            $exec= $db->update("article",$values,array("id"=>$input->post('id')));
            $msg='L´article a été modifié avec succes.';
            $action='L´article #'.$input->post('id').' '.$nom.' a été modifié.';
        }else{
            $exec= $db->insert("article",$values);
            $msg='L´article a été ajouté avec succes.';
            $action='L´article #'.$db->lastInsertId().' '.$nom.' a été ajouté.';
        }

        if($exec){
            save_log($db,$action);
            echo "<script>alert('".$msg."');</script>";
            echo "<script>window.open('articles','_self');</script>";

        }else{

            echo "<script>alert('Erreur de sauvegade');</script>";

        }




    }
}

?>