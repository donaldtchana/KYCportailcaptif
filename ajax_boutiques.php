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
$get_boutiques = $db->query("select * from boutique where status = 1".$where." order by id asc LIMIT ".$per_page." OFFSET ".$start_from);
ob_start();
if($get_boutiques->rowCount()==0 && $page == 1){
    ?>
    <p class="no_results">
Aucune boutique trouvée

    </p>

<?php }
while($row = $get_boutiques->fetch()){
?>
    <li class="swiper-slidess text-center boutique_image">
								<span class="product-list-left pull-left">
									<a href="<?= $site_url.'/boutique/'.$row->slug; ?>" ><img alt="product image" class="product-list-primary-img" src="<?= $site_url.'/saved_images/boutique/'.$row->logo; ?>">
									<img alt="product image" class="product-list-secondary-img" src="<?= $site_url.'/saved_images/boutique/'.$row->logo; ?>">
									</a>
								</span>

    </li>
    <li class="swiper-slidess text-center boutique_name">
        <a href="<?= $site_url.'/boutique/'.$row->slug; ?>" class="boutique_name_view">
									<?=$row->nom?>
        </a>
    </li>

<?php }
$html = ob_get_contents();
ob_end_clean();

$query = $db->query("select * from boutique where status = 1".$where." order by id asc");
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