<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/rules.php';
$delete_id = $_GET['id'];
$rules = new Rules();
$result = $rules->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این قانون با موفقیت از لیست قوانین شما حذف شد!')</script>";
    echo "<script>window.open('rules.php','_self')</script>";

}

