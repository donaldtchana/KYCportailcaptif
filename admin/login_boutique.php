<?php

session_start();

include("includes/dir.php");

if(isset($_SESSION['email_admin'])){

    echo "<script>window.open('index','_self');</script>";

}

?>


    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?=SITE_NAME?> - Boutique</title>


        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/sweat_alert.css">
        <script type="text/javascript" src="assets/js/sweat_alert.js"></script>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


        <style>

            .swal2-popup .swal2-styled.swal2-confirm {

                background-color: #007bff !important;
            }


        </style>

    </head>
    <body class="bg-login">

    <script src="../js/jquery.min.js"></script>
    <?php if(isset($_GET['session_expired'])){ ?>

        <div class="alert alert-danger mb-3 alert-dismissible fade show">

            <button type="button" class="close" data-dismiss="alert">

                <span>&times;</span>

            </button>

            <span class=" mt-3"><i class="fa  fa-1x fa-exclamation-circle"></i>Votre session a expiré. S'il vous plait connectez vous à nouveau!</span>

        </div>

    <?php } ?>
    <div class="wrapper">
        <div class="text-center  name">
            BOUTIQUE
        </div>
        <div class="logo">
            <img src="admin_images/logo.jpg" alt="">
        </div>

        <form class="p-3 mt-3" method="post">
            <div class="form-field d-flex align-items-center">
                <input type="text" name="boutique_name" required placeholder="Nom de la boutique">
            </div>
            <div class="form-field d-flex align-items-center">
                <input type="password" name="boutique_pass" placeholder="Mot de passe">
            </div>
            <button  class="btn" name="boutique_login" type="submit">Se connecter</button>
        </form>
        <div class="text-center fs-6">
            <a href="login">Se connecter en tant qu´ administrateur</a>
        </div>
    </div>

    </body>

    </html>

<?php

if(isset($_POST['boutique_login'])){
    $boutique_name = $input->post('boutique_name');
    $boutique_pass = $input->post('boutique_pass');

    $select_boutiques = $db->query("select * from boutique where  nom=:nom or slug=:nom  limit 1",array("nom"=>$boutique_name));
    if($select_boutiques->rowCount() == 0){
        echo "<script>
      swal({
         type: 'warning',
         text: 'Désolé! Le nom de la boutique sont incorrects',
      });
    </script>";
        exit();
    }
    $row_boutiques = $select_boutiques->fetch();

    $hash_password = $row_boutiques->mot_de_passe;
    $decrypt_password = password_verify($boutique_pass, $hash_password);

    if($decrypt_password == 0){

        echo "<script>
      swal({
         type: 'warning',
         text: 'Désolé! Le mot de passe ou le nom de la boutique sont incorrects',
      });
    </script>";

    }else{

        unset($_SESSION['email_admin']);
        $_SESSION['id_boutique'] = $row_boutiques->id;
        $_SESSION['loggedin_time_admin'] = time();
        $action='Connexion à l´espace boutique';
        save_log($db,$action);
        echo "<script>
          swal({
          type: 'success',
          text: 'Connexion avec succès...',
          timer: 1000,
          onOpen: function(){
          swal.showLoading()
          }
          }).then(function(){
            window.open('index','_self');
          });
        </script>";

    }

}

?>