<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/form-tamas.php';

if(isset($_POST['submit'])){
    $form_contact = new Formtamas();
    $id = $_GET['id'];

    $result = $form_contact->deleteData($id);


    if ($result) {
        echo "<script>alert('عملیات با موفقیت انجام شد .')</script>";
        echo "<script>window.open('contact_form.php','_self')</script>";
    }
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
    <title>فرم تماس</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <?php

        $id = $_GET['id'];
        $form_contact = new Formtamas();
        $select = "select * from form_tamas where id = '$id'";
        $row = $form_contact->details($select);
        $name = $row["name"];
        $email = $row["email"];
        $body = $row["body"];

        ?>

        <h4 class="text-center p-5"> فرم تماس : </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های فرم تماس
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                نام
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="whatsApp" value="<?php echo $name; ?>" class="form-control" disabled>
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
                بدنه
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="mobile" value="<?php echo $body; ?>" class="form-control"disabled >
            </div>
        </div>

        <input type="submit" name="submit" value="بررسی شد" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>
</body>
</html>

