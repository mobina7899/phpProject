<?php
session_start();



include_once 'login.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myObject = new login();
    $myObject->log_in($_POST['username'], $_POST['pass']);
    if (!isset($_SESSION['message'])) {
        if ($myObject->login_validation()) {
            header('location: http://localhost/kosharayan/controlPanel/admin_area');
        }
    }
    else {
        echo $_SESSION['message'];
        session_destroy();
    }
}

if (!isset($_SESSION['username']) && !isset($_SESSION['message'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
?>