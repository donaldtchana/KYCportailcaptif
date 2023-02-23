<?php

include("includes/dir.php");
include("includes/securite.php");
$page_name='Paramètres';
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
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
                    <h3 class="page-title mb-0 p-0">Paramètres</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Paramètres</h2>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-12 mb-0">URL du site</label>
                                <div class="col-md-12">
                                    <input required type="text" value="<?=get_setting($db,"site_url")?>" name="site_url" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Slider 1 : </label>

                                <div class="col-md-7">

                                    <input type="file"  name="slider1" class="form-control">

                                </div>
                                <div class="col-md-2">
                                    <?php if(!empty(get_setting($db,"slider1"))) {?>
                                        <a href="<?= $site_url.'/saved_images/sliders/'.get_setting($db,"slider1"); ?>" target="_blank" >Apercu</a>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Slider 2 : </label>

                                <div class="col-md-7">

                                    <input type="file"  name="slider2" class="form-control">

                                </div>
                                <div class="col-md-2">
                                    <?php if(!empty(get_setting($db,"slider2"))) {?>
                                        <a href="<?= $site_url.'/saved_images/sliders/'.get_setting($db,"slider2"); ?>" target="_blank" >Apercu</a>
                                    <?php  } ?>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Slider 3 : </label>

                                <div class="col-md-7">

                                    <input type="file"  name="slider3" class="form-control">

                                </div>
                                <div class="col-md-2">
                                    <?php if(!empty(get_setting($db,"slider3"))) {?>
                                    <a href="<?= $site_url.'/saved_images/sliders/'.get_setting($db,"slider3"); ?>" target="_blank" >Apercu</a>
                                    <?php  } ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="paypal" <?=get_setting($db,"paypal",true) ? 'checked' : '';?> type="checkbox" value="" id="paypal">
                                    <label class="form-check-label" for="paypal">
                                       Paypal
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Paypal Client ID</label>
                                <div class="col-md-12">
                                    <input  type="text" value="<?=get_setting($db,"paypal_client_id")?>" name="paypal_client_id" placeholder="" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Paypal Clè Secrète</label>
                                <div class="col-md-12">
                                    <input  type="password" value="<?=get_setting($db,"paypal_key_secrete")?>" placeholder="" name="paypal_key_secrete" class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" <?=get_setting($db,"orange_money",true) ? 'checked' : '';?> name="orange_money" type="checkbox" value="" id="orange_money">
                                    <label class="form-check-label" for="orange_money">
                                        Orange money
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" <?=get_setting($db,"mtn_money",true) ? 'checked' : '';?> name="mtn_money" type="checkbox" value="" id="mtn_money">
                                    <label class="form-check-label" for="mtn_money">
                                        Mtn money
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" <?=get_setting($db,"perfect_pay",true) ? 'checked' : '';?> name="perfect_pay" type="checkbox" value="" id="perfect_pay">
                                    <label class="form-check-label" for="perfect_pay">
                                        Perfect Pay
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button type="submit" name="save_setting" class="btn btn-success mx-auto mx-md-0 text-white">ENREGISTRER</button>
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

if(isset($_POST['save_setting'])){
    $allowed = allowed_image_extensions();
    save_setting($db,'site_url',$_POST['site_url']);
    if (isset($_POST['paypal'])){
        save_setting($db,'paypal','1');
    }else{
        save_setting($db,'paypal','0');
    }
    if (isset($_POST['orange_money'])){
        save_setting($db,'orange_money','1');
    }else{
        save_setting($db,'orange_money','0');
    }
    if (isset($_POST['mtn_money'])){
        save_setting($db,'mtn_money','1');
    }else{
        save_setting($db,'mtn_money','0');
    }
    if (isset($_POST['perfect_pay'])){
        save_setting($db,'perfect_pay','1');
    }else{
        save_setting($db,'perfect_pay','0');
    }
    save_setting($db,'paypal_client_id',$_POST['paypal_client_id']);
    save_setting($db,'paypal_key_secrete',$_POST['paypal_key_secrete']);
    $upload_slider1=false;
    if(file_exists($_FILES['slider1']['tmp_name']) && is_uploaded_file($_FILES['slider1']['tmp_name'])){
        $slider1= $_FILES['slider1']['name'];
        $tmp_slider1 = $_FILES['slider1']['tmp_name'];
        $upload_slider1=true;
    }
    if($upload_slider1){

        $slider1_extension = pathinfo($slider1, PATHINFO_EXTENSION);
        if(!in_array($slider1_extension,$allowed) && !empty($slider1) ){

        }else{
            $new_name_slider1=slugify(time().'_'.$slider1);
            if(!empty(get_setting($db,"slider1"))) {
                unlink("$dir/saved_images/sliders/".get_setting($db,"slider1"));
            }
            uploadToS3("saved_images/sliders/".$new_name_slider1,$tmp_slider1);
            save_setting($db,'slider1',$new_name_slider1);
        }
    }
    $upload_slider2=false;
    if(file_exists($_FILES['slider2']['tmp_name']) && is_uploaded_file($_FILES['slider2']['tmp_name'])){
        $slider2= $_FILES['slider2']['name'];
        $tmp_slider2 = $_FILES['slider2']['tmp_name'];
        $upload_slider2=true;
    }
    if($upload_slider2){

        $slider2_extension = pathinfo($slider2, PATHINFO_EXTENSION);
        if(!in_array($slider2_extension,$allowed) && !empty($slider2) ){

        }else{
            $new_name_slider2=slugify(time().'_'.$slider2);
            if(!empty(get_setting($db,"slider2"))) {
                unlink("$dir/saved_images/sliders/".get_setting($db,"slider2"));
            }
            uploadToS3("saved_images/sliders/".$new_name_slider2,$tmp_slider2);
            save_setting($db,'slider2',$new_name_slider2);
        }
    }
    $upload_slider3=false;
    if(file_exists($_FILES['slider3']['tmp_name']) && is_uploaded_file($_FILES['slider3']['tmp_name'])){
        $slider3= $_FILES['slider3']['name'];
        $tmp_slider3 = $_FILES['slider3']['tmp_name'];
        $upload_slider3=true;
    }
    if($upload_slider3){

        $slider3_extension = pathinfo($slider3, PATHINFO_EXTENSION);
        if(!in_array($slider3_extension,$allowed) && !empty($slider3) ){

        }else{
            $new_name_slider3=slugify(time().'_'.$slider3);
            if(!empty(get_setting($db,"slider3"))) {
                unlink("$dir/saved_images/sliders/".get_setting($db,"slider3"));
            }
            uploadToS3("saved_images/sliders/".$new_name_slider3,$tmp_slider3);
            save_setting($db,'slider3',$new_name_slider3);
        }
    }
    echo "<script>alert('Les parametres ont été sauvegardés avec succès.');</script>";
    echo "<script>window.open('parametres','_self');</script>";
}
?>
