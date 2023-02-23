<?php
session_start();
include("includes/dir.php");
unset($_SESSION['commande_id']);
unset($_SESSION['post_values']);
if(isset($_POST['method'])){
    $query = $db->query('SELECT * FROM boutique WHERE slug=:slug  LIMIT 1', array("slug"=>$_POST['id_boutique']));
    if($query->rowCount() > 0){
        $boutique = $query->fetch();
        $url =$site_url."/boutique/".$boutique->slug;
    }else
    {
        echo "<script>alert('Boutique introuvable');</script>";
        echo "<script>window.open('$site_url','_self');</script>";
        exit();
    }
    if (!is_connected() && ($_POST['method'] =='Paypal'))
    {
        echo "<script>alert('Impossible de se connecter sur internet , verifier votre connexion.');</script>";
        echo "<script>window.open('$site_url','_self');</script>";
        exit();

    }else{
        $total_dollard =intval($_POST['amount']) * 0.00162617358916;
        $total_dollard =  number_format((float)$total_dollard, 2, '.', '');
            $user_id=1;
        $_POST['user_id'] = $user_id;
        $_SESSION['post_values'] = $_POST;
            if($_POST['method'] =='Paypal'){
                try {
                    $response = $gateway->purchase(array(
                        'amount' => $total_dollard,
                        'currency' => PAYPAL_CURRENCY,
                        'returnUrl' => PAYPAL_RETURN_URL,
                        'cancelUrl' => PAYPAL_CANCEL_URL,
                    ))->send();
                    /*var_dump($response);
                    exit();*/

                    if ($response->isRedirect()) {
                        $data = $_SESSION['post_values'];
                        $produits_array =  str_replace("[","",$data['list_item']);
                        $produits_array =  str_replace("]","",$produits_array);
                        $produits_array = array_map('intval', explode(',', $produits_array));

                        $qte_array =  str_replace("[","",$data['list_qte']);
                        $qte_array =  str_replace("]","",$qte_array);
                        $qte_array = array_map('intval', explode(',', $qte_array));

                        $prix_array =  str_replace("[","",$data['list_price']);
                        $prix_array =  str_replace("]","",$prix_array);
                        $prix_array = array_map('intval', explode(',', $prix_array));

                        $values = ["id_client"=>intval($data['user_id']),"total"=>intval($data['amount']),"dates"=>date("Y-m-d H:i:s"),"id_boutique"=>$boutique->id,"payer"=>0,"cloturer"=>0,"methode"=>$data['method']];
                        $exec= $db->insert("commande",$values);

                        $commande_id= $db->lastInsertId();

                        $_SESSION['commande_id']=$commande_id;
                        for ($i = 0; $i < count($produits_array); $i++) {
                            $values = ["id_article"=>$produits_array[$i],"qte_commande"=>$qte_array[$i],"prix"=>$prix_array[$i],"id_commande"=>$commande_id];
                            $exec= $db->insert("ligne_commande",$values);
                        }
                        $response->redirect();
                    } else {

                        echo "<script>alert('Le processus de payement ne s´est pas terminé.');</script>";
                        echo "<script>window.open('$url','_self');</script>";
                        exit();

                    }
                } catch(Exception $e) {

                    echo "<script>alert('".$e->getMessage()."');</script>";
                    echo "<script>window.open('$url','_self');</script>";
                    exit();

                }

            }else{
                $data = $_POST;
                $produits_array =  str_replace("[","",$data['list_item']);
                $produits_array =  str_replace("]","",$produits_array);
                $produits_array = array_map('intval', explode(',', $produits_array));

                $qte_array =  str_replace("[","",$data['list_qte']);
                $qte_array =  str_replace("]","",$qte_array);
                $qte_array = array_map('intval', explode(',', $qte_array));

                $prix_array =  str_replace("[","",$data['list_price']);
                $prix_array =  str_replace("]","",$prix_array);
                $prix_array = array_map('intval', explode(',', $prix_array));

                $values = ["id_client"=>intval($data['user_id']),"methode"=>$data['method'],"total"=>intval($data['amount']),"dates"=>date("Y-m-d H:i:s"),"id_boutique"=>$boutique->id,"payer"=>0,"cloturer"=>0];
                $exec= $db->insert("commande",$values);

                $commande_id= $db->lastInsertId();
                $_SESSION['commande_id']=$commande_id;
                for ($i = 0; $i < count($produits_array); $i++) {
                    $values = ["id_article"=>$produits_array[$i],"qte_commande"=>$qte_array[$i],"prix"=>$prix_array[$i],"id_commande"=>$commande_id];
                    $exec= $db->insert("ligne_commande",$values);
                }

                echo "<script>window.open('".$site_url."/paie_success','_self');</script>";
                exit();

            }


    }


}else{
    echo "<script>window.open('$site_url','_self');</script>";
    exit();

}
