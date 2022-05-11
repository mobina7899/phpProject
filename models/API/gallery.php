<?php
include_once '../gallery-pic.php';
include_once '../Gallery_cat.php';

$gallery = new Gallery();
if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
    $sql = "select * from gallery_pic where fk_cat = '$cat_id' ";
    $response["pics"] = $gallery->show($sql);
} else {
    $pics = $gallery->join();

    $cat = new Gallery_cat();
    $cats = $cat->showAll();

    $response["state"] = "ok";
    $response["categories"] = $cats;
    $response["pics"] = $pics;
}
echo json_encode($response);