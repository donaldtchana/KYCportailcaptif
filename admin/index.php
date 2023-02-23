<?php

include("includes/dir.php");
include("includes/securite.php");
$page_name='Tableau de bord';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include("views/partial/head.php"); ?>
    <style>

        h2,
        h5,
        .h2,
        .h5 {
            font-family: inherit;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: .5rem;
            color: #32325d;
        }
        h5,
        .h5 {
            font-size: .8125rem;
        }
        @media (min-width: 992px) {

            .col-lg-6 {
                max-width: 50%;
                flex: 0 0 50%;
            }
        }
        @media (min-width: 1200px) {

            .col-xl-3 {
                max-width: 25%;
                flex: 0 0 25%;
            }
            .col-xl-6 {
                max-width: 50%;
                flex: 0 0 50%;
            }
        }
        .bg-danger {
            background-color: #f5365c !important;
        }
        @media (min-width: 1200px) {

            .justify-content-xl-between {
                justify-content: space-between !important;
            }
        }
        .pt-5 {
            padding-top: 3rem !important;
        }
        .pb-8 {
            padding-bottom: 8rem !important;
        }
        @media (min-width: 768px) {

            .pt-md-8 {
                padding-top: 8rem !important;
            }
        }
        @media (min-width: 1200px) {

            .mb-xl-0 {
                margin-bottom: 0 !important;
            }
        }
        .font-weight-bold {
            font-weight: 600 !important;
        }
        a.text-success:hover,
        a.text-success:focus {
            color: #24a46d !important;
        }
        .text-warning {
            color: #fb6340 !important;
        }
        a.text-warning:hover,
        a.text-warning:focus {
            color: #fa3a0e !important;
        }
        .text-danger {
            color: #f5365c !important;
        }
        a.text-danger:hover,
        a.text-danger:focus {
            color: #ec0c38 !important;
        }
        a.text-white:hover,
        a.text-white:focus {
            color: #e6e6e6 !important;
        }
        .text-muted {
            color: #8898aa !important;
        }
        @media print {
            *,
            *::before,
            *::after {
                box-shadow: none !important;
                text-shadow: none !important;
            }
            a:not(.btn) {
                text-decoration: underline;
            }
            p,
            h2 {
                orphans: 3;
                widows: 3;
            }
            h2 {
                page-break-after: avoid;
            }
        @page {
              size: a3;
          }

            body {
                min-width: 992px !important;
            }
        }
        figcaption,
        main {
            display: block;
        }

        main {
            overflow: hidden;
        }
        .bg-yellow {
            background-color: #ffd600 !important;
        }
        .icon {
            width: 3rem;
            height: 3rem;
        }
        .icon i {
            font-size: 2.25rem;
        }
        .icon-shape {
            display: inline-flex;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
        }
    </style>
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
                    <h3 class="page-title mb-0 p-0">Tableau de bord</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <h2 class="mb-5 black_title">Statistiques</h2>
            <div class="header-body">
                <div class="row">
                    <?php
                    if(isset($_SESSION['email_admin'])){
                    ?>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Clients</h5>
                                            <span class="h2 font-weight-bold mb-0"><?=$db->count("client")?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Boutiques Actives</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                            <?php
                                            $query = $db->query('SELECT * FROM boutique WHERE status = 1');
                                            echo $query->rowCount();
                                            ?>
                                        </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Boutiques Inactives</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                             <?php
                                             $query = $db->query('SELECT * FROM boutique WHERE status <> 1');
                                             echo $query->rowCount();
                                             ?>
                                        </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else  {?>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Articles</h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$db->count("article",array("id_boutique"=>$_SESSION['id_boutique']))?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>


                </div>
            </div>
        </div>

    </div>

</div>

<?php include("views/partial/footer.php"); ?>
</body>

</html>