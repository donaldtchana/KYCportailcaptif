<?php
session_start();
include("includes/dir.php");
$counter = intval(get_setting($db, 'counter_video'));
if (isset($_POST['save'])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $quartier = $_POST["quartier"];
    $email = $_POST["email"];
    $tel = $_POST["telephone"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $MAC = exec('getmac');
    $MAC = strtok($MAC, ' ');
    $host =  gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    $port = $_SERVER['REMOTE_PORT'];
    $values = ["nom"=>$nom,"prenom"=>$prenom,"quartier"=>$quartier,"tel"=>$tel,"ip"=>$ip,"mac"=>$MAC,"host"=>$host,"port"=>$port];
    $check_user = $db->query("select * from client where  email=:c_email  limit 1",array("c_email"=>$email));

    if($check_user->rowCount() == 0){
        $values += ['email' => $email];
        $exec= $db->insert("client",$values);
        $id_user=$db->lastInsertId();
    }else{
        $exec= $db->update("client",$values,array("email"=>$email));
        $row = $check_user->fetch();
        $id_user=$row->id;
    }
    if($exec){
        $_SESSION['client'] = $id_user;
        $url=$site_url.'/offres';
        echo "<script>window.open('$url','_self');</script>";

    }else{
        echo "<script>alert('Une erreur s´est produite.');</script>";
        echo "<script>window.open('$site_url','_self');</script>";
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
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
                margin-top: 7px;
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
                background-image: url("<?=$site_url?>/assets_clients/img/maquette playce.jpg");
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
        <div class="col-md-4">
            <div class="formBx">
                <div class="logo">
                <img src="<?=$site_url?>/assets_clients/img/LOGO-PLAYCE-.png" alt="playce">
                </div>
                <h2 style="text-align: center">Login</h2>
                <form action="" method="POST">
                    <div class="inputBx">
                        <input type="text" class="" name="nom" placeholder="Entrer votre nom" required>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="prenom" placeholder="Entrer votre prenom" required>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="quartier" placeholder="Entrer votre quartier" required>
                    </div>
                    <div class="inputBx">
                        <input type="email" name="email" placeholder="Entrer votre email" required>
                    </div>
                    <div class="inputBx">
                        <input type="tel" name="telephone" placeholder="Entrer votre téléphone" required>
                    </div>
                    <div class="inputBx">
                        <input style="margin-left: 0px !important;margin-right: 0px !important;" type="submit" class="btn" value="Se connecter" name="save">
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
            <marquee width="100%" direction="left" height="30px">
               This is a sample scrolling text that has scrolls in the upper direction.
            </marquee> 
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
    </script>
    </body>
</html>