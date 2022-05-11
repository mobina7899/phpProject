<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

if (isset($_POST['submit'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/tamas.php';

    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $whatsApp = $_POST["whatsApp"];
    $telegram = $_POST["telegram"];
    $insta = $_POST["insta"];
    $address = $_POST["address"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];

    $contact = new Tamas();
    $result = $contact->insertData($email, $mobile, $whatsApp, $telegram, $insta, $address, $lat, $lon);

//display message to user
    if ($result) {
        echo "<script>alert('تبریک...داده های مربوط به اطلاعات تماس شما به درستی وارد شد.')</script>";
        echo "<script>window.open('contact_us.php','_self')</script>";
    }
}


?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src=""></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>افزودن اطلاعات تماس</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <h4 class="text-center p-5"> اطلاعات تماس : </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های تماس
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ایمیل
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="email" name="email" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                موبایل
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="mobile" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                واتس اپ
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="whatsApp" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                تلگرام
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="telegram" class="form-control">
            </div>
        </div>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                اینستاگرام
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="insta" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                آدرس
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="address" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                lat
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="lat" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                lon
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="lon" class="form-control">
            </div>
        </div>
        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>

</body>
</html>
