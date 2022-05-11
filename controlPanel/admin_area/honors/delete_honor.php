<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/eftekharat.php';
$delete_id = $_GET['id'];
$honor = new Eftekharat();
$result = $honor->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این فیلد با موفقیت از لیست افتخارات شما حذف شد!')</script>";
    echo "<script>window.open('honors.php','_self')</script>";

}
