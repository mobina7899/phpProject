<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

if (isset($_POST['submit'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Product-pic.php';

    include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Product.php';
    include_once '../jdf.php';
    $date = jdate("Y-m-d H:i:s",'','','','en');
    $title = $_POST["title"];
    $body = $_POST["body"];
    $price = $_POST["price"];

    $product = new product();
    $result = $product->insertData($title, $body, $price, $date);
    if ($result) {
        $products = $product->showAll();
        $last_product_id = $products[sizeof($products) - 1]['id'];
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $address_images = 'product_images/' . $image_name;
        move_uploaded_file($image_tmp, $address_images);
        $pic = new Productpic();
        $res = $pic->insertData($address_images, $last_product_id);

//display message to user
        if ($res) {
            echo "<script>alert('تبریک...داده های مربوط به محصول شما به درستی وارد شد.')</script>";
            echo "<script>window.open('products.php','_self')</script>";
        }
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
    <title>افزودن محصول</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <h4 class="text-center p-5"> افزودن محصول </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های محصول
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                نام محصول
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="title" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                توضیحات
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="body" class="form-control" style="resize: none"></textarea>
            </div>
        </div>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                عکس محصول
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                قیمت
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="price" class="form-control">
            </div>
        </div>

        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>

</body>
</html>
