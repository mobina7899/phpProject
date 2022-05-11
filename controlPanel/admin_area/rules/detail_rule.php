<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/myscript.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>قوانین</title>
</head>
<style>
    .title {
        border: 1px solid #e4e4e4;
        padding: 15px;
        border-radius: 5px;
        font-size: 23px;
        color: #B43638;
        cursor: pointer;
    }

    .sub-title {
        display: none;
        font-size: 19px;
        color: #5B5B5B;
    }

    .sub-title1 {
        display: block;
    }

    .s-plus {
        font-size: 16px;
        color: #032064;
        margin-left: 10px;
    }
</style>

<body>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/rules.php';
$id = $_GET['id'];
$rules = new Rules();
$select = "select * from rules where id = '$id'";
$row = $rules->details($select);
$title = $row['title'];
$body = $row['body'];

?>
<div id="HeaderContent"></div>
<!-- شروع هدر -->
<div class="container-fluid z-srch-khbr">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-5">
            <h2 class="text-center mt-3" style="margin-top: 40px !important"> قوانین </h2>
        </div>
    </div>
</div>
<!-- پایان هدر -->

<div class="container" style="margin-top: 80px;">
    <div class="title px-4 border shadow-sm"><i class=" fa fa-legal s-plus"></i><?php echo $title ?> </div>
    <div class="sub-title sub-title1 p-3 px-4">
        <p> <?php echo $body ?></p>
    </div>

</div>


<div id="FooterContent"></div>
</body>
</html>
