<?php
include_once '../product-pic.php';

$product_pic = new productpic();
$product_pics = $product_pic->join();
$response["products"] = $product_pics;

$response["state"] = "ok";


echo json_encode($response);