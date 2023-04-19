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
  
    <title><?=SITE_NAME?> - Administrateur</title>
  

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/sweat_alert.css">
    <script type="text/javascript" src="assets/js/sweat_alert.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <style>
        
      .swal2-popup .swal2-styled.swal2-confirm {
  
          background-color: #007bff !important;
      }
      .bg-login {
          background-image: url("../assets_clients/img/bgBWC.jpg");
          background-color: #cccccc;
          background-size: cover;
      }


    </style>

</head>
<body class="bg-login" >

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
        ADMINISTRATEUR
    </div>
    <div class="logo">
        <img src="../assets_clients/img/logotest.png" alt="BWC" height="100px">
    </div>

    <form class="p-3 mt-3" method="post">
        <div class="form-field d-flex align-items-center">
            <input type="text" name="admin_email" required placeholder="Email ou nom d´utilisateur">
        </div>
        <div class="form-field d-flex align-items-center">
            <input type="password" name="admin_pass" placeholder="Mot de passe">
        </div>
        <button class="btn" name="admin_login" type="submit">Se connecter</button>
    </form>
    <div class="text-center fs-6">
        <a href="#" class="link-primary">changer de mot de passe</a>
    </div>
</div>

</body>

</html>

<?php

if(isset($_POST['admin_login'])){
  $admin_email = $input->post('admin_email');
  $admin_pass = $input->post('admin_pass');

  $select_admins = $db->query("select * from administrateur where  email=:a_email OR user_name=:a_user_name limit 1",array("a_email"=>$admin_email,"a_user_name"=>$admin_email));
    if($select_admins->rowCount() == 0){
        echo "<script>
      swal({
         type: 'warning',
         text: 'Désolé! Le nom de l´administrateur sont incorrects',
      });
    </script>";
        exit();
    }
  $row_admins = $select_admins->fetch();

  $hash_password = $row_admins->mot_passe;
  $decrypt_password = password_verify($admin_pass, $hash_password);

  if($decrypt_password == 0){
  
    echo "<script>
      swal({
         type: 'warning',
         text: 'Désolé! Le mot de passe ou le nom de l´administrateur sont incorrects',
      });
    </script>";

  }else{

      unset($_SESSION['id_boutique']);
      $_SESSION['email_admin'] = $admin_email;
      $_SESSION['loggedin_time_admin'] = time();
      $action='Connexion à l´espace administrateur';
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