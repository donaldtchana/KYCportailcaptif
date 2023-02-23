<?php

include("includes/dir.php");
include("includes/securite.php");
$page_name='Liste des logs';
if (!is_admin()){
    echo "<script>window.open('index','_self');</script>";
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>
    <script>
        var print_column = [ 1,2,3];
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
                    <h3 class="page-title mb-0 p-0">Logs</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Logs</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Logs</h2>
            <div class="table-responsive">
                <table id="datatable" class="display table user-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Action</th>
                        <th>Auteur</th>
                        <th>Date</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i=1;
                    $get_logs = $db->query("select * from historique order by id desc");

                    while($row = $get_logs->fetch()){
                        ?>
                        <tr>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $row->action; ?>
                            </td>
                            <td>
                                <?= $row->auteur; ?>
                            </td>
                            <td>
                                <?= date("d-m-Y H:i:s", strtotime($row->dates)); ?>
                            </td>


                        </tr>

                    <?php $i++;  } ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
</body>

</html>