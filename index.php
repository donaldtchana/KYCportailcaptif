<?php
session_start();
include("includes/dir.php");
$counter = intval(get_setting($db, 'counter_video'));

if (isset($_POST['save'])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $quartier = $_POST["quartier"];
    $email = $_POST["email"];
    $tel = $_POST["telephone"];
    $datenaiss = $_POST["datenaiss"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $MAC = exec('getmac');
    $MAC = strtok($MAC, ' ');
    $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    $port = $_SERVER['REMOTE_PORT'];
    $values = ["nom" => $nom, "prenom" => $prenom, "quartier" => $quartier, "email" => $email, "datenaiss" => $datenaiss, "ip" => $ip, "mac" => $MAC, "host" => $host, "port" => $port];
    if (checkScript($values)) {
        $check_user = $db->query("select * from client where  tel=:c_tel  limit 1", array("c_tel" => $tel));

        if ($check_user->rowCount() == 0) {
            $values += ['tel' => $tel];
            $exec = $db->insert("client", $values);
            $id_user = $db->lastInsertId();
        } else {
            $exec = $db->update("client", $values, array("tel" => $tel));
            $row = $check_user->fetch();
            $id_user = $row->id;
        }
        if ($exec) {
            $_SESSION['client'] = $id_user;
            $url = $site_url . '/offres';
            echo "<script>window.open('$url','_self');</script>";

        } else {
            echo "<script>alert('Une erreur s´est produite.');</script>";
            echo "<script>window.open('$site_url','_self');</script>";
            exit();
        }
    }else{
        echo "<center></center><b><h3 style='color: #843534'>vous n'etes pas autorisé à envoyer des scripts</h3></b></center>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
       <?php include 'partials/head.php'?>
        <style>

            .btn{
                background-color: #23aadd;
                color: white !important;
                border: none;
            }
            .logo {
                text-align: center;
                margin-top: -31px;
                margin-bottom: 30px;
            }
            .formBx {
                margin-top: 52px;
                padding-left: 20px;
                margin-left: 5%;
                width: 90%;
                padding-top: 1px;
                /* max-width: 350px; */
                /* margin: 80px auto; */
                background-color: #dde7ee;
                border-radius: 20px;
                padding-bottom: 20px;
                padding-right: 20px;
            }
            .inputBx{
                margin-top: 10px;
            }
            input {
                width: 100%;
                display: block;
                border: none;
                outline: none;
                /* background: none; */
                font-size: 17px;
                color: black;
                padding: 5px 5px 5px 5px;
                height: 38px;
                border: 2px solid #23aadd;
                border-radius: 6px;
            }
            .logo img {
                vertical-align: middle;
                width: 208px;
            }
            body {
                background-image: url("<?=$site_url?>/assets_clients/img/bgBWC.jpg");
                background-color: #cccccc;
                background-size: cover;
            }
            video{
                width: 100%;
            }
            .modal-header .close {
                margin-top: -9px;
            }
            .modal_close{
                box-shadow: none;
            }
            .modal{
                display: block;
                padding-left: 0px !important;
            }
            .modal-dialog {
                /*width: 90%;*/
                margin: 30px auto;
            }
            .hide{
               display: none;
            }
            .new_modal_close
            {
                background-color: white!important;
                float: right;
                border: none;
                box-shadow: none;
                color: red;
                font-weight: 700;
                pointer-events: none;
            }
            .row {
                margin-left: 0px;
                margin-right: 0px;
            }
            .modal-header {
                padding: 5px;
                border-bottom: 1px solid #e5e5e5;
            }
            .btn_buy {
                background-color: #C73B93;
                border-radius: 12px !important;
            }
        </style>
    </head>
    <body>
    <div class="change-language d-none d-sm-block">
        <select class="language-bar" onChange="window.location.href=this.value">
            <option value="<?=$site_url?>?url=<?=$url_page?>&&lang=fr" <?=(get_language()=='fr') ? 'selected' : null?> >Francais</option>
            <option value="<?=$site_url?>?url=<?=$url_page?>&&lang=en" <?=(get_language()=='en') ? 'selected' : null?>>English</option>

        </select>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4" style="margin-top: -42px">
            <div class="formBx">
                <div class="logo">
                <img src="<?=$site_url?>/assets_clients/img/logotest.png" alt="BWC">
                </div>
                <h2 style="text-align: center;margin-top: -59px"><?=_l('text_login')?></h2>
                <form action="" method="POST" id="idform">
                    <div class="inputBx">
                        <input type="text" class="" name="nom"  placeholder="<?=_l('enter_your_name')?>" required>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="prenom" placeholder="<?=_l('enter_your_surname')?>" >
                    </div>
                    <div class="inputBx">
                        <input type="text" name="quartier" placeholder="<?=_l('enter_your_quater')?>" >
                    </div>
                    <div class="inputBx">
                        <input type="email" name="email" placeholder="<?=_l('enter_your_email')?>" required>
                    </div>
                    <div class="inputBx">
                        <input type="tel" name="telephone" id="tel" placeholder="<?=_l('enter_your_mobile')?>"  required>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="datenaiss" placeholder="<?=_l('date_naiss')?> " onfocus="(this.type='date')"  required>
                    </div>
                    <div class="inputBx">
                        <input style="..." type="submit" class="btn" value="<?=_l('btn_save')?>" name="save" id="submit"  disabled>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
        </div>

    </div>





    <div class="modal fade" id="the_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="new_modal_close" data-dismiss="modal" aria-label="Close">
                       <span class="counter"><?=$counter?></span>
                    </button>
                    <button type="button" class="close modal_close hide" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"  style="font-size: 26px;
    color: red !important;">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <video controls autoplay loop muted>
                        <source src="<?=$site_url?>/saved_images/videos/pixels_ideos.mp4" type="video/mp4">
                    </video>
                </div>

            </div>
        </div>
    </div>

     <?php include 'partials/footer.php'?>
    <script>
        var  sec=<?=$counter?>;
        $(document).ready(function() {
            setInterval(function () {


                if (sec > 1){
                    $('.counter').html(sec);
                }
                else{
                    $('.new_modal_close').addClass('hide');
                    $('.modal_close').removeClass('hide');
                }
                sec =sec-1;
            }, 1000);
            $('#the_modal').modal({backdrop: 'static', keyboard: false}, 'show');
        });

        $(document).ready(function () {
            $('#tel').keyup(function () {
                $('#submit').attr(
                    'disabled',/^6[5-9][0-9]{7}$/.test($(this).val())?
                        false:
                        true
                );

            });
        });




    </script>
    </body>
</html>