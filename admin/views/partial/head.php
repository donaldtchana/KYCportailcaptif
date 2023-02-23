<?php
$site_url = get_setting($db,'site_url')
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords"
      content="Ecommerce Portail Captif">
<meta name="description"
      content="Ecommerce Portail Captif">
<meta name="robots" content="noindex,nofollow">
<title><?=$page_name?></title>
<link href="<?=$site_url?>/admin/assets/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script src="<?=$site_url?>/js/jquery-2.2.4.min.js"></script>
<link rel="stylesheet" href="<?=$site_url?>/admin/assets/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?=$site_url?>/admin/assets/css/jquery.dataTables.min.css">
<script type="text/javascript" src="<?=$site_url?>/admin/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=$site_url?>/admin/assets/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?=$site_url?>/admin/assets/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" href="<?=$site_url?>/admin/assets/css/sweat_alert.css" >
<script type="text/javascript" src="<?=$site_url?>/admin/assets/js/sweat_alert.js"></script>
<style>
    .table-responsive {
        overflow-x: clip !important;
    }
    div.dt-buttons {
        margin-left: 20px;
    }

     .product_image {
         width: 57px;
     }

</style>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            dom: 'lBfrtip',
            aaSorting: [],
            buttons: [
                {
                    extend: 'print',
                    text: 'Imprimer',
                    autoPrint: true,
                    exportOptions: {
                        columns: print_column
                    }
                }
            ],
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tous"]]
        });
    } );

    function alert_error(text){
        Swal('',text,'error');
    }

    function alert_success(text,url){
        swal({
            type: 'success',
            timer : 3000,
            text: text,
            onOpen: function(){
                swal.showLoading()
            }
        }).then(function(){
            if(url != ""){
                window.open(url,'_self');
            }
        });
    }

    function alert_error(text,url){
        swal({
            type: 'error',
            timer: 3000,
            text: text,
            onOpen: function(){
                swal.showLoading()
            }
        }).then(function(){
            if(url != ""){
                window.open(url,'_self');
            }
        });
    }

    function alert_confirm(text,url){
        swal({
            text: text,
            type: 'warning',
            showCancelButton: true
        }).then((result) => {
            if(result.value){
                if(url != ""){ window.open(url,'_self'); }
            }
        });
    }

</script>
