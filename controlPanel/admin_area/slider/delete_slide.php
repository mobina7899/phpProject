<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/eslider.php';
$delete_id = $_GET['id'];
$slide = new Eslider();
$sql = "select * from eslider where id = '$delete_id'";
$pic = $slide->details($sql);
unlink($pic['pic']);
$result = $slide->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این اسلاید با موفقیت از لیست اسلایدهای شما حذف شد!')</script>";
    echo "<script>window.open('slides.php','_self')</script>";

}

