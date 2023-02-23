<?php
session_start();
include("includes/dir.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'partials/head.php'?>

    <style>
        .cart-widget-open .cart-widget-container {

            z-index: 9999999999999999999999999999999999999;
        }
        @media (max-width: 479px ) {
            .payment_btn {
                width: 250px;
            }
        }
        .carousel-control 			 { width:  4%; }
        @media (max-width: 767px) {
            .carousel-inner .active.left { left: -100%; }
            .carousel-inner .next        { left:  100%; }
            .carousel-inner .prev		 { left: -100%; }
            .active > div { display:none; }
            .active > div:first-child { display:block; }

        }
        @media (min-width: 767px) and (max-width: 992px ) {
            .carousel-inner .active.left { left: -50%; }
            .carousel-inner .next        { left:  50%; }
            .carousel-inner .prev		 { left: -50%; }
            .active > div { display:none; }
            .active > div:first-child { display:block; }
            .active > div:first-child + div { display:block; }
        }
        @media (min-width: 992px ) {
            .carousel-inner .active.left { left: -16.7%; }
            .carousel-inner .next        { left:  16.7%; }
            .carousel-inner .prev		 { left: -16.7%; }
        }
        .col-price {
            width: 100%;
        }
        .col-price li.header {
            color: #15a5ea;
            font-size: 18px;
            font-weight: bold;
            background: #eee;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .details_offre {

            padding-top: 37px;
            padding-bottom: 37px;
            background: #888;
        }
        .card {
            border:none;
            padding: 10px 50px;
        }

        .card::after {
            position: absolute;
            z-index: -1;
            opacity: 0;
            -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }



        .card:hover::after {
            opacity: 1;
        }

        .card:hover .btn-outline-primary{
            color:white;
            background:#007bff;
        }
        .carousel {
            background: transparent;
        }
        .list-group {
            padding-top: 20px;
            padding-bottom: 36px;
        }
        .card {
            background-color: #23aadd;
            border: none;
            padding: 10px 50px;
            color: white;
            font-weight: 700;
        }
        .list-group-item {
            padding-left: 0px;
            background-color: transparent;
            padding-right: 0px;
        }
        .price{

        }
        .devise{

        }
        .buy_offer {
            background-color: #C73B93 !important;
            border-radius: 11px;
            padding-top: 6px;
            padding-bottom: 6px;
        }
        .offer_tilte {
            font-size: 34px;
            text-align: center;
        }
        body {
            background-image: url("<?=$site_url?>/assets_clients/img/maquette playce.jpg");
            background-color: #cccccc;
            background-size: cover;
        }
        .list-group-item {
            font-size: 13px;
        }
        .card-title{
            font-size: 25px;
        }
        small{
            font-size: 20px !important;
        }
        .carousel-control.left, .carousel-control.right {
            background-image: none;
            z-index: 999999999999999999;
            pointer-events: all;
        }
        .arrow-left,.arrow-right
        {
            position: absolute;
            top: 50%;
            /* margin-top: -10px !important; */
            z-index: 5;
            display: inline-block;
            width: 22px;
            height: 30px;
            margin-top: -10px;
            font-size: 30px;
        }
        .arrow-left{
            margin-left: -24px;
        }

        .carousel-control {
            opacity: 1;
        }
        .cart-widget-close-overlay {
            position: relative;

        }
        .cart-item {
            width: 100%;
        }


    </style>
</head>
<body>
<div class="container-fluid">
    <a class="" style="color: black;
    font-size: 22px;
    font-weight: 700;" href="<?=$site_url?>" >Accueil</a>
    <h1 class="offer_tilte">Nos Offres Data</h1>
<div class="carousel slide" data-ride="carousel" data-pause="true" data-type="multi"  data-interval="5000" id="myCarousel">
    <div class="carousel-inner">
        <?php
        $i=1;

        $get_offers = $db->query("select * from new_offers   order by prix asc");

        while($row = $get_offers->fetch()){
        ?>
        <div class="item <?=($i==1) ? 'active' : '';?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                        <div class="text-center p-3">
                            <h5 class="card-title"><?= $row->nom; ?></h5>
                            <small><?= $row->data_display; ?></small>
                            <br><br>
                            <span class="h2 price"><?= $row->prix; ?> </span><span class="devise">FCFA</span>
                            <br><br>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg> <?= $row->desc1; ?></li>
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg> <?= $row->desc2; ?></li>
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg> <?= $row->desc3; ?></li>
                    </ul>

                        <button data-id="<?=$row->id;?>" data-nom="<?=$row->nom;?>" data-prix="<?=$row->prix;?>" data-data-display="<?=$row->data_display;?>" class="btn btn-outline-primary btn-lg buy_offer" >Acheter</button>

                </div>
            </div>
        </div>
            <?php $i++; } ?>

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img class="arrow-left" src="<?=$site_url?>/assets_clients/img/left.png"></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><img class="arrow-right" src="<?=$site_url?>/assets_clients/img/right.png"></a>
</div>
<div class="cart-widget-container">
    <div class="cart-widget text-center">
        <a class="close" id="cart-widget-close">
            <span class="" style="    font-weight: 700;">X</span>
        </a>
        <h1>PLAYCE</span></h1>
        <h3 class="section-heading">Votre Forfait</h3>
        <div class="items-container" id="items">
            <div class="cart-item" id="item0" data-id="54"><span class="cart-item-image"></span><span class="cart-item-name h4 cart-item-name_54"> </span><span class="cart-item-price"><span class="cvalue cvalue_54"> </span>FCFA</span> </span></span></div>
        </div>

        <div class="cart-summary" id="cart-summary">
            <h4 class="section-heading">résumé</h4>
            <div class="cart-summary-row" id="cart-total">Total <span class="cart-value"><span id="cost_value"></span> FCFA</span></div>
        </div>

        <form action="" method="post" class="cart-form" id="cart-form">
            <input type="hidden" name="amount" id="amount" value="">
            <input type="hidden" id="forfait" name="forfait" value="">
            <input type="hidden" id="method" name="method" value="">
            <p style="text-align: center;font-size: 20px;font-weight: 700">Moyens de paiements</p>
           <div class="row">
               <div class="col-md-6">
                   <img class="payment_btn" link="<?=$site_url?>/boutiques"   method="Perfect Pay" src="<?=$site_url?>/assets_clients/img/perfectpay.png">
               </div>
               <div class="col-md-6">
                   <img class="payment_btn" link="<?=$site_url?>/boutiques"   method="Paypal" src="<?=$site_url?>/assets_clients/img/paypal.png">
               </div>
               <div class="col-md-6">
                   <img class="payment_btn" link="<?=$site_url?>/boutiques"   method="Orange Money" src="<?=$site_url?>/assets_clients/img/orange.png">
               </div>
               <div class="col-md-6">
                   <img class="payment_btn" link="<?=$site_url?>/boutiques"   method="Mtn Money" src="<?=$site_url?>/assets_clients/img/mtn.jpg">
               </div>
           </div>

        </form>
    </div>
    <div class="cart-widget-close-overlay"></div>
</div>



<?php include 'partials/footer.php'?>
<script>


    $(document).ready(function() {

        $("body").delegate(".payment_btn", "click", function(){
            if (confirm("Confirmez vous l'achat ?") == true) {
                window.location.href = $(this).attr('link');
            } else {

            }

        });
        $("body").delegate(".buy_offer", "click", function(){

            $(".cart-item-name").html($(this).attr('data-nom')+' / '+$(this).attr('data-data-display'));
            $(".cvalue").html('Prix : '+$(this).attr('data-prix'));
            $("#cost_value").html($(this).attr('data-prix'));

            $("body").toggleClass("cart-widget-open");
        });
        $("#cart-widget-close").on('click',function() {
            $("body").toggleClass("cart-widget-open");
        });
        $('.carousel[data-type="multi"] .item').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<2;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });

    });
</script>
</body>
</html>