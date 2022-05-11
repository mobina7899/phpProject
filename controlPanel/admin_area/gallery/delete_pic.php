<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/gallery-pic.php';
$delete_id_news = $_GET['id'];
$pic = new Gallery();
$result = $pic->deleteData($delete_id_news);

if ($result) {

    echo "<script>alert('این تصویر با موفقیت از گالری تصاویر شما حذف شد!')</script>";
    echo "<script>window.open('gallery.php','_self')</script>";

}