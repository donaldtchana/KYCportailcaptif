<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
$update=false;
$action='Ajouter';
if(!empty($_GET['id'])){

    $query = $db->query('SELECT * FROM boutique WHERE id=:id  LIMIT 1', array("id"=>$_GET['id']));
    if($query->rowCount() > 0){
        $update=true;
        $action='Modifier';
    }
    $row = $query->fetch();


}
$page_name=$action.' une boutique';
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
                                <li class="breadcrumb-item"><a href="boutiques">Retour</a></li>
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
                                <label class="col-md-12 mb-0">Nom de la boutique</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=($update) ? $row->nom : null?>" name="nom" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Mot de passe</label>
                                <div class="col-md-12">
                                    <input  type="password" <?=(!$update) ? 'required' : null?> value="<?=''?>" name="mot_passe"  placeholder="" class="form-control ps-0 form-control-line mot_passe">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Catégorie</label>
                                <div class="col-md-12">
                                    <select name="cat" required class="form-select" aria-label="Default select example">
                                        <option value="">Sélectionner une catégorie</option>
                                        <?php
                                        $get_cat_boutiques = $db->query("select * from categorie_boutiques  order by nom asc");

                                        while($cat = $get_cat_boutiques->fetch()){

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
                                <label class="col-md-12 mb-0">Position</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=($update) ? $row->position : null?>" name="position" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Latitude</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=($update) ? $row->lat : null?>" name="lat" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Longitude</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=($update) ? $row->lon : null?>" name="lon" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Logo : </label>

                                <div class="col-md-9">

                                    <input type="file" <?=(!$update) ? 'required' : null?> name="logo" class="form-control">

                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Bannière 1</label>

                                <div class="col-md-9">

                                    <input type="file" <?=(!$update) ? 'required' : null?> name="banniere" class="form-control">

                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Bannière 2</label>

                                <div class="col-md-9">

                                    <input type="file" name="banniere2" class="form-control">

                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Activée : </label>

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
        "position" => "required",
        "lat" => "required",
        "lon" => "required");
    if (isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }
    if( empty($input->post('id'))){

        $rules += ['mot_passe' => "required"];
    }

    $messages = array("nom" => "Le nom est obligatoire.","mot_passe" => "Le mot de passe est obligatoire.","position" => "La position est obligatoire.","lat" => "La latitude est obligatoire.","lon" => "La longitude est obligatoire.","cat" => "La catégorie est obligatoire.");

    $val = new Validator($_POST,$rules,$messages);

    if($val->run() == false){

        Flash::add("form_errors",$val->get_all_errors());
        Flash::add("form_data",$_POST);
        echo "<script> window.open('form_boutique','_self');</script>";

    }else{
        $upload_logo=false;
        $upload_banniere=false;
        $upload_banniere2=false;
        if( !empty($input->post('id'))){
            $id = $input->post('id');
            if(file_exists($_FILES['logo']['tmp_name']) && is_uploaded_file($_FILES['logo']['tmp_name'])){
                $logo= $_FILES['logo']['name'];
                $tmp_logo = $_FILES['logo']['tmp_name'];
                $upload_logo=true;
            }
            if(file_exists($_FILES['banniere']['tmp_name']) && is_uploaded_file($_FILES['banniere']['tmp_name'])){
                $banniere= $_FILES['banniere']['name'];
                $tmp_banniere = $_FILES['banniere']['tmp_name'];
                $upload_banniere=true;
            }
            if(file_exists($_FILES['banniere2']['tmp_name']) && is_uploaded_file($_FILES['banniere2']['tmp_name'])){
                $banniere2= $_FILES['banniere2']['name'];
                $tmp_banniere2 = $_FILES['banniere2']['tmp_name'];
                $upload_banniere2=true;
            }
        }else{
            $upload_logo=true;
            $logo = $_FILES['logo']['name'];
            $tmp_logo = $_FILES['logo']['tmp_name'];
            $upload_banniere=true;
            $banniere = $_FILES['banniere']['name'];
            $tmp_banniere = $_FILES['banniere']['tmp_name'];
        }

        $nom = $input->post('nom');
        $position = $input->post('position');
        $lat = $input->post('lat');
        $lon = $input->post('lon');
        $cat = $input->post('cat');
        if($upload_logo){

            $logo_extension = pathinfo($logo, PATHINFO_EXTENSION);
            if(!in_array($logo_extension,$allowed) && !empty($image) ){
                echo "<script>alert('Extension non supportée.')</script>";
                exit();
            }
        }
        if($upload_banniere){

            $banniere_extension = pathinfo($banniere, PATHINFO_EXTENSION);
            if(!in_array($banniere_extension,$allowed) && !empty($banniere) ){
                echo "<script>alert('Extension non supportée.')</script>";
                exit();
            }
        }
        $values = ["nom"=>$nom,"position"=>$position,"lat"=>$lat,"lon"=>$lon,"cat"=>$cat,"status"=>$status];
        if($upload_logo){
            $new_name_logo=slugify(time().'_'.$logo);
            uploadToS3("saved_images/boutique/".$new_name_logo,$tmp_logo);
            $values += ['logo' => $new_name_logo];
        }
        if($upload_banniere){
            $new_name_banniere=slugify(time().'_'.$banniere);
            uploadToS3("saved_images/boutique/".$new_name_banniere,$tmp_banniere);
            $values += ['banniere' => $new_name_banniere];
        }
        if($upload_banniere2){

            $banniere2_extension = pathinfo($banniere2, PATHINFO_EXTENSION);
            if(!in_array($banniere2_extension,$allowed) && !empty($banniere2) ){

            }else{
                $new_name_banniere2=slugify(time().'_'.$banniere2);
                uploadToS3("saved_images/boutique/".$new_name_banniere2,$tmp_banniere2);
                $values += ['banniere2' => $new_name_banniere2];

            }
        }
        if( !empty($input->post('mot_passe'))){
            $password = password_hash($_POST['mot_passe'], PASSWORD_DEFAULT);
            $values += ['mot_de_passe' => $password];
        }
        if( !empty($input->post('id'))){

            $exec= $db->update("boutique",$values,array("id"=>$input->post('id')));
            $msg='La boutique a été modifiée avec succes.';
            $action='La boutique #'.$input->post('id').' '.$nom.' a été modifiée.';
        }else{
            $values += ['slug' => slugify(time().'_'.$nom)];
            $exec= $db->insert("boutique",$values);
            $msg='La boutique a été ajoutée avec succes.';
            $action='La boutique #'.$db->lastInsertId().' '.$nom.' a été ajoutée.';
        }

        if($exec){
            save_log($db,$action);
            echo "<script>alert('".$msg."');</script>";
            echo "<script>window.open('boutiques','_self');</script>";

        }else{

            echo "<script>alert('Erreur de sauvegade');</script>";

        }




    }
}

?>