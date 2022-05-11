<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/company-member.php';
$delete_id = $_GET['id'];
$member = new companymember();
$result = $member->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این عضو با موفقیت از لیست اعضا شما حذف شد!')</script>";
    echo "<script>window.open('members.php','_self')</script>";

}
