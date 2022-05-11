<?php
session_start();

if(!isset($_SESSION['username'])){
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/porsesh-pasokh.php';
$delete_id = $_GET['id'];
$question = new Porseshpasokh();
$result = $question->deleteData($delete_id);

if ($result) {

    echo "<script>alert('این پرسش با موفقیت از لیست پرسش های شما حذف شد!')</script>";
    echo "<script>window.open('questions.php','_self')</script>";

}
