<?php
session_start();
include("includes/dir.php");

?>
<!DOCTYPE html>
<html lang="">

<head>
    <?php
    include("ecommerce_partial/head.php");
    ?>
    <style>
        @media only screen and (max-width: 479px){
            .swiper-wrappers li.swiper-slidess {
                width: 50%;
            }
        }
        .filter_element:hover {
            background-color: #C73B93;
        }
        .filter_element.active {
            background-color: #C73B93;
        }
        .block_filter{
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
            text-align: center;
        }
        .filter_element {
            cursor: pointer;
            display: inline-block;
            background-color: #00A9DF;
            padding-top: 12px;
            margin-left: 10px;
            margin-right: 8px;
            padding-bottom: 12px;
            color: white;
            padding-left: 12px;
            font-weight: 700;
            padding-right: 12px;
            border-radius: 36px;
            margin-bottom: 10px;
        }
        .boutique_name_view {
            font-weight: 700;
            font-size: 22px;
        }
        .hide {
            display: none!important;
        }
        .display_icon {
            width: 33px;
            cursor: pointer;
        }
        .display_type {
            margin-top: 37px;
            text-align: center;
            display: block;
            margin-bottom: 36px;
        }
        .active_display {
            background-color: #C73B93;
        }




        .slider,
        .slider > div {
            background-position: center center;
            display: block;
            width: 100%;
            height: 500px;
            position: relative;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #000;
            overflow: hidden;
            -moz-transition: transform .4s;
            -o-transition: transform .4s;
            -webkit-transition: transform .4s;
            transition: transform .4s;
            margin-top: 36px;
        }

        .slider > div {
            position: absolute;
        }

        .slider > i {
            color: #5bbd72;
            position: absolute;
            font-size: 60px;
            margin: 20px;
            top: 40%;
            text-shadow: 0 10px 2px #223422;
            transition: .3s;
            width: 30px;
            padding: 10px 13px;
            background: #fff;
            background: rgba(255, 255, 255, .3);
            cursor: pointer;
            line-height: 0;
            box-sizing: content-box;
            border-radius: 3px;
            z-index: 4;

        }
        .slider > ul > .showli {
            background-color: #C73B93;
            -moz-animation: boing .5s forwards;
            -o-animation: boing .5s forwards;
            -webkit-animation: boing .5s forwards;
            animation: boing .5s forwards;
        }
        .slider > i svg {
            margin-top: 3px;
        }

        .slider > .left {
            left: -100px;
        }
        .slider > .right {
            right: -100px;
        }
        .slider:hover > .left {
            left: 0;
        }
        .slider:hover > .right {
            right: 0;
        }

        .slider > i:hover {
            background:#fff;
            background: rgba(255, 255, 255, .8);
            transform: translateX(-2px);
        }

        .slider > i.right:hover {
            transform: translateX(2px);
        }

        .slider > i.right:active,
        .slider > i.left:active {
            transform: translateY(1px);
        }

        .slider:hover > div {
            transform: scale(1.01);
        }

        .hoverZoomOff:hover > div {
            transform: scale(1);
        }

        .slider > ul {
            position: absolute;
            bottom: 10px;
            left: 50%;
            z-index: 4;
            padding: 0;
            margin: 0;
            transform: translateX(-50%);
        }

        .slider > ul > li {
            padding: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            list-style: none;
            float: left;
            margin: 10px 10px 0;
            cursor: pointer;
            border: 1px solid #fff;
            -moz-transition: .3s;
            -o-transition: .3s;
            -webkit-transition: .3s;
            transition: .3s;
        }


        .slider > ul > li:hover {
            background-color: #C73B93;
        }

        .slider > .show {
            z-index: 1;
        }

        .hideDots > ul {
            display: none;
        }

        .showArrows > .left {
            left: 0;
        }

        .showArrows > .right {
            right: 0;
        }

        .titleBar {
            z-index: 2;
            display: inline-block;
            background: rgba(0,0,0,.5);
            position: absolute;
            width: 100%;
            bottom: 0;
            transform: translateY(100%);
            padding: 20px 30px;
            transition: .3s;
            color: #fff;
        }

        .titleBar * {
            transform: translate(-20px, 30px);
            transition: all 700ms cubic-bezier(0.37, 0.31, 0.2, 0.85) 200ms;
            opacity: 0;
        }

        .titleBarTop .titleBar * {
            transform: translate(-20px, -30px);
        }

        .slider:hover .titleBar,
        .slider:hover .titleBar * {
            transform: translate(0);
            opacity: 1;
        }

        .titleBarTop .titleBar {
            top: 0;
            bottom: initial;
            transform: translateY(-100%);
        }

        .slider > div span {
            display: block;
            background: rgba(0,0,0,.5);
            position: absolute;
            bottom: 0;
            color: #fff;
            text-align: center;
            padding: 0;
            width: 100%;
        }


        @keyframes boing {
            0% {
                transform: scale(1.2);
            }
            40% {
                transform: scale(.6);
            }
            60% {
                transform: scale(1.2);
            }
            80% {
                transform: scale(.8);
            }
            100% {
                transform: scale(1);
            }
        }



        html {
            height: 100%;
            box-sizing: border-box;
        }
        *, *:before, *:after {
            box-sizing: inherit;
        }

        @media screen and (max-width: 479px){
            .slider, .slider > div {
                margin-top: 33px;
                height: 180px;

            }
            .section-min.section.product {
                margin-top: 5px !important;
            }
        }
        @media screen and (min-width: 478px) and  (max-width: 767px){
            .slider, .slider > div {
                margin-top: 33px;
                height: 303px;

            }
            .section-min.section.product {
                margin-top: 5px !important;
            }
        }





        @media screen and (min-width: 768px) and (max-width: 991px){
            .index-3 .section-min.section.product {
                padding-bottom: 57px;
                padding-top: 0;
                margin-top: 2px;
            }
        }
        @media screen and (min-width: 478px) and  (max-width: 767px){
            .section-min.section.product {
                margin-top: 101px;
            }
        }
        @media screen and (max-width: 767px){
            .boutique_name_view {
                font-weight: 700;
                font-size: 15px;
            }
        }

    </style>
