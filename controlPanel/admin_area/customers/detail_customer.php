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
    <script src='../js/jq.min.js'></script>
    <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>مشتری</title>
</head>

<body>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/customer.php';
$id = $_GET['id'];
$customer = new Customer();
$select_pro = "select * from customer where id = '$id'";
$row = $customer->details($select_pro);
$title = $row['title'];
$img = $row['pic'];
?>
<div id="HeaderContent"></div>
<a id="back"></a>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h4>  <?php echo $title ?>  </h4>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card border-0">
                    <img src="<?php echo $img; ?>" height="290">

                </div>
                <div class="card-footer border-0 text-left" style="background-color: #f9f9f9">
                    <i class="fa fa-instagram align-middle ml-2" style="font-size: 20px;color: #BEBEBE "></i>
                    <i class="fa fa-envelope align-middle ml-2" style="font-size: 20px;color: #BEBEBE "></i>
                    <i class="fa fa-facebook-official align-middle" style="font-size: 20px;color: #BEBEBE "></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- دکمه برگشت -->
<div class="container-fluid btn-back">
    <div class="row ">
        <div class="col-12 d-flex justify-content-end">
            <a href="#back" class="ml-2" style="font-size: 30px;">
                <i class="fa fa-chevron-circle-up align-middle;"></i>
            </a>
        </div>
    </div>
</div>
<!-- دکمه برگشت -->
<div id="FooterContent"></div>
</body>
</html>

