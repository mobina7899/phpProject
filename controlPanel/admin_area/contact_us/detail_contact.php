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
    <link rel="stylesheet" href="">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src=""></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>اطلاعات تماس</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/tamas.php';

        $id = $_GET['id'];
        $contact = new Tamas();
        $select = "select * from tamas where id = '$id'";
        $row = $contact->details($select);
        $email = $row['email'];
        $mobile = $row["mobail"];
        $whatsApp = $row["watsapp"];
        $telegram = $row["telegram"];
        $insta = $row["instagrag"];
        $address = $row["address"];
        $lat = $row["lat"];
        $lon = $row["lon"];

        ?>

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
                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" disabled>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                موبایل
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="mobile" value="<?php echo $mobile; ?>" class="form-control"disabled >
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                واتس اپ
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="whatsApp" value="<?php echo $whatsApp; ?>" class="form-control" disabled>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                تلگرام
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="telegram" value="<?php echo $telegram; ?>" class="form-control" disabled>
            </div>
        </div>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                اینستاگرام
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="insta" value="<?php echo $insta; ?>" class="form-control" disabled >
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                آدرس
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" disabled>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                lat
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="lat" value="<?php echo $lat; ?>" class="form-control" disabled>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                lon
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="lon" value="<?php echo $lon; ?>" class="form-control" disabled>
            </div>
        </div>

</div>
</form>
</body>
</html>

