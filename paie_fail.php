<?php
session_start();
include("includes/dir.php");

?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,700,600);
    .container{
        padding: 20px;
    }
    body{
        background-color: #f6f4f4;
        font-family: 'Raleway', sans-serif;
    }
    .teal{
        background-color: #ffc952 !important;
        color: #444444 !important;
    }
    a{
        color: #47b8e0 !important;
    }
    .message{
        text-align: left;
    }
    .price1{
        font-size: 40px;
        font-weight: 200;
        display: block;
        text-align: center;
    }
    .ui.message p {margin: 5px;}
</style>
<div class="container">
    <div class="ui middle aligned center aligned grid">
        <div class="ui eight wide column">

            <form class="ui large form">

                <div class="ui icon negative message">
                    <i class="warning icon"></i>
                    <div class="content">
                        <div class="header">
                            Oops! Une erreur s´est produite.
                        </div>
                        <p>Le payement a été annulé</p>
                    </div>

                </div>

                <a href="<?=$site_url?>">Revenir à l´acceuil.</a>

            </form>
        </div>
    </div>
</div>
