<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/about.php';
$delete_id = $_GET['id'];
$about = new About();
$result = $about->deleteData($delete_id);

if ($result) {

    echo "<script>alert('حذف انجام شد !')</script>";
    echo "<script>window.open('about_us.php','_self')</script>";

}
