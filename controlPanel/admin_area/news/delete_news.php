<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}


include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Newss.php';
$delete_id_news = $_GET['id'];
$news = new News();
$result = $news->deleteData($delete_id_news);

if ($result) {

    echo "<script>alert('این خبر با موفقیت از لیست اخبار شما حذف شد!')</script>";
    echo "<script>window.open('news.php','_self')</script>";

}
