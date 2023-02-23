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
    <li class="swiper-slidess text-center">
								<span class="product-list-left pull-left">
									<a href="#" ><img alt="product image" class="product-list-primary-img" src="<?= $site_url.'/saved_images/article/'.$row->image; ?>">
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