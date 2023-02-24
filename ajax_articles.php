<?php
session_start();
include("includes/dir.php");


$per_page = PAGINATION;
if(isset($_POST['page'])){

    $page = $input->post('page');
    if($page == 0){ $page = 1; }

}else{

    $page = 1;

}
$where='';
if (!empty($_POST['cat'])){
    $myArray = explode(',', $_POST['cat']);
    $string_format = str_repeat('?,', count($myArray) - 1) . '?';
    $where=$where." and cat IN (".$_POST['cat'].") ";

}

$start_from = ($page-1) * $per_page;
$get_boutiques = $db->query("select * from article where status = 1 and id_boutique = ".$_POST['id_boutique'].$where." order by id asc LIMIT ".$per_page." OFFSET ".$start_from);
ob_start();
if($get_boutiques->rowCount()==0 && $page == 1){
    ?>
    <p class="no_results">
Aucun article trouvé

    </p>

<?php }
while($row = $get_boutiques->fetch()){
?>
    <div class="modal fade product-modal" id="product-<?= $row->id; ?>" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content shadow">
                <a class="close" data-dismiss="modal"> <span class="ti-close"></span></a>
                <div class="modal-body">

                    <div class="carousel slide product-slide" id="product-carousel">
                        <div class="carousel-inner cont-slider">
                            <div class="item active"> <img alt="" src="<?= $site_url.'/saved_images/article/'.$row->image; ?>" title=""> </div>

                        </div>


                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-push-2">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="pull-left nk section-heading"><?= $row->nom; ?></h3>
                                    </div>
                                    <div class="col-md-5">
											<span class="product-right-section">
												<span style="font-size: 25px;"><?= money_format($row->prix); ?> </span>
												<button class="btn btn-default add-item" type="button" data-image="<?= $site_url.'/saved_images/article/'.$row->image; ?>" data-name="<?= $row->nom; ?>" data-cost="<?= $row->prix; ?>" data-id="<?= $row->id; ?>">
												Ajouter au panier</button>
											</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-push-2 product-description">

                                <p> <?= $row->description; ?> </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <li class="swiper-slidess text-center">
								<span class="product-list-left pull-left">
									<a href="#" data-target="#product-<?= $row->id; ?>" data-toggle="modal"><img alt="product image" class="product-list-primary-img" src="<?= $site_url.'/saved_images/article/'.$row->image; ?>">
									<img alt="product image" class="product-list-secondary-img" src="<?= $site_url.'/saved_images/article/'.$row->image; ?>">
									</a>
								</span>

        <a href="#" data-target="#product-01" data-toggle="modal">
									<span class="product-list-right pull-left">
										<span class="product-list-name h4 black-color"><?= $row->nom; ?> </span>
										<span style="font-size: 23px;font-weight: 700;" class="product-list-price"><?= money_format($row->prix); ?></span>

									</span>
        </a>

        <button class="btn btn-default add-item" type="button" data-image="<?= $site_url.'/saved_images/article/'.$row->image; ?>" data-name="<?= $row->nom; ?> " data-cost="<?= $row->prix; ?>" data-id="<?= $row->id; ?>" >
            Ajouter au panier
        </button>
    </li>

<?php }
$html = ob_get_contents();
ob_end_clean();

$query = $db->query("select * from article where status = 1 and id_boutique = ".$_POST['id_boutique'].$where." order by id asc");
$total_records = $query->rowCount();
$total_pages = ceil($total_records / $per_page);
if ($total_pages > $page){
    $next=$page+1;
    $link_more = "<a page='$next' class='page-link' href='' id='voir_plus'>Voir Plus </a></li>";
}else{
    $link_more = '';
}
$data = array("html" => $html, "link_more" => $link_more);

header("Content-Type: application/json");
echo json_encode($data);
exit();
?>