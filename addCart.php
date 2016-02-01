<?php
require "includes.php";
$json['err'] = true;
if(isset($_GET['id'])){
    $product = $db->query("SELECT id FROM products WHERE id = :id", array('id'=>$_GET['id']));
    if(empty($product)){
        $json['message'] = "This product does not exist";
    }
    $cart->addProduct($product[0]->id);
    $json['err'] = false;
    $json['total'] = number_format($cart->getTotal(),2,',',' ').' €';
    $json['count'] = $cart->count();

    $json['message'] = "The product has been added to your cart";
}else{
    $json['message'] = "No products selected";
}

echo json_encode($json);