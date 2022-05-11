<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/product-pic.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/product.php';
$delete_id = $_GET['id'];
$product = new product();
$result = $product->deleteData($delete_id);

if ($result ) {

    echo "<script>alert('این محصول با موفقیت از لیست محصولات شما حذف شد!')</script>";
    echo "<script>window.open('products.php','_self')</script>";

}
