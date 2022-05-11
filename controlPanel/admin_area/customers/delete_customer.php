<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/customer.php';
$delete_id = $_GET['id'];
$customer = new Customer();
$result = $customer->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این مشتری با موفقیت از لیست مشتریان شما حذف شد!')</script>";
    echo "<script>window.open('customers.php','_self')</script>";

}
