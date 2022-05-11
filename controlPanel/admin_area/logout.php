<?php

session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}


session_destroy();

echo "<script>window.open('../index.php','_self')</script>";