</head>

<body data-offset="50" data-spy="scroll" data-target=".navbar" class="dark-theme index-3">

<?php
include("ecommerce_partial/nav.php");
?>


<div class="slider" id="slider1">
    <?php if(!empty(get_setting($db,"slider1"))) {?>
        <div style="background-image:url(<?= $site_url.'/saved_images/sliders/'.get_setting($db,"slider1"); ?>)"></div>
    <?php  } ?>
    <?php if(!empty(get_setting($db,"slider2"))) {?>
        <div style="background-image:url(<?= $site_url.'/saved_images/sliders/'.get_setting($db,"slider2"); ?>)"></div>
    <?php  } ?>
    <?php if(!empty(get_setting($db,"slider3"))) {?>
        <div style="background-image:url(<?= $site_url.'/saved_images/sliders/'.get_setting($db,"slider3"); ?>)"></div>
    <?php  } ?>
    <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
        </svg></i>
    <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path>
        </svg></i>

</div>

<section class="section-min section product " id="products">
    <div class="container overflow-hidden">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-heading">Nos Boutiques</h3>
            </div>
            <div class="row ">
                <div class="col-md-12 bloc_filter_row">
                    <ul class="block_filter">
                    <?php

                    $get_cat_boutiques = $db->query("select * from categorie_boutiques  order by nom asc ");

                    while($row = $get_cat_boutiques->fetch()){
                        ?>
                        <li class="filter_element" value="<?=$row->id?>">
                            <?=$row->nom?>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="display_type">
                        <img alt="product image" type="icon" class="display_icon active_display" src="<?= $site_url.'/assets_clients/img/image_icon.png'; ?>">
                            <img alt="product image" type="name" class="display_icon" src="<?= $site_url.'/assets_clients/img/name_icon.png'; ?>">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-list-sliderd">
                            <ul class="swiper-wrappers product-list product-list-vertical" id="boutiques_list">

                            </ul>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <p id="voir_plus_bloc">

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>


</section>

<?php
include("ecommerce_partial/footer.php");
?>
<script>
    var page = 1;
    var display='icon';
    $(document).ready(function() {
        load_boutique_ajax();
        $("body").on("click", "#voir_plus", function(e) {
            e.preventDefault();
            page=$(this).attr('page');
            load_boutique_ajax();
        });
        $("body").on("click", ".display_icon", function(e) {
            $('.display_icon').removeClass('active_display');
            $(this).addClass('active_display');
            display=$(this).attr('type');
            if (display=='icon'){
                $('.boutique_image').removeClass('hide');
                $('.boutique_name').addClass('hide');

            }else{
                $('.boutique_image').addClass('hide');
                $('.boutique_name').removeClass('hide');

            }

        });
        $("body").on("click", ".filter_element", function(e) {
                if($(this).hasClass('active')){
                    $(this).removeClass('active');
                }else{
                    $(".filter_element").removeClass('active');
                    $(this).addClass('active');
                }
            page=1;
            load_boutique_ajax();
        });
    } );


    function load_boutique_ajax(){
        var checkedVals = $('.filter_element.active').map(function() {
            return this.value;
        }).get();
        $('#boutiques_list').animate({'opacity':'0.3'}, 1000, function () {
            $.ajax({
                type: "POST",
                url: "<?=$site_url?>"+'/ajax_boutiques',
                data: {
                    page: page,
                    cat:checkedVals.join(",")
                },
                success: function (data) {
                    $('#voir_plus_bloc').html(data.link_more);
                    if (page==1){
                        $('#boutiques_list').html(data.html);
                    }else
                    {
                        $('#boutiques_list').append(data.html);
                    }
                    if (display=='icon'){
                        $('.boutique_image').removeClass('hide');
                        $('.boutique_name').addClass('hide');

                    }else{
                        $('.boutique_image').addClass('hide');
                        $('.boutique_name').removeClass('hide');

                    }
                    $('#boutiques_list').animate({'opacity':'1.0'}, 1000);
                },
                error: function(err) {
                    $('#boutiques_list').animate({'opacity':'1.0'}, 1000);
                },
            });
        });

    }





    (function($) {
        "use strict";
        $.fn.sliderResponsive = function(settings) {

            var set = $.extend(
                {
                    slidePause: 5000,
                    fadeSpeed: 800,
                    autoPlay: "on",
                    showArrows: "off",
                    hideDots: "off",
                    hoverZoom: "on",
                    titleBarTop: "off"
                },
                settings
            );

            var $slider = $(this);
            var size = $slider.find("> div").length; //number of slides
            var position = 0; // current position of carousal
            var sliderIntervalID;
            $slider.append("<ul></ul>");
            $slider.find("> div").each(function(){
                $slider.find("> ul").append('<li></li>');
            });


            $slider.find("div:first-of-type").addClass("show");


            $slider.find("li:first-of-type").addClass("showli")


            $slider.find("> div").not(".show").fadeOut();


            if (set.autoPlay === "on") {
                startSlider();
            }


            if (set.showArrows === "on") {
                $slider.addClass('showArrows');
            }


            if (set.hideDots === "on") {
                $slider.addClass('hideDots');
            }


            if (set.hoverZoom === "off") {
                $slider.addClass('hoverZoomOff');
            }


            if (set.titleBarTop === "on") {
                $slider.addClass('titleBarTop');
            }


            function startSlider() {
                sliderIntervalID = setInterval(function() {
                    nextSlide();
                }, set.slidePause);
            }


            $slider.find("> .right").click(nextSlide)


            $slider.find("> .left").click(prevSlide);


            function nextSlide() {
                position = $slider.find(".show").index() + 1;
                if (position > size - 1) position = 0;
                changeCarousel(position);
            }


            function prevSlide() {
                position = $slider.find(".show").index() - 1;
                if (position < 0) position = size - 1;
                changeCarousel(position);
            }

            $slider.find(" > ul > li").click(function() {
                position = $(this).index();
                changeCarousel($(this).index());
            });


            function changeCarousel() {
                $slider.find(".show").removeClass("show").fadeOut();
                $slider
                    .find("> div")
                    .eq(position)
                    .fadeIn(set.fadeSpeed)
                    .addClass("show");

                $slider.find("> ul").find(".showli").removeClass("showli");
                $slider.find("> ul > li").eq(position).addClass("showli");
            }

            return $slider;
        };
    })(jQuery);


    $(document).ready(function() {

        $("#slider1").sliderResponsive({

        });

    });



</script>
</body>

</html>