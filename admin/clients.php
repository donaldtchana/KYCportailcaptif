<?php

include("includes/dir.php");
include("includes/securite.php");
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
$page_name='Liste des clients';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>
    <script>
        var print_column = [ 0, 1,2,3,4];
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
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Clients</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clients</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Listes des clients</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Téléphone</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i=1;

                    $get_clients = $db->query("select * from client order by id desc");

                    while($row = $get_clients->fetch()){
                        ?>
                        <tr>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $row->nom; ?>
                            </td>
                            <td>
                                <?= $row->prenom; ?>
                            </td>
                            <td>
                                <?= $row->email; ?>
                            </td>
                            <td>
                                <?= $row->tel; ?>
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