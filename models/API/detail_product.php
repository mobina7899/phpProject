<?php
include_once '../product.php';
include_once '../product-pic.php';

$product = new Product();
$product_pic = new Productpic();

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $select_pro = "select * from product_pic,product where product.id = '$id' and product_pic.fk_product = '$id'";
    $details = $product->details($select_pro);

    $response["state"] = "ok";
    $response["result"] = $details;
} else
    $response["state"] = "error";

echo json_encode($response);