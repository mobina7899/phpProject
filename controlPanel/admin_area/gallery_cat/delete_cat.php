<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Gallery_cat.php';
$delete_id = $_GET['id'];
$cat = new Gallery_cat();
$result = $cat->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این عنوان با موفقیت از دسته بندی های شما حذف شد!')</script>";
    echo "<script>window.open('cats.php','_self')</script>";

}