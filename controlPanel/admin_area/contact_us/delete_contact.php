<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/tamas.php';
$delete_id = $_GET['id'];
$contact = new Tamas();
$result = $contact->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این اطلاعات تماس با موفقیت از لیست  شما حذف شد!')</script>";
    echo "<script>window.open('contact_us.php','_self')</script>";

}
